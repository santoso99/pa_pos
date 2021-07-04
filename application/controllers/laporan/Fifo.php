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
		}
		$data = [
			'title'			=> 'Kartu Stok',
			'all'			=> $this->model->all($y, $m, $id),
			'stock'			=> $this->model->stock(),
			'produk'		=> $this->model->produk(),
			'month'			=> $m,
			'year'			=> $y
		];

		$this->load->view('laporan/persediaan/fifo', $data);
	}
	// public function try()
	// {
	// 	$periode = $this->input->post('periode');
	// 	if ($periode === null) {
	// 		$m = date('m');
	// 		$y = date('Y');
	// 	} else {
	// 		$m = date('m', strtotime($periode));
	// 		$y = date('Y', strtotime($periode));
	// 	}
	// 	$req = $this->model->all($y, $m);

	// 	echo json_encode($req);
	// }
}

/* End of file Fifo.php */
