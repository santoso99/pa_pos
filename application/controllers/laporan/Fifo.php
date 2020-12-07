<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Fifo extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_fifo', 'model');
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
			'title'			=> 'Kartu Stok',
			'all'			=> $this->model->all($y, $m),
			'ref'			=> $this->model->list($y, $m),
			'month'			=> $m,
			'year'			=> $y
		];

		$this->load->view('laporan/persediaan/fifo', $data);
	}
}

/* End of file Fifo.php */
