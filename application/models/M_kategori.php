<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_kategori extends CI_Model
{
	public function all()
	{
		return $this->db->get('kategori_barang')->result_array();
	}

	private function id()
	{
		$this->db->select('RIGHT(id_kategori,5) as id', FALSE);
		$this->db->order_by('id_kategori', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('kategori_barang');
		if ($query->num_rows() <> 0) {
			$data = $query->row();
			$code = intval($data->id) + 1;
		} else {
			$code = 1;
		}

		$interval = str_pad($code, 5, "0", STR_PAD_LEFT);
		$id = "MD-KP-" . $interval;
		return $id;
	}

	public function store()
	{
		$id_kategori 		= $this->id();
		$nama_kategori 	= $this->input->post('nama_kategori');
		$kategori = [
			'id_kategori'		=> $id_kategori,
			'nama_kategori'	=> $nama_kategori
		];

		return $this->db->insert('kategori_barang', $kategori);
	}
	public function update($id)
	{
		$nama_kategori 	= $this->input->post('nama_kategori');
		$kategori = [
			'nama_kategori'	=> $nama_kategori
		];

		return $this->db->update('kategori_barang', $kategori, ['id_kategori' => $id]);
	}
}

/* End of file M_kategori.php */
