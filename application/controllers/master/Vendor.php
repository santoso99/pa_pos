<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Vendor extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		user_log();
		$this->load->model('M_vendor', 'model');
	}


	public function index()
	{
		$data = [
			'title'		=> 'Master Vendor',
			'all'		=> $this->model->all()
		];

		$this->load->view('master/vendor/vendor_list', $data);
	}
	public function store()
	{
		$this->model->insert();
		$this->session->set_flashdata('success', 'Data Vendor berhasil ditambahkan !');
		redirect('master/vendor');
	}
	public function update()
	{
		$this->model->update();
		$this->session->set_flashdata('success', 'Data Vendor berhasil diedit !');
		redirect('master/vendor');
	}
}

/* End of file Vendor.php */
