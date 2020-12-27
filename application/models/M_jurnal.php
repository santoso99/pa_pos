<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_jurnal extends CI_Model
{

	public function get_jurnal($y, $m)
	{
		$this->db->select('a.id_transaksi,a.account_no,a.tanggal,a.nominal,a.posisi,b.account_name')
			->from('jurnal as a')
			->join('chart_of_account as b', 'a.account_no=b.account_no')
			->where('month(a.tanggal)', $m)
			->where('year(a.tanggal)', $y)
			->order_by('a.id_jurnal', 'ASC');
		return $this->db->get()->result_array();
	}
	public function get_row_jurnal($y, $m)
	{
		$this->db->select('a.id_transaksi,count(a.id_transaksi) as row,date(a.tanggal) as tanggal')
			->from('jurnal as a')
			->where('month(a.tanggal)', $m)
			->where('year(a.tanggal)', $y)
			->group_by('a.id_transaksi')
			->group_by('date(a.tanggal)')
			->order_by('a.tanggal', 'ASC')
			->order_by('a.id_transaksi', 'ASC');
		return $this->db->get()->result_array();
	}
}

/* End of file M_jurnal.php */
