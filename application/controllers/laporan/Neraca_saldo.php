<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Neraca_saldo extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_neraca_saldo', 'model');
	}


	public function index()
	{
		$periode = $this->input->post('periode');
		if ($periode === null) {
			$m = date('m');
			$y = date('Y');
			$a = 'Kas';
		} else {
			$m = date('m', strtotime($periode));
			$y = date('Y', strtotime($periode));
		}
		$data = [
			'title'			=> 'Neraca Saldo',
			'all'			=> $this->model->all($y, $m),
			'head'			=> $this->model->head(),
			'sub'			=> $this->model->sub_akun(),
			'list_akun'		=> $this->model->akun(),
			'month'			=> $m,
			'year'			=> $y
		];
		// var_dump($data['akun']);
		// die;
		$this->load->view('laporan/akuntansi/neraca_saldo', $data);
	}
}

/* End of file Neraca_saldo.php */
