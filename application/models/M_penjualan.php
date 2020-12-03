<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_penjualan extends CI_Model
{
	public function all()
	{
		$this->db->select('a.id_transaksi,a.tanggal,a.status,a.total,b.nama_pelanggan')
			->from('transaksi as a')
			->join('pelanggan as b', 'a.id_pelanggan=b.id_pelanggan', 'left')
			->where('a.tipe', 'order')
			->order_by('id_transaksi', 'DESC');
		return $this->db->get()->result_array();
	}
	public function select($id)
	{
		$this->db->select('a.id_transaksi,a.tanggal,a.status,a.total,a.keterangan,b.nama_pelanggan')
			->from('transaksi as a')
			->join('pelanggan as b', 'a.id_pelanggan=b.id_pelanggan', 'left')
			->where('a.tipe', 'order')
			->where('a.id_transaksi', $id)
			->order_by('id_transaksi', 'DESC');
		return $this->db->get()->row_array();
	}
	public function pelanggan()
	{
		return $this->db->get('pelanggan')->result_array();
	}
	private function id()
	{
		$this->db->select('RIGHT(id_transaksi,9) as id', FALSE);
		$this->db->where('tipe', 'order');
		$this->db->order_by('id_transaksi', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('transaksi');
		if ($query->num_rows() <> 0) {
			$data = $query->row();
			$code = intval($data->id) + 1;
		} else {
			$code = 1;
		}

		$interval = str_pad($code, 9, "0", STR_PAD_LEFT);
		$id = "TRX-SO-" . $interval;
		return $id;
	}
	public function draff()
	{
		$data = [
			'id_transaksi'		=> $this->id(),
			'tipe'			=> 'order'
		];
		$this->db->insert('transaksi', $data);
		return $data;
	}
	public function produk()
	{
		$this->db->select('a.id_barang,a.nama_barang,a.memori,b.id_warna,b.nama_warna')
			->from('barang as a')
			->join('warna_barang as b', 'a.id_barang=b.id_barang');
		return $this->db->get()->result_array();
	}
	public function detail($id)
	{
		$this->db->select('a.id_penjualan,a.id_pembelian,a.cogs,a.harga_jual,a.qty,b.nama_warna,c.nama_barang,c.memori')
			->from('penjualan as a')
			->join('warna_barang as b', 'a.id_warna=b.id_warna')
			->join('barang as c', 'b.id_barang=c.id_barang')
			->where('a.id_transaksi', $id);
		return $this->db->get()->result_array();
	}
	public function find_produk()
	{
		$id = $this->input->post('id_warna');
		$this->db->select('a.id_barang,a.nama_barang,a.memori,a.harga_satuan,b.id_warna,b.nama_warna')
			->from('barang as a')
			->join('warna_barang as b', 'a.id_barang=b.id_barang')
			->where('id_warna', $id);
		return $this->db->get()->row_array();
	}
	private function purchasing($id_warna)
	{
		$this->db->select('a.id_warna,sum(a.qty) as purchasing')
			->from('pembelian as a')
			->where('a.id_warna', $id_warna)
			->group_by('a.id_warna');
		return $this->db->get()->row_array();
	}
	private function sales($id_warna)
	{
		$this->db->select('a.id_warna,sum(a.qty) as sales')
			->from('penjualan as a')
			->where('a.id_warna', $id_warna)
			->group_by('a.id_warna');
		return $this->db->get()->row_array();
	}
	private function ready_stock($id_warna)
	{
		$purchasing = $this->purchasing($id_warna);
		$sales	  = $this->sales($id_warna);

		$data = [
			'ready_stock'		=> $purchasing['purchasing'] - $sales['sales']
		];
		return $data;
	}
	private function stok($id_warna)
	{
		$this->db->order_by('tanggal', 'ASC');
		return $this->db->get_where('pembelian', ['id_warna' => $id_warna, 'ready >' => 0])->result_array();
	}
	public function add_item()
	{
		$id_transaksi 	= $this->input->post('id_transaksi');
		$id_warna 	= $this->input->post('id_warna');
		$qty 		= $this->input->post('qty');
		$harga_jual	= intval(preg_replace("/[^0-9]/", "", $this->input->post('harga_jual')));
		$tipe 		= 'order';
		// cek validation for stock
		$ready = $this->ready_stock($id_warna);
		$stok = $this->stok($id_warna);

		if ($ready['ready_stock'] >= $qty) {
			foreach ($stok as $key => $row) {
				$stock 		= $row['ready']; //ready stock
				$sales_qty 	= $qty; //sales qunatity
				$cogs 		= $row['cogs']; // product unit -cogs
				if ($qty > 0) {
					$temp 	= $qty;
					$qty 	= $qty - $stock;
					$id 		= $row['id_pembelian']; // stock id from purchasing table
					// end loop 1
					if ($qty > 0) {
						// stok pertama tidak cukup
						$sales[] = [
							'id_transaksi'		=> $id_transaksi,
							'id_pembelian'		=> $row['id_pembelian'],
							'id_warna'		=> $id_warna,
							'cogs'			=> $cogs,
							'harga_jual'		=> $harga_jual,
							'qty'			=> $stock
						];
						$stock_update[] = [
							'id_pembelian'		=> $row['id_pembelian'],
							'ready'			=> 0,
						];
						// end loop 3
					} else {
						// end last loop stok pertama cukup
						$sales[] = [
							'id_transaksi'		=> $id_transaksi,
							'id_pembelian'		=> $row['id_pembelian'],
							'id_warna'		=> $id_warna,
							'cogs'			=> $cogs,
							'harga_jual'		=> $harga_jual,
							'qty'			=> $qty + $stock
						];
						$stock_update[] = [
							'id_pembelian'		=> $row['id_pembelian'],
							'ready'			=>  $stock - $temp,
						];
					}
				}
			}

			// echo "<pre>";
			// print_r($sales);
			// print_r($stock_update);
			// echo "</pre>";
			// die;
			$this->db->trans_start();
			$this->db->insert_batch('penjualan', $sales);
			$this->db->update_batch('pembelian', $stock_update, 'id_pembelian');
			$this->db->trans_complete();
			$response = [
				'status'		=> 1,
				'id_transaksi'	=> $id_transaksi,
				'response'	=> 'success',
				'message'		=> 'Sukses menambahkan item !'
			];
			return $response;
		} else {
			$response = [
				'status'		=> 0,
				'id_transaksi'	=> $id_transaksi,
				'response'	=> 'warning',
				'message'		=> 'Stok tidak cukup !'
			];
			return $response;
		}
	}
	public function deleted_item($id_penjualan, $id_pembelian)
	{
		$currently_stock = $this->db->get_where('pembelian', ['id_pembelian' => $id_pembelian])->row_array();
		$sales		  = $this->db->get_where('penjualan', ['id_penjualan' => $id_penjualan])->row_array();
		$updated = [
			'ready'		=> $currently_stock['ready'] + $sales['qty']
		];
		// echo "<pre>";
		// print_r($updated);
		// echo "</pre>";
		// die;
		$this->db->trans_start();
		$this->db->delete('penjualan', ['id_penjualan' => $id_penjualan]);
		$this->db->update('pembelian', $updated, ['id_pembelian' => $id_pembelian]);
		$this->db->trans_complete();
		$response = [
			'status'		=> 0,
			'id_transaksi'	=> $sales['id_transaksi'],
			'response'	=> 'success',
			'message'		=> 'Item dihapus !'
		];
		return $response;
	}
	private function cogs($id_transaksi)
	{
		$this->db->select('sum(a.cogs*a.qty) as cogs')
			->from('penjualan as a')
			->where('a.id_transaksi', $id_transaksi)
			->group_by('a.id_transaksi');
		return $this->db->get()->row_array();
	}
	public function store()
	{
		$id_transaksi 			= $this->input->post('id_transaksi');
		$id_pelanggan			= $this->input->post('id_pelanggan');
		$keterangan			= $this->input->post('keterangan');
		$total 				= intval(preg_replace("/[^0-9]/", "", $this->input->post('total')));
		$sales				= $this->cogs($id_transaksi);

		$transaksi = [
			'id_transaksi'		=> $id_transaksi,
			'id_pelanggan'		=> $id_pelanggan,
			'status'			=> 1,
			'total'			=> $total,
			'keterangan'		=> $keterangan
		];
		$jurnal =
			[
				[
					'account_no'		=> '1-10001',
					'posisi'			=> 'd',
					'nominal'			=> $total,
					'id_transaksi'		=> $id_transaksi
				],
				[
					'account_no'		=> '4-10001',
					'posisi'			=> 'k',
					'nominal'			=> $total,
					'id_transaksi'		=> $id_transaksi
				],
				# /.general ledger kas-penjualan
				[
					'account_no'		=> '6-10006',
					'posisi'			=> 'd',
					'nominal'			=> $sales['cogs'],
					'id_transaksi'		=> $id_transaksi
				],
				[
					'account_no'		=> '1-10005',
					'posisi'			=> 'k',
					'nominal'			=> $sales['cogs'],
					'id_transaksi'		=> $id_transaksi
				],

			];

		// echo "<pre>";
		// print_r($transaksi);
		// print_r($jurnal);
		// echo "</pre>";
		// die;
		$this->db->trans_start();
		$this->db->update('transaksi', $transaksi, ['id_transaksi' => $id_transaksi]);
		$this->db->insert_batch('jurnal', $jurnal);
		$this->db->trans_complete();

		$response = [
			'status'		=> 1,
			'response'	=> 'success',
			'message'		=> 'Penjualan Berhasil dilakukan !'
		];
		return $response;
	}
}

/* End of file M_penjualan.php */
