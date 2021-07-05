<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_user', 'model');
    }


    public function index()
    {
        $data = [
            'title'     => 'Setting Pengguna',
            'all'       => $this->model->all(),
            'roles'     => $this->model->roles()
        ];
        $this->load->view('setting/user', $data);
    }
    public function store()
    {
        $this->model->store();
        $this->session->set_flashdata('success', 'Berhasil menambahkan data !');
        redirect('setting/pengguna');
    }
    public function update()
    {
        $this->model->update();
        $this->session->set_flashdata('success', 'Berhasil melakukan perubahan data !');
        redirect('setting/pengguna');
    }
}

/* End of file User.php */
