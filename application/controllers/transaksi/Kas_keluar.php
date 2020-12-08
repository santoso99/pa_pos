<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kas_keluar extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_kas_keluar', 'model');
	}


	public function index()
	{
		$data = [
			'title'		=> 'Kas Keluar',
			'all'		=> $this->model->all(),
			'setting'		=> $this->model->setting()
		];
		$this->load->view('transaksi/kas/keluar', $data);
	}
	public function store()
	{
		$this->model->store();
		$this->session->set_flashdata('success', 'Data Kas Keluar berhasil ditambahkan !');
		redirect('kas/keluar');
	}
	public function update()
	{
		$id_transaksi = $this->input->post('id_transaksi');
		$this->model->update($id_transaksi);
		$this->session->set_flashdata('success', 'No Transaksi ' . $id_transaksi . ' berhasil diedit !');
		redirect('kas/keluar');
	}
}

/* End of file Kas_keluar.php */
