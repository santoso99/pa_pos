<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_sales_report', 'model');
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
			'title'			=> 'Laporan Penjualan',
			'all'			=> $this->model->all($y, $m),
			'month'			=> $m,
			'year'			=> $y
		];
		$this->load->view('laporan/penjualan/penjualan_report', $data);
	}
}

/* End of file Penjualan.php */
