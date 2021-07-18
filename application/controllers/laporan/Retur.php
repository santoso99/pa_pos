<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Retur extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        user_log();
        $this->load->model('M_report_retur', 'model');
    }
    public function index()
    {
        $periode = $this->input->post('periode');
        if ($periode === null) {
            $m = date('m');
            $y = date('Y');
        } else {
            $m = date('m', strtotime($periode));
            $y = date('Y', strtotime($periode));
        }
        $data = [
            'title'             => "Laporan Retur Pembelian",
            'all'               => $this->model->purchase_return_report($y, $m),
            'month'             => $m,
            'year'              => $y
        ];
        $this->load->view('laporan/retur/purchase_return_report', $data);
    }
}

/* End of file Retur.php */
