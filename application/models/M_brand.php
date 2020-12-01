<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_brand extends CI_Model
{
	public function all()
	{
		return $this->db->get('brand_barang')->result_array();
	}

	private function id()
	{
		$this->db->select('RIGHT(id_brand,5) as id', FALSE);
		$this->db->order_by('id_brand', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('brand_barang');
		if ($query->num_rows() <> 0) {
			$data = $query->row();
			$code = intval($data->id) + 1;
		} else {
			$code = 1;
		}

		$interval = str_pad($code, 5, "0", STR_PAD_LEFT);
		$id = "MD-BR-" . $interval;
		return $id;
	}

	public function store($data)
	{
		$id_brand 	= $this->id();
		$nama_brand 	= $this->input->post('nama_brand');
		$logo_brand	= $data['file_name'];
		$brand = [
			'id_brand'		=> $id_brand,
			'nama_brand'		=> $nama_brand,
			'logo_brand'		=> $logo_brand
		];

		return $this->db->insert('brand_barang', $brand);
	}
	public function update($id, $data)
	{
		$nama_brand 	= $this->input->post('nama_brand');
		$logo_brand	= $data['file_name'];
		$brand = [
			'nama_brand'		=> $nama_brand,
			'logo_brand'		=> $logo_brand
		];

		return $this->db->update('brand_barang', $brand, ['id_brand' => $id]);
	}
}

/* End of file M_brand.php */
