<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pembelian extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		user_log();
		$this->load->model('M_purchase_report', 'model');
	}


	public function index()
	{
		$periode = $this->input->post('periode');
		if ($periode === null) {
			$m = date('m');
			$y = date('Y');
		} else {
			$m = date('m', strtotime($periode));
			$y = date('Y', strtotime($periode));
		}
		$data = [
			'title'			=> 'Laporan Pembelian',
			'all'			=> $this->model->all($y, $m),
			'month'			=> $m,
			'year'			=> $y
		];
		$this->load->view('laporan/pembelian/pembelian_report', $data);
	}
}

/* End of file Pembelian.php */
