<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_widget extends CI_Model
{

	public function sales()
	{
		$this->db->select_sum('qty');
		return $this->db->get('penjualan')->row_array();
	}

	public function latest_sales()
	{
		$this->db->select('a.id_transaksi,a.tanggal,a.status,a.total,b.nama_pelanggan')
			->from('transaksi as a')
			->join('pelanggan as b', 'a.id_pelanggan=b.id_pelanggan', 'left')
			->where('a.tipe', 'order')
			->limit('5')
			->order_by('id_transaksi', 'DESC');
		return $this->db->get()->result_array();
	}
	public function latest_purchasing()
	{
		$this->db->select('a.id_transaksi,a.tanggal,a.total,b.nama_vendor')
			->from('transaksi as a')
			->join('vendor as b', 'a.id_vendor=b.id_vendor')
			->limit('5')
			->where('a.tipe', 'purchasing')
			->order_by('a.id_transaksi', 'DESC');
		return $this->db->get()->result_array();
	}
}

/* End of file M_widget.php */
