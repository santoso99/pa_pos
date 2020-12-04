<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_buku extends CI_Model
{
	public function sub_akun()
	{
		return $this->db->get('coa_subhead')->result_array();
	}
	public function akun()
	{
		return $this->db->get('chart_of_account')->result_array();
	}
	public function all($y, $m, $a)
	{
		$this->db->select("a.tanggal,a.account_no,b.account_name,a.id_transaksi,IF( a.posisi = 'd', a.nominal, 0) AS debet,IF( a.posisi = 'k', a.nominal, 0) AS kredit,b.normal_balance")
			->from('jurnal as a')
			->join('chart_of_account as b', 'a.account_no=b.account_no')
			->where('b.account_name', $a)
			->where('month(a.tanggal)', $m)
			->where('year(a.tanggal)', $y);

		return $this->db->get()->result_array();
	}
}

/* End of file M_buku.php */
