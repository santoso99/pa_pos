<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_retur_pembelian extends CI_Model
{

    private function id()
    {
        $this->db->select('RIGHT(id_transaksi,9) as id', FALSE);
        $this->db->where('tipe', 'purchase_return');
        $this->db->order_by('id_transaksi', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('transaksi');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $code = intval($data->id) + 1;
        } else {
            $code = 1;
        }

        $interval = str_pad($code, 9, "0", STR_PAD_LEFT);
        $id = "TRX-PR-" . $interval;
        return $id;
    }

    public function all()
    {
        return $this->db->get_where('transaksi', ['tipe' => 'purchase_return'])->result_array();
    }

    public function get_pembelian()
    {
        return $this->db->get_where('transaksi', ['tipe' => 'purchasing'])->result_array();
    }

    public function find($id)
    {
        $res = $this->db->select('a.id_transaksi, b.id_pembelian,b.id_warna,b.cogs,b.ready,c.nama_warna,d.nama_barang')
            ->from('transaksi as a')
            ->join('pembelian as b', 'a.id_transaksi=b.id_transaksi')
            ->join('warna_barang as c', 'b.id_warna=c.id_warna')
            ->join('barang as d', 'c.id_barang=d.id_barang')
            ->where('a.id_transaksi', $id)
            ->where('b.ready >', 0)
            ->get()
            ->result_array();
        return $res;
    }

    public function store()
    {
        $where = [];
        $id_ref_transaksi = $this->input->post('id_pembelian');
        $keterangan = $this->input->post('keterangan');
        $id = $this->id();
        $id_pembelian = $this->input->post('id_pmb');
        $id_warna = $this->input->post('id_warna');
        $cogs = $this->input->post('cogs');
        $ready = $this->input->post('ready');
        $qty = $this->input->post('qty');
        $total = 0;
        foreach ($id_pembelian as $key => $val) {
            array_push($where, $id_pembelian[$key]);
            $pembelian[] = [
                'id_pembelian'      => $id_pembelian[$key],
                'id_warna'          => $id_warna[$key],
                'cogs'              =>  intval(preg_replace("/[^0-9]/", "", $cogs[$key])),
                'ready'             => $ready[$key] - $qty[$key]
            ];

            $stok[] = [
                'id_transaksi'      => $id,
                'id_warna'          => $id_warna[$key],
                'periode'           => date('Y') . '' . date('m'),
                'cogs'              =>  intval(preg_replace("/[^0-9]/", "", $cogs[$key])),
                'qty'               => $ready[$key] - $qty[$key],
                'tipe'              => 0, //out

            ];

            $retur[] = [
                'id_transaksi'      => $id,
                'id_pembelian'      => $id_pembelian[$key],
                'id_warna'          => $id_warna[$key],
                'cogs'              =>  intval(preg_replace("/[^0-9]/", "", $cogs[$key])),
                'qty'               => $qty[$key]
            ];

            $total = $total + ($qty[$key] * intval(preg_replace("/[^0-9]/", "", $cogs[$key])));
        }

        $transaksi = [
            'id_transaksi'      => $id,
            'periode'           => date('Y') . '' . date('m'),
            'ref'               => $id_ref_transaksi,
            'total'             => $total,
            'status'            => 1,
            'tipe'              => 'purchase_return',
            'keterangan'        => $keterangan
        ];

        $gl = [
            [
                'id_transaksi'      => $id,
                'periode'           => date('Y') . '' . date('m'),
                'account_no'        => '1-10001',
                'posisi'            => 'd',
                'nominal'           => $total
            ],
            [
                'id_transaksi'      => $id,
                'periode'           => date('Y') . '' . date('m'),
                'account_no'        => '1-10005',
                'posisi'            => 'k',
                'nominal'           => $total
            ]
        ];

        $this->db->trans_start();
        $this->db->insert('transaksi', $transaksi);
        $this->db->insert_batch('retur_pembelian', $retur);
        $this->db->update_batch('pembelian', $pembelian, 'id_pembelian');
        $this->db->insert_batch('jurnal', $gl);
        $this->db->insert_batch('stok', $stok);
        $this->db->trans_complete();

        $res = [
            'where' => $where,
            'store' => [
                'transaksi'     => $transaksi,
                'pembelian'     => $pembelian,
                'retur'         => $retur,
                'gl'            => $gl
            ]
        ];

        return $res;
    }
}

/* End of file M_retur_pembelian.php */
