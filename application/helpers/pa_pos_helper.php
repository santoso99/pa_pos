<?php

function user_log()
{
    $CI3 = get_instance();
    if (!$CI3->session->userdata('user_id')) {
        redirect('login');
    }
}

function get_menu($role)
{
    $CI3 = get_instance();

    $sql = $CI3->db->select('a.head_id, a.head_name, a.icon, a.id')
        ->from('menu_head as a')
        ->order_by('a.nu')
        ->get()
        ->result_array();

    foreach ($sql as  $key => $val) {
        $sql2 = $CI3->db->select('a.tcode, b.nu,b.menu_name,b.url')
            ->from('menu_access as a')
            ->join('menu_item as b', 'a.tcode = b.tcode')
            ->where('a.role_id', $role)
            ->where('b.head_id', $val['head_id'])
            ->order_by('b.nu')
            ->get()
            ->result_array();
        $data[] = [
            'head_id'       => $val['head_id'],
            'head_name'     => $val['head_name'],
            'icon'          => $val['icon'],
            'id'            => $val['id'],
            'menu_item'     => $sql2
        ];
    }

    return $data;
}

function getProfile($user_id)
{
    $CI3 = get_instance();
    $sql = $CI3->db->select('a.username, a.user_id, a.name, b.role_name')
        ->from('users as a')
        ->join('roles as b', 'a.role = b.id')
        ->where('a.user_id', $user_id)
        ->get()
        ->row_array();

    return $sql;
}
