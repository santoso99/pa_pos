<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_pembelian extends CI_Model
{

	public function vendor()
	{
		return $this->db->get('vendor')->result_array();
	}
	private function id()
	{
		$this->db->select('RIGHT(id_transaksi,9) as id', FALSE);
		$this->db->where('tipe', 'purchasing');
		$this->db->order_by('id_transaksi', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('Transaksi');
		if ($query->num_rows() <> 0) {
			$data = $query->row();
			$code = intval($data->id) + 1;
		} else {
			$code = 1;
		}

		$interval = str_pad($code, 9, "0", STR_PAD_LEFT);
		$id = "TRX-PO-" . $interval;
		return $id;
	}
	public function produk()
	{
		$this->db->select('a.id_barang,a.nama_barang,a.memori,b.id_warna,b.nama_warna')
			->from('barang as a')
			->join('warna_barang as b', 'a.id_barang=b.id_barang');
		return $this->db->get()->result_array();
	}
	public function validate_kas()
	{
	}
	public function store()
	{
		$id_transaksi 			= $this->id();
		$id_warna				= $this->input->post('id_warna');
		$id_vendor			= $this->input->post('id_vendor');
		$tipe				= "purchasing";
		$keterangan			= $this->input->post('keterangan');
		$total = 0;
		foreach ($id_warna as $key => $val) {
			$detail[]	= [
				'id_transaksi'	=> $id_transaksi,
				'id_warna'	=> $id_warna[$key],
				'cogs'		=> intval(preg_replace("/[^0-9]/", "", $this->input->post('cogs')[$key])),
				'qty'		=> $this->input->post('qty')[$key],
				'total'		=> intval(preg_replace("/[^0-9]/", "", $this->input->post('cogs')[$key]) * $this->input->post('qty')[$key])
			];
			$total = $total + ($detail[$key]['total']);
		}

		$transaksi = [
			'id_transaksi'		=> $id_transaksi,
			'id_vendor'		=> $id_vendor,
			'total'			=> $total,
			'tipe'			=> $tipe,
			'keterangan'		=> $keterangan
		];
		$jurnal =
			[
				[
					'account_no'		=> '1-10005',
					'posisi'			=> 'db',
					'nominal'			=> $total,
					'id_transaksi'		=> $id_transaksi
				],

			];
		$this->db->trans_start();
		$this->db->insert('transaksi', $transaksi);
		$this->db->insert_batch('pembelian', $detail);
		$this->db->trans_complete();
	}
}

/* End of file M_pembelian.php */
