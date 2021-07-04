<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_kas_masuk extends CI_Model
{
	public function all()
	{
		return $this->db->get_where('transaksi', ['tipe' => 'cash_in'])->result_array();
	}
	public function setting()
	{
		$this->db->select('a.id_setting,a.setting_name,a.type,b.debet,b.kredit')
			->from('setting_jurnal as a')
			->join('detail_setting_jurnal as b', 'a.id_setting=b.id_setting')
			->where('a.type', 'cash_in');

		return $this->db->get()->result_array();
	}
	public function find_select($id_setting)
	{
		$this->db->select('a.id_setting,a.setting_name,a.type,b.debet,b.kredit')
			->from('setting_jurnal as a')
			->join('detail_setting_jurnal as b', 'a.id_setting=b.id_setting')
			->where('a.type', 'cash_in')
			->where('a.id_setting', $id_setting);
		return $this->db->get()->row_array();
	}
	private function id()
	{
		$this->db->select('RIGHT(id_transaksi,9) as id', FALSE);
		$this->db->where('tipe', 'cash_in');
		$this->db->order_by('id_transaksi', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('transaksi');
		if ($query->num_rows() <> 0) {
			$data = $query->row();
			$code = intval($data->id) + 1;
		} else {
			$code = 1;
		}

		$interval = str_pad($code, 9, "0", STR_PAD_LEFT);
		$id = "TRX-KM-" . $interval;
		return $id;
	}
	public function store()
	{
		$id_transaksi = $this->id();
		$tanggal	  = date("Y-m-d H:i:s", strtotime($this->input->post('tanggal')));
		$id_setting = $this->input->post('id_setting');
		$jumlah	  = intval(preg_replace("/[^0-9]/", "", $this->input->post('jumlah')));
		$keterangan = $this->input->post('keterangan');
		$akun = $this->find_select($id_setting);
		$periode = date('Y', strtotime($tanggal)) . '' . date('m', strtotime($tanggal));
		$transaksi = [
			'id_transaksi'			=> $id_transaksi,
			'periode'				=> $periode,
			'tanggal'				=> $tanggal,
			'total'					=> $jumlah,
			'status'				=> 1,
			'tipe'					=> 'cash_in',
			'keterangan'			=> $keterangan
		];
		$gl = [
			[
				'account_no'		=> $akun['debet'],
				'periode'			=> $periode,
				'id_transaksi'		=> $id_transaksi,
				'tanggal'			=> $tanggal,
				'nominal'			=> $jumlah,
				'posisi'			=> 'd',
			],
			[
				'account_no'		=> $akun['kredit'],
				'periode'			=> $periode,
				'id_transaksi'		=> $id_transaksi,
				'tanggal'			=> $tanggal,
				'nominal'			=> $jumlah,
				'posisi'			=> 'k',
			]
		];
		// echo "<pre>";
		// echo print_r($transaksi);
		// echo print_r($gl);
		// echo "</pre>";
		// die;
		$this->db->trans_start();
		$this->db->insert('transaksi', $transaksi);
		$this->db->insert_batch('jurnal', $gl);
		$this->db->trans_complete();
	}
	public function update($id_transaksi)
	{

		$tanggal	  = date("Y-m-d H:i:s", strtotime($this->input->post('tanggal')));
		$jumlah	  = intval(preg_replace("/[^0-9]/", "", $this->input->post('jumlah')));
		$keterangan = $this->input->post('keterangan');
		$periode = date('Y', strtotime($tanggal)) . '' . date('m', strtotime($tanggal));

		$transaksi = [
			'tanggal'				=> $tanggal,
			'periode'				=> $periode,
			'total'					=> $jumlah,
			'status'				=> 1,
			'tipe'					=> 'cash_in',
			'keterangan'			=> $keterangan
		];
		$gl = [
			[
				'id_transaksi'		=> $id_transaksi,
				'periode'			=> $periode,
				'tanggal'			=> $tanggal,
				'nominal'			=> $jumlah,
			],
			[
				'id_transaksi'		=> $id_transaksi,
				'periode'			=> $periode,
				'tanggal'			=> $tanggal,
				'nominal'			=> $jumlah,
			]
		];
		// echo "<pre>";
		// echo print_r($transaksi);
		// echo print_r($gl);
		// echo "</pre>";
		// die;
		$this->db->trans_start();
		$this->db->update('transaksi', $transaksi, ['id_transaksi' => $id_transaksi]);
		$this->db->update_batch('jurnal', $gl, 'id_transaksi');
		$this->db->trans_complete();
	}
}

/* End of file M_kas_masuk.php */
