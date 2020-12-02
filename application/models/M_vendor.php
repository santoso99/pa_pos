<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_vendor extends CI_Model
{
	public function all()
	{
		return $this->db->get('vendor')->result_array();
	}
	private function id()
	{
		$this->db->select('RIGHT(id_vendor,5) as id', FALSE);
		$this->db->order_by('id_vendor', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('vendor');
		if ($query->num_rows() <> 0) {
			$data = $query->row();
			$code = intval($data->id) + 1;
		} else {
			$code = 1;
		}

		$interval = str_pad($code, 5, "0", STR_PAD_LEFT);
		$id = "MD-VN-" . $interval;
		return $id;
	}
	public function insert()
	{
		$id = $this->id();
		$data = [
			'id_vendor'		=> $id,
			'nama_vendor'		=> $this->input->post('nama_vendor'),
			'no_telp'			=> $this->input->post('no_telp'),
			'email_vendor'		=> $this->input->post('email_vendor'),
			'alamat_vendor'	=> $this->input->post('alamat_vendor')
		];
		return $this->db->insert('vendor', $data);
	}
	public function update()
	{
		$id = $this->input->post('id_vendor');
		$data = [
			'nama_vendor'		=> $this->input->post('nama_vendor'),
			'no_telp'			=> $this->input->post('no_telp'),
			'email_vendor'		=> $this->input->post('email_vendor'),
			'alamat_vendor'	=> $this->input->post('alamat_vendor')
		];
		return $this->db->update('vendor', $data, ['id_vendor' => $id]);
	}
}

/* End of file M_vendor.php */
