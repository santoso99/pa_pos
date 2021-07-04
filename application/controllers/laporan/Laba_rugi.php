<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Laba_rugi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_lb', 'model');
    }


    public function index()
    {
        $periode = $this->input->post('periode');
        if ($periode === null) {
            $m = date('m');
            $y = date('Y');
            $a = 'Kas';
        } else {
            $m = date('m', strtotime($periode));
            $y = date('Y', strtotime($periode));
        }
        // $req = $this->model->all();
        $data = [
            'title'         => 'Laba Rugi',
            'lb'            => $this->model->get_data($y, $m),
            'month'            => $m,
            'year'            => $y
        ];

        $this->load->view('laporan/akuntansi/laba_rugi', $data);
    }
}

/* End of file Laba_rugi.php */
