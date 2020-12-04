<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_penjualan', 'model');
	}


	public function index()
	{
		$data = [
			'title'			=> 'Transaksi Penjualan',
			'all'			=> $this->model->all()
		];
		$this->load->view('transaksi/penjualan/penjualan_list', $data);
	}
	public function create_draff()
	{
		$request = $this->model->draff();
		redirect('transaksi/penjualan/create/' . $request['id_transaksi']);
	}
	public function find_produk()
	{
		$request = $this->model->find_produk();
		echo json_encode($request);
	}
	public function create($id)
	{
		$validate = $this->db->get_where('transaksi', ['id_transaksi' => $id])->row_array();
		if ($validate['status'] == 0) {
			$data = [
				'title'			=> 'Buat Penjualan Baru',
				'produk'			=> $this->model->produk(),
				'pelanggan'		=> $this->model->pelanggan(),
				'detail'			=> $this->model->detail($id),
				'id_transaksi'		=> $id
			];
			$this->load->view('transaksi/penjualan/penjualan_create', $data);
		} else {
			$data = [
				'title'			=> 'Detail Penjualan',
				'penjualan'		=> $this->model->select($id),
				'detail'			=> $this->model->detail($id),
				'id_transaksi'		=> $id
			];
			$this->load->view('transaksi/penjualan/penjualan_detail', $data);
		}
	}
	public function add_item()
	{
		$request = $this->model->add_item();
		$this->session->set_flashdata($request['response'], $request['message']);
		redirect('transaksi/penjualan/create/' . $request['id_transaksi']);
	}
	public function deleted_item($id_penjualan, $id_pembelian)
	{
		$request = $this->model->deleted_item($id_penjualan, $id_pembelian);
		$this->session->set_flashdata($request['response'], $request['message']);
		redirect('transaksi/penjualan/create/' . $request['id_transaksi']);
	}
	public function store()
	{
		$request = $this->model->store();
		$this->session->set_flashdata($request['response'], $request['message']);
		redirect('transaksi/penjualan');
	}
}

/* End of file Penjualan.php */
