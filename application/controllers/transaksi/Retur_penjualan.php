<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Retur_penjualan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        user_log();
        $this->load->model('M_retur_penjualan', 'model');
    }


    public function index()
    {
        $data = [
            'title'             => 'Retur Penjualan',
            'all'               => $this->model->all()
        ];

        $this->load->view('transaksi/retur_penjualan/content', $data);
    }
    public function create()
    {
        $data = [
            'title'             => 'Buat Retur Penjualan',
            'pembelian'         => $this->model->get_pembelian()
        ];

        $this->load->view('transaksi/retur_penjualan/create', $data);
    }

    public function find($id)
    {
        $req = $this->model->find($id);

        echo json_encode($req);
    }

    public function store()
    {
        $req = $this->model->store();

        // echo "<pre>";
        // print_r($req);
        // echo "</pre>";
        // die;

        $this->session->set_flashdata('success', 'Data berhasil ditambahkan !');
        redirect('retur/penjualan');

        // echo json_encode($req);
    }
}

/* End of file Retur_penjualan.php */
