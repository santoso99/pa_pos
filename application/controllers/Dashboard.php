<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		user_log();
		$this->load->model('M_widget', 'model');
	}


	public function index()
	{
		$data = [
			'title'				=> 'Dashboard',
			'sales'				=> $this->model->sales(),
			'latest_sales'			=> $this->model->latest_sales(),
			'latest_purchasing'		=> $this->model->latest_purchasing()
		];
		$this->load->view('dashboard', $data);
	}

	public function test_menu()
	{
		$id = '1';

		$req = get_menu($id);

		echo json_encode($req);
	}
}

/* End of file Dashboard.php */
