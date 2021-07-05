<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		user_log();
		$this->load->model('M_pelanggan', 'model');
	}


	public function index()
	{
		$data = [
			'title'		=> 'Master Pelanggan',
			'all'		=> $this->model->all()
		];

		$this->load->view('master/pelanggan/pelanggan_list', $data);
	}
	public function store()
	{
		$this->model->insert();
		$this->session->set_flashdata('success', 'Data Pelanggan berhasil ditambahkan !');
		redirect('master/pelanggan');
	}
	public function update()
	{
		$this->model->update();
		$this->session->set_flashdata('success', 'Data Pelanggan berhasil diedit !');
		redirect('master/pelanggan');
	}
}

/* End of file Pelanggan.php */
