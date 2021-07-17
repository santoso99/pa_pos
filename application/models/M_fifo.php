<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_fifo extends CI_Model
{
	public function produk()
	{
		$this->db->select('a.id_barang,a.nama_barang,a.memori,b.id_warna,b.nama_warna')
			->from('barang as a')
			->join('warna_barang as b', 'a.id_barang=b.id_barang');
		return $this->db->get()->result_array();
	}

	public function all($y, $m, $id)
	{
		$desc = $this->db->select("concat(barang.nama_barang,barang.nama_barang,' ' ,barang.memori,' ',warna_barang.nama_warna) as nama_barang")
			->from('barang as barang')
			->join('warna_barang as warna_barang', 'barang.id_barang=warna_barang.id_barang')
			->where('warna_barang.id_warna', $id)
			->get()->row_array();


		$db = $this->db->query("SELECT 
			big_data.id_transaksi,
			big_data.nama_barang,
			big_data.tanggal,
			pembelian.id_warna as type_stock,
			big_data.id_warna as id_warna,
			pembelian.id_pembelian as stock_id,
			big_data.id_pembelian,
			pembelian.qty as stock,
			big_data.qty,
			big_data.cogs,
			big_data.total,
			big_data.tipe FROM ( SELECT
			purchase_table.id_transaksi,
			purchase_table.id_warna,
			concat(barang.nama_barang,barang.nama_barang,' ' ,barang.memori,' ',warna_barang.nama_warna) as nama_barang,
			purchase_table.tanggal,
			purchase_table.purch_qty as qty,
			purchase_table.harga_beli as cogs,
			purchase_table.purch_total as total,
			purchase_table.tipe,
			purchase_table.id_pembelian
		   FROM 
			  barang
		   JOIN warna_barang
			  ON barang.id_barang=warna_barang.id_barang
		   JOIN (
			  SELECT
				 transaksi.id_transaksi,
				 purchase.id_warna,
				 transaksi.tanggal,
				 purchase.purch_qty,
				 purchase.harga_beli,
				 purchase.purch_total,
				transaksi.tipe,
				purchase.id_pembelian
			  FROM
				 transaksi
				 LEFT OUTER JOIN (
					SELECT 
					pembelian.id_pembelian,
					pembelian.id_transaksi,
					pembelian.id_warna,
					pembelian.tanggal as purchase_date,
					pembelian.cogs as harga_beli,
					pembelian.qty as purch_qty,
					pembelian.total as purch_total
					FROM pembelian
				 ) AS purchase
				 ON purchase.id_transaksi=transaksi.id_transaksi
		    ) as purchase_table
		    ON warna_barang.id_warna=purchase_table.id_warna
	
		    UNION 
	
		    SELECT
			  sales_table.id_transaksi,
			    sales_table.id_warna,
			  concat(barang.nama_barang,barang.nama_barang,' ',barang.memori,' ',warna_barang.nama_warna) as nama_barang,
			  sales_table.tanggal,
			  sales_table.sales_qty as qty,
			  sales_table.cogs as cogs,
			  (sales_table.sales_qty* sales_table.cogs) as total,
			    sales_table.tipe,
			    sales_table.id_pembelian
		   FROM barang
		   JOIN warna_barang
			  ON barang.id_barang=warna_barang.id_barang
		    JOIN (
			  SELECT
				 transaksi.id_transaksi,
				 sales.id_warna,
				 transaksi.tanggal,
				 sales.sales_qty,
				 sales.cogs,
				   transaksi.tipe,
				   sales.id_pembelian
			  FROM
				 transaksi
				 LEFT OUTER JOIN (
					SELECT 
					penjualan.id_pembelian,
					penjualan.id_transaksi,
					penjualan.id_warna,
					penjualan.tanggal as sales_date,
					penjualan.cogs as cogs,
					penjualan.qty as sales_qty
					FROM penjualan
				 ) AS sales
				 ON sales.id_transaksi=transaksi.id_transaksi
		    ) as sales_table
		    ON sales_table.id_warna=warna_barang.id_warna
	    ) as  big_data
	    LEFT OUTER JOIN pembelian 
	    ON big_data.id_pembelian = pembelian.id_pembelian
		WHERE big_data.id_warna = '$id' and month(big_data.tanggal) = '$m' and year(big_data.tanggal) = '$y'
	    ORDER BY big_data.tanggal ASC")->result_array();

		$response = [
			'title'		=> $desc['nama_barang'],
			'data'		=> $db
		];
		return $response;
	}
	public function stock()
	{
		$this->db->select('a.id_transaksi,a.id_warna,a.qty  as sisa,a.cogs as hpp,a.tipe as level,a.id_pembelian ')
			->from('stok as a');
		return $this->db->get()->result_array();
	}
	public function pembelian()
	{
		$this->db->select('a.id_transaksi,a.tanggal,b.id_warna as item,b.id_pembelian,b.cogs,b.qty as jumlah_beli')
			->from('transaksi as a')
			->join('pembelian as b', 'a.id_transaksi=b.id_transaksi')
			->where('a.tipe', 'purchasing');
		return $this->db->get()->result_array();
	}
	public function penjualan()
	{
		$this->db->select('a.id_transaksi,a.tanggal,b.id_warna as item,b.id_pembelian,b.qty as jumlah_jual,b.cogs')
			->from('transaksi as a')
			->join('penjualan as b', 'a.id_transaksi=b.id_transaksi', 'left')
			->where('a.tipe', 'order')
			->order_by('id_transaksi', 'DESC');
		return $this->db->get()->result_array();
	}

	public function try($y, $m, $id)
	{

		$produk = $this->db->query("SELECT a.id_barang,b.id_warna ,CONCAT(a.nama_barang,' ', b.nama_warna,' ',a.memori) as nama_produk
		FROM barang as a
		JOIN warna_barang as b 
		ON a.id_barang=b.id_barang")->result_array();

		$data = $this->db->query("SELECT id_transaksi, DATE_FORMAT(tanggal,'%d/%m/%Y') as tanggal, id_warna, cogs, qty, 'purchase' as tipe, id_pembelian, '1' as stock_type
		FROM pembelian  WHERE id_warna = $id AND month(tanggal) = $m AND year(tanggal) = $y
		UNION 
		SELECT id_transaksi, DATE_FORMAT(tanggal,'%d/%m/%Y') as tanggal, id_warna, cogs, qty, 'sales' as tipe, id_pembelian, '0' as stock_type
		FROM penjualan WHERE id_warna = $id AND month(tanggal) = $m AND year(tanggal) = $y
		UNION
		SELECT id_transaksi, DATE_FORMAT(tanggal,'%d/%m/%Y') as tanggal, id_warna, cogs, qty, 'purchase_return' as tipe, id_pembelian, '0' as stock_type
		FROM retur_pembelian WHERE id_warna = $id AND month(tanggal) = $m AND year(tanggal) = $y
		UNION
		SELECT id_transaksi, DATE_FORMAT(tanggal,'%d/%m/%Y') as tanggal, id_warna, cogs, qty, 'sales_return' as tipe, id_pembelian, '1' as stock_type
		FROM retur_penjualan WHERE id_warna =$id AND month(tanggal) = $m AND year(tanggal) = $y  ")->result();




		return $data;
	}
}

/* End of file M_fifo.php */
