<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Retur_pembelian extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        user_log();
        $this->load->model('M_retur_pembelian', 'model');
    }


    public function index()
    {
        $data = [
            'title'             => 'Retur Pembelian',
            'all'               => $this->model->all()
        ];

        $this->load->view('transaksi/retur_pembelian/content', $data);
    }
    public function create()
    {
        $data = [
            'title'             => 'Buat Retur Pembelian',
            'pembelian'         => $this->model->get_pembelian()
        ];

        $this->load->view('transaksi/retur_pembelian/create', $data);
    }

    public function find($id)
    {
        $req = $this->model->find($id);

        echo json_encode($req);
    }

    public function store()
    {
        $req = $this->model->store();

        $this->session->set_flashdata('success', 'Data  berhasil ditambahkan !');
        redirect('retur/pembelian');
        // echo "<pre>";
        // print_r($req);
        // echo "</pre>";
        // echo json_encode($req);
    }
}

/* End of file Retur_pembelian.php */
