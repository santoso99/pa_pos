<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Coa extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		user_log();
		$this->load->model('M_coa', 'model');
	}


	public function index()
	{
		$data = [
			'title'		=> 'Master Akun',
			'all'		=> $this->model->all(),
			'sub'		=> $this->model->sub(),
			'head'		=> $this->model->head()
		];
		$this->load->view('master/coa/chart_of_account', $data);
	}
	public function store()
	{
		$response = $this->model->insert();
		if ($response['status'] == 1) {
			$this->session->set_flashdata('success', 'Akun Berhasil di Tambahkan !');
			redirect('master/coa');
		} else {
			$this->session->set_flashdata('error', 'Akun Gagal di Tambahkan !');
			redirect('master/coa');
		}
	}
	public function update()
	{
		$response = $this->model->update();
		if ($response['status'] == 1) {
			$this->session->set_flashdata('success', 'Akun Berhasil di edit!');
			redirect('master/coa');
		} else {
			$this->session->set_flashdata('error', 'Akun Gagal di edit!');
			redirect('master/coa');
		}
	}
}

/* End of file Coa.php */
