<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_fifo extends CI_Model
{

	public function all($y, $m)
	{
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
			big_data.tipe
	FROM (
	    SELECT
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
		   FROM 
			  barang
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
	    ORDER BY big_data.tanggal ASC")->result_array();

		// foreach ($db as $value) {
		// 	$data[$value['tipe']][$value['id_pembelian']][] = $value;
		// }
		// echo "<pre>";
		// echo print_r($data);
		// echo "</pre>";
		// die;
		return $db;
	}
	public function stock()
	{
		$this->db->select('b.id_pembelian,sum(b.qty) as ready ')
			->from('pembelian as b')
			->group_by('id_pembelian');
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
	public function list($y, $m)
	{
		$pembelian = $this->pembelian();
		$penjualan = $this->penjualan();
		$stock	 = $this->stock();
		$ready = 0;
		foreach ($stock as $r1) {

			$stok['stok'][$r1['id_pembelian']][] = [
				'id_pembelian'		=> $r1['id_pembelian'],
				'ready'			=> $r1['ready'],

			];
		}

		foreach ($penjualan as $key => $r2) {
			$sisa =  $stok['stok'][$r2['id_pembelian']][0]['ready'] - $r2['jumlah_jual'];

			$sales['penjualan'][$r2['id_pembelian']][] = [
				'tanggal'			=> $r2['tanggal'],
				'id_pembelian'		=> $r2['id_pembelian'],
				'ready'			=> $stok['stok'][$r2['id_pembelian']][0]['ready'],
				'sales'			=> $sisa - $r2['jumlah_jual']
			];
		}
		echo "<pre>";
		echo print_r($stok);
		echo print_r($sales);
		echo "</pre>";
		die;

		return $stok;
	}
}

/* End of file M_fifo.php */
