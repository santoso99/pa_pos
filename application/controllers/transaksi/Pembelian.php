<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pembelian extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_pembelian', 'model');
	}


	public function index()
	{
		$data = [
			'title'		=> 'Transaksi Pembelian'
		];
		$this->load->view('transaksi/pembelian/pembelian_list', $data);
	}
	public function create()
	{
		$data = [
			'title'		=> 'Buat Pembelian Baru',
			'vendor'		=> $this->model->vendor(),
			'produk'		=> $this->model->produk(),
		];
		$this->load->view('transaksi/pembelian/pembelian_create', $data);
	}
	public function store()
	{
		$this->model->store();
	}
}

/* End of file Pembelian.php */
