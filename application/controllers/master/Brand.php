<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Brand extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_brand', 'model');
	}

	public function index()
	{
		$data = [
			'title'		=> 'Master Brand',
			'all'		=> $this->model->all()
		];
		$this->load->view('master/brand/brand_list', $data);
	}
	public function store()
	{
		$file = $_FILES['logo_brand']['name'];
		if ($file === null) {
			$data = [
				'file_name' => 'default.png'
			];
			$this->model->store($data);
			$this->session->set_flashdata('sukses', 'Berhasil menambahkan brand produk !');
			redirect('master/brand');
		} else {
			$config['upload_path'] 		= './uploads/brand/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
			$config['encrypt_name']		= true;
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('logo_brand')) {
				$error = $this->upload->display_errors();
				$this->session->set_flashdata('error', 'Pesan: ' . $error . '!');
				redirect('master/brand');
			} else {
				$data = $this->upload->data();
				$this->model->store($data);
				$this->session->set_flashdata('success', 'Berhasil menambahkan brand produk !');
				redirect('master/brand');
			}
		}
	}
	public function update()
	{
		$id = $this->input->post('id_brand');
		$file = $_FILES['logo_brand']['name'];
		if ($file === null) {
			$data = [
				'file_name' => $this->input->post('old_logo')
			];
			$this->model->update($id, $data);
			$this->session->set_flashdata('sukses', 'Berhasil mengubah brand produk !');
			redirect('master/brand');
		} else {
			$config['upload_path'] 		= './uploads/brand/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
			$config['encrypt_name']		= true;
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('logo_brand')) {
				$error = $this->upload->display_errors();
				$this->session->set_flashdata('error', 'Pesan: ' . $error . '!');
				redirect('master/brand');
			} else {
				$data = $this->upload->data();
				$this->model->update($id, $data);
				$this->session->set_flashdata('success', 'Berhasil mengubah brand produk !');
				redirect('master/brand');
			}
		}
	}
}

/* End of file Brand.php */
