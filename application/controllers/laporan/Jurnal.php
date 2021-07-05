<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Jurnal extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		user_log();
		$this->load->model('M_jurnal', 'model');
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
			'title'			=> 'Jurnal Umum',
			'row_jurnal'		=> $this->model->get_row_jurnal($y, $m),
			'jurnal'			=> $this->model->get_jurnal($y, $m),
			'month'			=> $m,
			'year'			=> $y
		];
		$this->load->view('laporan/akuntansi/jurnal_umum', $data);
	}
}

/* End of file Jurnal.php */
