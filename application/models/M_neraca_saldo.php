<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_neraca_saldo extends CI_Model
{
	public function head()
	{
		return $this->db->get('coa_head')->result_array();
	}
	public function sub_akun()
	{
		return $this->db->get('coa_subhead')->result_array();
	}
	public function akun()
	{
		return $this->db->get('chart_of_account')->result_array();
	}
	public function all($y, $m)
	{
		$this->db->select("a.tanggal,a.account_no,b.account_name,sum(IF( a.posisi = 'd', a.nominal, 0)) AS debet,sum(IF( a.posisi = 'k', a.nominal, 0)) AS kredit,b.normal_balance,b.sub_code")
			->from('jurnal as a')
			->join('chart_of_account as b', 'a.account_no=b.account_no')
			->where('month(a.tanggal)', $m)
			->where('year(a.tanggal)', $y)
			->group_by('a.account_no');

		return $this->db->get()->result_array();
	}
}

/* End of file M_neraca_saldo.php */
