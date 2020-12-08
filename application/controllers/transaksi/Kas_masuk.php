<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kas_masuk extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_kas_masuk', 'model');
	}


	public function index()
	{
		$data = [
			'title'		=> 'Kas Masuk',
			'all'		=> $this->model->all(),
			'setting'		=> $this->model->setting()
		];
		$this->load->view('transaksi/kas/masuk', $data);
	}
	public function store()
	{
		$this->model->store();
		$this->session->set_flashdata('success', 'Data Kas Masuk berhasil ditambahkan !');
		redirect('kas/masuk');
	}
	public function update()
	{
		$id_transaksi = $this->input->post('id_transaksi');
		$this->model->update($id_transaksi);
		$this->session->set_flashdata('success', 'No Transaksi ' . $id_transaksi . ' berhasil diedit !');
		redirect('kas/masuk');
	}
}

/* End of file Kas_masuk.php */
