<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function index()
	{
		$data = [
			'title'		=> 'Dashboard'
		];
		$this->load->view('dashboard', $data);
	}
}

/* End of file Dashboard.php */
