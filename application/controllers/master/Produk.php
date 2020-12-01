<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_produk', 'model');
	}


	public function index()
	{
		$data = [
			'title'		=> 'Master Produk',
			'all'		=> $this->model->all()
		];
		$this->load->view('master/produk/produk_list', $data);
	}
	public function create()
	{
		$data = [
			'title'		=> 'Tambah Produk Baru',
			'category'	=> $this->model->category(),
			'brand'		=> $this->model->brand()
		];
		$this->load->view('master/produk/produk_create', $data);
	}
	public function store()
	{
		$config['upload_path'] 		= './uploads/produk/';
		$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
		$config['encrypt_name']		= true;
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('foto_produk')) {
			$data = [
				'file_name'		=> 'default.png'
			];
			$this->model->store($data);
			$this->session->set_flashdata('success', 'Berhasil menambahkan produk !');
			redirect('master/produk');
		} else {
			$data = $this->upload->data();
			$this->model->store($data);
			$this->session->set_flashdata('success', 'Berhasil menambahkan produk !');
			redirect('master/produk');
		}
	}
	public function edit($id)
	{
		$data = [
			'title'		=> 'Edit Produk',
			'category'	=> $this->model->category(),
			'brand'		=> $this->model->brand(),
			'produk'		=> $this->model->select($id),
			'warna'		=> $this->model->warna($id)
		];
		$this->load->view('master/produk/produk_edit', $data);
	}
	public function update()
	{
		$id = $this->input->post('id_barang');
		$config['upload_path'] 		= './uploads/produk/';
		$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
		$config['encrypt_name']		= true;
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('foto_produk')) {
			$data = [
				'file_name'		=> $this->input->post('foto_old')
			];
			$this->model->update($id, $data);
			$this->session->set_flashdata('success', 'Berhasil mengedit produk !');
			redirect('master/produk');
		} else {
			$data = $this->upload->data();
			$this->model->update($id, $data);
			$this->session->set_flashdata('success', 'Berhasil mengedit produk !');
			redirect('master/produk');
		}
	}
	public function show($id)
	{
		$data = [
			'title'		=> 'Detail Produk',
			'category'	=> $this->model->category(),
			'brand'		=> $this->model->brand(),
			'produk'		=> $this->model->select($id),
			'warna'		=> $this->model->warna($id)
		];
		$this->load->view('master/produk/produk_detail', $data);
	}
}

/* End of file Produk.php */
