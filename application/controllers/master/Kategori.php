<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_kategori', 'model');
	}


	public function index()
	{
		$data = [
			'title'	=> 'Master Kategori Produk',
			'all'	=> $this->model->all()
		];
		$this->load->view('master/kategori/kategori_list', $data, FALSE);
	}
	public function store()
	{
		$this->model->store();
		$this->session->set_flashdata('success', 'Berhasil menambahkan kategori produk !');
		redirect('master/kategori');
	}
	public function update()
	{
		$id	= $this->input->post('id_kategori');
		$this->model->update($id);
		$this->session->set_flashdata('success', 'Berhasil menambahkan kategori produk !');
		redirect('master/kategori');
	}
}

/* End of file Kategori.php */
