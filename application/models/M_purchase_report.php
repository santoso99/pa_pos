<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_purchase_report extends CI_Model
{
	public function all($y, $m)
	{
		$this->db->select('a.id_transaksi,a.tanggal,a.total,b.nama_vendor')
			->from('transaksi as a')
			->join('vendor as b', 'a.id_vendor=b.id_vendor')
			->where('a.tipe', 'purchasing')
			->where('month(a.tanggal)', $m)
			->where('year(a.tanggal)', $y);
		return $this->db->get()->result_array();
	}
}

/* End of file M_purchase_report.php */
