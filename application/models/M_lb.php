<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_lb extends CI_Model
{

    public function all()
    {
        $where = ['4', '5', '6'];
        $sql = $this->db->select('*')
            ->from('coa_head')
            ->where_in('head_code', $where)
            ->get()
            ->result_array();

        foreach ($sql as $row1) {
            $sql2 = $this->db->get_where('coa_subhead', ['head_code' => $row1['head_code']])->result_array();
            $res[] = [
                'head_code'           => $row1['head_code'],
                'head_name'           => $row1['head_name'],
                'coa_subhead'         => $sql2
            ];
        }
        return $res;
    }
    public function get_data($y, $m)
    {
        $where = ['4', '5', '6'];
        $saldo = 0;
        $sql =  $this->db->select("a.account_no,b.account_name,sum(IF( a.posisi = 'd', a.nominal, 0)) AS debet,sum(IF( a.posisi = 'k', a.nominal, 0)) AS kredit,b.normal_balance,b.sub_code,c.head_code")
            ->from('jurnal as a')
            ->join('chart_of_account as b', 'a.account_no=b.account_no')
            ->join('coa_subhead as c', 'b.sub_code=c.sub_code')
            ->where_in('c.head_code', $where)
            ->where('month(a.tanggal)', $m)
            ->where('year(a.tanggal)', $y)
            ->group_by('a.account_no')
            ->get()
            ->result_array();
        $hasil = 0;
        foreach ($sql as $row1) {
            if ($row1['normal_balance'] == 'd') {
                $saldo = $row1['debet'] - $row1['kredit'];
            } else {
                $saldo = $row1['kredit'] - $row1['debet'];
            }
            if ($row1['head_code'] == '4' || $row1['head_code'] == '6') {
                $res['penjualan'][] = [
                    'head_code'         => $row1['head_code'],
                    'sub_code'          => $row1['sub_code'],
                    'account_no'        => $row1['account_no'],
                    'account_name'      => $row1['account_name'],
                    'normal_balance'    => $row1['normal_balance'],
                    'saldo'             => $saldo,
                ];
            }
            if ($row1['head_code'] == '5') {
                $res['beban'][] = [
                    'head_code'         => $row1['head_code'],
                    'sub_code'          => $row1['sub_code'],
                    'account_no'        => $row1['account_no'],
                    'account_name'      => $row1['account_name'],
                    'normal_balance'    => $row1['normal_balance'],
                    'saldo'             => $saldo
                ];
            }
        }







        if (count($sql) > 0) {
            // hitung laba kotot
            $penjualan = $res['penjualan'];
            $beban = $res['beban'];
            $lpj = 0;
            $lbj = 0;
            foreach ($penjualan as $pj) {
                if ($pj['normal_balance'] == 'k') {
                    $lpj = $lpj + $pj['saldo'];
                } else {
                    $lpj = $lpj - $pj['saldo'];
                }
            }
            foreach ($beban as $be) {
                if ($pj['normal_balance'] == 'd') {
                    $lbj = $lbj + $be['saldo'];
                } else {
                    $lbj = $lbj - $be['saldo'];
                }
            }
            $response = [
                'laba_kotor'        => nominal($lpj),
                'total_beban'       => nominal($lbj),
                'laba_bersih'       => nominal($lpj - $lbj),
                'list'              => $res
            ];
        } else {
            $response = [
                'laba_kotor'        => 0,
                'total_beban'       => 0,
                'laba_bersih'       => 0,
                'list'              => [
                    'penjualan' => [],
                    'beban'     => []
                ]
            ];
        }

        // return $response;
        // return $laba_bruto;
        return $response;
    }
}

/* End of file M_lb.php */
