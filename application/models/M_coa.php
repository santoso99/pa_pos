<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_coa extends CI_Model
{
	public function head()
	{
		return $this->db->get('coa_head')->result_array();
	}
	public function sub()
	{
		return $this->db->get('coa_subhead')->result_array();
	}
	public function all()
	{
		return $this->db->get('chart_of_account')->result_array();
	}
	private function id($sub_code)
	{
		$this->db->select('RIGHT(account_no,4) as id', FALSE);
		$this->db->where('sub_code', $sub_code);
		$this->db->order_by('account_no', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('chart_of_account');
		if ($query->num_rows() <> 0) {
			$data = $query->row();
			$code = intval($data->id) + 1;
		} else {
			$code = 1;
		}
		$sub = $this->db->get_where('coa_subhead', ['sub_code' => $sub_code])->row_array();
		$interval = str_pad($code, 4, "0", STR_PAD_LEFT);
		$id = $sub['sub_code'] . $interval;
		return $id;
	}
	public function insert()
	{
		$data = [
			'account_no'		=> $this->id($this->input->post('sub_code')),
			'account_name'		=> $this->input->post('account_name'),
			'normal_balance'	=> $this->input->post('normal_balance'),
			'sub_code'		=> $this->input->post('sub_code')
		];
		if ($this->db->insert('chart_of_account', $data)) {
			$response = [
				'status'	=> 1
			];
		} else {
			$response = [
				'status'	=> 1
			];
		}
		return $response;
	}
	public function update()
	{
		$id = $this->input->post('account_no');
		$data = [
			'account_name'		=> $this->input->post('account_name'),
			'normal_balance'	=> $this->input->post('normal_balance')
		];
		if ($this->db->update('chart_of_account', $data, ['account_no' => $id])) {
			$response = [
				'status'	=> 1
			];
		} else {
			$response = [
				'status'	=> 1
			];
		}
		return $response;
	}
}

/* End of file M_coa.php */
