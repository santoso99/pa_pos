<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kas_masuk extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}


	public function index()
	{
		$data = [
			'title'		=> 'Kas Masuk'
		];
		$this->load->view('transaksi/kas/masuk', $data);
	}
}

/* End of file Kas_masuk.php */
