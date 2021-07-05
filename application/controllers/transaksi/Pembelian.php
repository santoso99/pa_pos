<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pembelian extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		user_log();
		$this->load->model('M_pembelian', 'model');
	}


	public function index()
	{
		$data = [
			'title'		=> 'Transaksi Pembelian',
			'all'		=> $this->model->all()
		];
		$this->load->view('transaksi/pembelian/pembelian_list', $data);
	}
	public function show($id)
	{
		$data = [
			'title'		=> 'Detail Transaksi Pembelian',
			'pembelian'	=> $this->model->select($id),
			'detail'		=> $this->model->detail($id)
		];
		$this->load->view('transaksi/pembelian/pembelian_detail', $data);
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
		$request = $this->model->store();
		$this->session->set_flashdata($request['response'], $request['message']);
		redirect('transaksi/pembelian');
	}
}

/* End of file Pembelian.php */
