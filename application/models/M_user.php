<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{
    public function all()
    {
        $sql = $this->db->select('a.user_id, a.name, a.username, b.id,b.role_name')
            ->from('users as a')
            ->join('roles as b', 'a.role=b.id')
            ->get()
            ->result_array();

        return $sql;
    }

    public function select($id)
    {
        $sql = $this->db->select('a.user_id, a.name, a.username, b.role_id,b.role_name')
            ->from('users as a')
            ->join('roles as b', 'a.role=b.role_id')
            ->where('user_id', $id)
            ->get()
            ->row_array();

        return $sql;
    }

    public function roles()
    {
        return $this->db->get('roles')->result_array();
    }

    public function store()
    {
        $name          = $this->input->post('name');
        $username      = $this->input->post('username');
        $role          = $this->input->post('role');
        $password      = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

        $data = [
            'name'          => $name,
            'username'      => $username,
            'role'          => $role,
            'password'      => $password

        ];
        if ($this->db->insert('users', $data)) {
            $res = [
                'status'        => true,
                'message'       => 'Data Berhasil di Simpan'
            ];
        } else {
            $res = [
                'status'        => false,
                'message'       => $this->db->error()
            ];
        }

        return $res;
    }

    public function update()
    {
        $user_id       = $this->input->post('user_id');
        $name          = $this->input->post('name');
        $username      = $this->input->post('username');
        $role          = $this->input->post('role');
        $password      = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

        $data = [
            'name'          => $name,
            'username'      => $username,
            'role'          => $role,
            'password'      => $password

        ];
        if ($this->db->update('users', $data, ['user_id' => $user_id])) {
            $res = [
                'status'        => true,
                'message'       => 'Data Berhasil di Update'
            ];
        } else {
            $res = [
                'status'        => false,
                'message'       => $this->db->error()
            ];
        }

        return $res;
    }

    public function destroy($id)
    {
        if ($this->db->delete('users', ['user_id' => $id])) {
            $res = [
                'status'        => true,
                'message'       => 'Data ' . $id . ' Berhasil di hapus '
            ];
        } else {
            $res = [
                'status'        => false,
                'message'       => $this->db->error()
            ];
        }

        return $res;
    }
}

/* End of file M_user.php */
