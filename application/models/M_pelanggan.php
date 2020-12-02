<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_pelanggan extends CI_Model
{
	public function all()
	{
		return $this->db->get('pelanggan')->result_array();
	}
	private function id()
	{
		$this->db->select('RIGHT(id_pelanggan,5) as id', FALSE);
		$this->db->order_by('id_pelanggan', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('pelanggan');
		if ($query->num_rows() <> 0) {
			$data = $query->row();
			$code = intval($data->id) + 1;
		} else {
			$code = 1;
		}

		$interval = str_pad($code, 5, "0", STR_PAD_LEFT);
		$id = "MD-PL-" . $interval;
		return $id;
	}
	public function insert()
	{
		$id = $this->id();
		$data = [
			'id_pelanggan'		=> $id,
			'nama_pelanggan'	=> $this->input->post('nama_pelanggan'),
			'no_telp'			=> $this->input->post('no_telp'),
			'email_pelanggan'		=> $this->input->post('email_pelanggan'),
			'alamat_pelanggan'	=> $this->input->post('alamat_pelanggan')
		];
		return $this->db->insert('pelanggan', $data);
	}
	public function update()
	{
		$id = $this->input->post('id_pelanggan');
		$data = [
			'nama_pelanggan'	=> $this->input->post('nama_pelanggan'),
			'no_telp'			=> $this->input->post('no_telp'),
			'email_pelanggan'	=> $this->input->post('email_pelanggan'),
			'alamat_pelanggan'	=> $this->input->post('alamat_pelanggan')
		];
		return $this->db->update('pelanggan', $data, ['id_pelanggan' => $id]);
	}
}

/* End of file M_pelanggan.php */
