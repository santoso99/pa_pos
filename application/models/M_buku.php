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
	public function saldo_awal($periode, $a)
	{
		$db = $this->db->select("IF( a.posisi = 'd', a.nominal, 0) AS debet,IF( a.posisi = 'k', a.nominal, 0) AS kredit,b.normal_balance")
			->from('jurnal as a')
			->join('chart_of_account as b', 'a.account_no=b.account_no')
			->where('b.account_name', $a)
			->where('a.periode <', $periode)
			->group_by('a.account_no')
			->get()->result_array();

		if (count($db) > 0) {
			if ($db[0]['normal_balance'] == 'd') {
				$saldo_awal_debet = $db[0]['debet'] - $db[0]['kredit'];
				$saldo_awal_kredit = 0;
				$saldo_awal = $saldo_awal_debet;
			} else {
				$saldo_awal_kredit = $db[0]['kredit'] - $db[0]['debet'];
				$saldo_awal_debet = 0;
				$saldo_awal = $saldo_awal_kredit;
			}
		} else {
			$saldo_awal_debet = 0;
			$saldo_awal_kredit = 0;
			$saldo_awal = 0;
		}

		$response = [
			'saldo_awal_debet'		=> $saldo_awal_debet,
			'saldo_awal_kredit'		=> $saldo_awal_kredit,
			'saldo_awal'			=> $saldo_awal
		];


		return $response;
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

	public function bb_versi2($periode, $account_no)
	{
		if ($account_no == 'all') {
			$sql1 = $this->db->get('chart_of_account')->result_array();
			foreach ($sql1 as $key => $val) {
				$sql2 = $this->db->select("DATE_FORMAT(a.tanggal,'%d/%m/%y') as tanggal,a.account_no,b.account_name,a.id_transaksi,IF( a.posisi = 'd', a.nominal, 0) AS debet,IF( a.posisi = 'k', a.nominal, 0) AS kredit,c.keterangan,b.normal_balance")
					->from('jurnal as a')
					->join('chart_of_account as b', 'a.account_no=b.account_no')
					->join('transaksi as c', 'a.id_transaksi=c.id_transaksi')
					->where('a.periode', $periode)
					->where('a.account_no', $val['account_no'])
					->get()
					->result_array();

				$sql3 =	$this->db->select('SUM(IF(a.posisi = "d",a.nominal,0)) as debet,sum(IF(a.posisi = "k",a.nominal,0)) as kredit')
					->from('jurnal as a')
					->join('chart_of_account as b', 'a.account_no=b.account_no')
					->where('a.periode <', $periode)
					->where('a.account_no', $val['account_no'])
					->get()
					->row_array();
				if ($val['normal_balance'] == 'd') {
					$saldo_awal_debet = $sql3['debet'] - $sql3['kredit'];
					$saldo_awal_kredit = 0;
					$saldo_awal = $saldo_awal_debet;
				} else {
					$saldo_awal_kredit = $sql3['kredit'] - $sql3['debet'];
					$saldo_awal_debet = 0;
					$saldo_awal = $saldo_awal_kredit;
				}
				$data[] = [
					'success'				=> true,
					'account_no'			=> $val['account_no'],
					'account_name'			=> $val['account_name'],
					'normal_balance'		=> $val['normal_balance'],
					'saldo_awal'			=> $saldo_awal,
					'saldo_awal_debet'		=> $saldo_awal_debet,
					'saldo_awal_kredit'		=> $saldo_awal_kredit,
					'gl'					=> $sql2
				];
			}
		} else {
			$sql1 = $this->db->get_where('chart_of_account', ['account_no' => $account_no])->result_array();
			foreach ($sql1 as $key => $val) {
				$sql2 = $this->db->select("DATE_FORMAT(a.tanggal,'%d/%m/%y') as tanggal,a.account_no,b.account_name,a.id_transaksi,IF( a.posisi = 'd', a.nominal, 0) AS debet,IF( a.posisi = 'k', a.nominal, 0) AS kredit,c.keterangan,b.normal_balance")
					->from('jurnal as a')
					->join('chart_of_account as b', 'a.account_no=b.account_no')
					->join('transaksi as c', 'a.id_transaksi=c.id_transaksi')
					->where('a.periode', $periode)
					->where('a.account_no', $val['account_no'])
					->get()
					->result_array();

				$sql3 =	$this->db->select('SUM(IF(a.posisi = "d",a.nominal,0)) as debet,sum(IF(a.posisi = "k",a.nominal,0)) as kredit')
					->from('jurnal as a')
					->join('chart_of_account as b', 'a.account_no=b.account_no')
					->where('a.periode <', $periode)
					->where('a.account_no', $val['account_no'])
					->get()
					->row_array();
				if ($val['normal_balance'] == 'd') {
					$saldo_awal_debet = $sql3['debet'] - $sql3['kredit'];
					$saldo_awal_kredit = 0;
					$saldo_awal = $saldo_awal_debet;
				} else {
					$saldo_awal_kredit = $sql3['kredit'] - $sql3['debet'];
					$saldo_awal_debet = 0;
					$saldo_awal = $saldo_awal_kredit;
				}
				$data[] = [
					'success'				=> true,
					'account_no'			=> $val['account_no'],
					'account_name'			=> $val['account_name'],
					'normal_balance'		=> $val['normal_balance'],
					'saldo_awal'			=> $saldo_awal,
					'saldo_awal_debet'		=> $saldo_awal_debet,
					'saldo_awal_kredit'		=> $saldo_awal_kredit,
					'gl'					=> $sql2
				];
			}
		}

		$res = [
			'success'		=> true,
			'periode'		=> bulan(substr($periode, 4, 2)) . ' ' . substr($periode, 0, 4),
			'values'		=> $data
		];


		return $res;
	}
}

/* End of file M_buku.php */
