<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_produk extends CI_Model
{
	public function all()
	{
		return $this->db->get('barang')->result_array();
	}
	public function select($id)
	{
		return $this->db->get_where('barang', ['id_barang' => $id])->row_array();
	}
	public function warna($id)
	{
		return $this->db->get_where('warna_barang', ['id_barang' => $id])->result_array();
	}
	public function category()
	{
		return $this->db->get('kategori_barang')->result_array();
	}
	public function brand()
	{
		return $this->db->get('brand_barang')->result_array();
	}
	private function id()
	{
		$this->db->select('RIGHT(id_barang,9) as id', FALSE);
		$this->db->order_by('id_barang', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('barang');
		if ($query->num_rows() <> 0) {
			$data = $query->row();
			$code = intval($data->id) + 1;
		} else {
			$code = 1;
		}

		$interval = str_pad($code, 9, "0", STR_PAD_LEFT);
		$id = "MD-PR-" . $interval;
		return $id;
	}
	public function store($data)
	{
		$nama_warna = $this->input->post('nama_warna');
		$id = $this->id();
		$produk = [
			'id_barang'			=> $id,
			'nama_barang'			=> $this->input->post('nama_barang'),
			'id_kategori'			=> $this->input->post('id_kategori'),
			'id_brand'			=> $this->input->post('id_brand'),
			'ram'				=> $this->input->post('ram'),
			'memori'				=> $this->input->post('memori'),
			'layar'				=> $this->input->post('layar'),
			'os'					=> $this->input->post('os'),
			'deskripsi_barang'		=> $this->input->post('deskripsi_barang'),
			'harga_satuan'			=> intval(preg_replace("/[^0-9]/", "", $this->input->post('harga_satuan'))),
			'foto_barang'			=> $data['file_name']
		];
		foreach ($nama_warna as $key => $val) {
			$warna[] = [
				'id_barang'		=> $id,
				'nama_warna'		=> $nama_warna[$key]
			];
		}
		$this->db->trans_start();
		$this->db->insert('barang', $produk);
		$this->db->insert_batch('warna_barang', $warna);
		$this->db->trans_complete();
	}
	public function update($id, $data)
	{
		$nama_warna = $this->input->post('nama_warna');
		$produk = [
			'nama_barang'			=> $this->input->post('nama_barang'),
			'id_kategori'			=> $this->input->post('id_kategori'),
			'id_brand'			=> $this->input->post('id_brand'),
			'ram'				=> $this->input->post('ram'),
			'memori'				=> $this->input->post('memori'),
			'layar'				=> $this->input->post('layar'),
			'os'					=> $this->input->post('os'),
			'deskripsi_barang'		=> $this->input->post('deskripsi_barang'),
			'harga_satuan'			=> intval(preg_replace("/[^0-9]/", "", $this->input->post('harga_satuan'))),
			'foto_barang'			=> $data['file_name']
		];
		foreach ($nama_warna as $key => $val) {
			$warna[] = [
				'id_warna'		=> $this->input->post('id_warna'),
				'id_barang'		=> $id,
				'nama_warna'		=> $nama_warna[$key]
			];
		}
		$this->db->trans_start();
		$this->db->update('barang', $produk, ['id_barang' => $id]);
		$this->db->update_batch('warna_barang', $warna, 'id_warna');
		$this->db->trans_complete();
	}
}

/* End of file M_produk.php */
