<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_retur_penjualan extends CI_Model
{

    private function id()
    {
        $this->db->select('RIGHT(id_transaksi,9) as id', FALSE);
        $this->db->where('tipe', 'sales_return');
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
        $id = "TRX-SR-" . $interval;
        return $id;
    }

    public function all()
    {
        return $this->db->get_where('transaksi', ['tipe' => 'sales_return'])->result_array();
    }

    public function get_pembelian()
    {
        return $this->db->get_where('transaksi', ['tipe' => 'order'])->result_array();
    }

    public function find($id)
    {
        $res = $this->db->select('a.id_transaksi, b.id_pembelian,b.id_warna,b.cogs,b.harga_jual,b.id_penjualan,b.qty,c.nama_warna,d.nama_barang,e.ready')
            ->from('transaksi as a')
            ->join('penjualan as b', 'a.id_transaksi=b.id_transaksi')
            ->join('pembelian as e', 'b.id_pembelian=e.id_pembelian')
            ->join('warna_barang as c', 'b.id_warna=c.id_warna')
            ->join('barang as d', 'c.id_barang=d.id_barang')
            ->where('a.id_transaksi', $id)
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
        $id_penjualan = $this->input->post('id_pnj');
        $id_warna = $this->input->post('id_warna');
        $cogs = $this->input->post('cogs');
        $harga_jual = $this->input->post('harga_jual');
        $ready = $this->input->post('ready');
        $qty = $this->input->post('qty');
        $total = 0;
        $total_kas = 0;
        foreach ($id_pembelian as $key => $val) {
            array_push($where, $id_pembelian[$key]);
            $pembelian[] = [
                'id_pembelian'      => $id_pembelian[$key],
                'id_warna'          => $id_warna[$key],
                'cogs'              =>  intval(preg_replace("/[^0-9]/", "", $cogs[$key])),
                'ready'             => $ready[$key] + $qty[$key]
            ];

            $stok[] = [
                'id_transaksi'      => $id,
                'id_warna'          => $id_warna[$key],
                'periode'           => date('Y') . '' . date('m'),
                'cogs'              => intval(preg_replace("/[^0-9]/", "", $cogs[$key])),
                'qty'               => $ready[$key] + $qty[$key],
                'tipe'              => 1, //in

            ];

            $retur[] = [
                'id_transaksi'      => $id,
                'id_pembelian'      => $id_pembelian[$key],
                'id_penjualan'      => $id_penjualan[$key],
                'id_warna'          => $id_warna[$key],
                'cogs'              =>  intval(preg_replace("/[^0-9]/", "", $cogs[$key])),
                'harga_jual'        =>  intval(preg_replace("/[^0-9]/", "", $harga_jual[$key])),
                'qty'               => $qty[$key]
            ];

            $total = $total + ($qty[$key] * intval(preg_replace("/[^0-9]/", "", $cogs[$key])));
            $total_kas = $total_kas + ($qty[$key] * intval(preg_replace("/[^0-9]/", "", $harga_jual[$key])));
        }

        $transaksi = [
            'id_transaksi'      => $id,
            'periode'           => date('Y') . '' . date('m'),
            'ref'               => $id_ref_transaksi,
            'total'             => $total_kas,
            'status'            => 1,
            'tipe'              => 'sales_return',
            'keterangan'        => $keterangan
        ];

        $gl = [
            // kas 
            [
                'id_transaksi'      => $id,
                'periode'           => date('Y') . '' . date('m'),
                'account_no'        => '4-10003',
                'posisi'            => 'd',
                'nominal'           => $total_kas
            ],
            [
                'id_transaksi'      => $id,
                'periode'           => date('Y') . '' . date('m'),
                'account_no'        => '1-10001',
                'posisi'            => 'k',
                'nominal'           => $total_kas
            ],

            // hpp
            [
                'id_transaksi'      => $id,
                'periode'           => date('Y') . '' . date('m'),
                'account_no'        => '1-10005',
                'posisi'            => 'd',
                'nominal'           => $total
            ],
            [
                'id_transaksi'      => $id,
                'periode'           => date('Y') . '' . date('m'),
                'account_no'        => '6-10006',
                'posisi'            => 'k',
                'nominal'           => $total
            ],

        ];

        $this->db->trans_start();
        $this->db->insert('transaksi', $transaksi);
        $this->db->insert_batch('retur_penjualan', $retur);
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

/* End of file M_retur_penjualan.php */
