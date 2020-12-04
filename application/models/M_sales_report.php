<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_sales_report extends CI_Model
{
	public function all($y, $m)
	{
		$this->db->select('a.id_transaksi,a.tanggal,a.total,b.nama_pelanggan')
			->from('transaksi as a')
			->join('pelanggan as b', 'a.id_pelanggan=b.id_pelanggan')
			->where('a.tipe', 'order')
			->where('month(a.tanggal)', $m)
			->where('year(a.tanggal)', $y);
		return $this->db->get()->result_array();
	}
}

/* End of file M_sales_report.php */
