<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_report_retur extends CI_Model
{
    // get report retur pembelian
    public function purchase_return_report($y, $m)
    {
        $res = $this->db->select('a.id_transaksi, a.periode, date_format(a.tanggal, "%d/%m/%Y") as tanggal, a.total, a.keterangan')
            ->from('transaksi as a')
            ->where('a.tipe', 'purchase_return')
            ->where('month(tanggal)', $m)
            ->where('year(tanggal)', $y)
            ->get()
            ->result_array();

        return $res;
    }

    // get report retur penjualan
    public function sales_return_report($y, $m)
    {
        $res = $this->db->select('a.id_transaksi, a.periode, date_format(a.tanggal, "%d/%m/%Y") as tanggal, a.total, a.keterangan')
            ->from('transaksi as a')
            ->where('a.tipe', 'sales_return')
            ->where('month(tanggal)', $m)
            ->where('year(tanggal)', $y)
            ->get()
            ->result_array();

        return $res;
    }
}

/* End of file M_report_retur.php */
