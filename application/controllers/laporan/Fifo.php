<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Fifo extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		user_log();
		$this->load->model('M_fifo', 'model');
	}


	public function index()
	{
		$periode = $this->input->get('periode');
		$id = $this->input->get('id');
		if ($periode === null && $id === null) {
			$m = date('m');
			$y = date('Y');
			$id = '1';
		} else {
			$m = date('m', strtotime($periode));
			$y = date('Y', strtotime($periode));
			$id = $this->input->get('id');
			$periode = $y . '' . $m;
		}
		$data = [
			'title'			=> 'Kartu Stok',
			'all'			=> $this->model->all($y, $m, $id),
			'stok_data'		=> $this->model->try($y, $m, $id),
			'stock'			=> $this->model->stock(),
			'produk'		=> $this->model->produk(),
			'month'			=> $m,
			'year'			=> $y
		];

		$this->load->view('laporan/persediaan/fifo', $data);
	}
	public function try()
	{
		$periode = '202107';
		$id = '1';

		$req = $this->model->try($periode, $id);

		echo json_encode($req);
	}
}

/* End of file Fifo.php */
