<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Buku extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_buku', 'model');
	}


	public function index()
	{
		$periode = $this->input->post('periode');
		$account_name    = $this->input->post('account_name');
		if ($periode === null || $account_name === null) {
			$m = date('m');
			$y = date('Y');
			$a = 'Kas';
		} else {
			$m = date('m', strtotime($periode));
			$y = date('Y', strtotime($periode));
			$a = $account_name;
		}
		$data = [
			'title'			=> 'Buku Besar',
			'all'			=> $this->model->all($y, $m, $a),
			'sub'			=> $this->model->sub_akun(),
			'list_akun'		=> $this->model->akun(),
			'month'			=> $m,
			'year'			=> $y,
			'akun'			=> $a
		];
		// var_dump($data['akun']);
		// die;
		$this->load->view('laporan/akuntansi/buku_besar', $data);
	}
}

/* End of file Buku.php */
