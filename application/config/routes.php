<?php
defined('BASEPATH') or exit('No direct script access allowed');

/* 
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
*/
$route['default_controller'] = 'Dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login']      = 'Auth';
$route['menu/test']  = 'Dashboard/test_menu';
$route['login/verify']                = 'Auth/verification';
$route['logout']                      = 'Auth/log_out';


/*
| -------------------------------------------------------------------------
| MASTER DATA BRAND
| -------------------------------------------------------------------------
*/
$route['master/brand']                          = 'master/Brand';
$route['master/brand/store']                    = 'master/Brand/store';
$route['master/brand/update']                   = 'master/Brand/update';

/*
| -------------------------------------------------------------------------
| MASTER DATA CATEGORY
| -------------------------------------------------------------------------
*/
$route['master/kategori']                       = 'master/Kategori';
$route['master/kategori/store']                 = 'master/Kategori/store';
$route['master/kategori/update']                = 'master/Kategori/update';

/*
| -------------------------------------------------------------------------
| MASTER DATA PRODUCT
| -------------------------------------------------------------------------
*/
$route['master/produk']                         = 'master/Produk';
$route['master/produk/create']                  = 'master/Produk/create';
$route['master/produk/store']                   = 'master/Produk/store';
$route['master/produk/edit/(:any)']             = 'master/Produk/edit/$1';
$route['master/produk/update']                  = 'master/Produk/update';
$route['master/produk/show/(:any)']             = 'master/Produk/show/$1';

/*--------------------------------------------------
MASTER CHART OF ACCOUNT
/--------------------------------------------------*/
$route['master/coa']                            = 'master/Coa';
$route['master/coa/store']                      = 'master/Coa/store';
$route['master/coa/update']                     = 'master/Coa/update';

/*--------------------------------------------------
MASTER VENDOR
/--------------------------------------------------*/
$route['master/vendor']                          = 'master/Vendor';
$route['master/vendor/store']                    = 'master/Vendor/store';
$route['master/vendor/update']                   = 'master/Vendor/update';

/*--------------------------------------------------
MASTER CUSTOMER
/--------------------------------------------------*/
$route['master/pelanggan']                      = 'master/Pelanggan';
$route['master/pelanggan/store']                = 'master/Pelanggan/store';
$route['master/pelanggan/update']               = 'master/Pelanggan/update';

/*--------------------------------------------------
TRANSAKSI PEMBELIAN
/--------------------------------------------------*/
$route['transaksi/pembelian']                       = 'transaksi/Pembelian';
$route['transaksi/pembelian/create']                = 'transaksi/Pembelian/create';
$route['transaksi/pembelian/store']                 = 'transaksi/Pembelian/store';
$route['transaksi/pembelian/detail/(:any)']         = 'transaksi/Pembelian/show/$1';

/*--------------------------------------------------
TRANSAKSI PENJUALAN
/--------------------------------------------------*/
$route['transaksi/penjualan']                           = 'transaksi/Penjualan';
$route['transaksi/penjualan/draff']                     = 'transaksi/Penjualan/create_draff';
$route['transaksi/penjualan/find_produk']               = 'transaksi/Penjualan/find_produk';
$route['transaksi/penjualan/create/(:any)']             = 'transaksi/Penjualan/create/$1';
$route['transaksi/penjualan/add_item']                  = 'transaksi/Penjualan/add_item';
$route['transaksi/penjualan/detail/(:any)']             = 'transaksi/Penjualan/show/$1';
$route['transaksi/penjualan/detail/(:any)/(:any)']      = 'transaksi/Penjualan/show/$1/$2';
$route['transaksi/penjualan/store']                     = 'transaksi/Penjualan/store';


/*--------------------------------------------------
TRANSAKSI KAS MASUK
/--------------------------------------------------*/
$route['kas/masuk']                                 = 'transaksi/Kas_masuk';
$route['kas/masuk/store']                           = 'transaksi/Kas_masuk/store';
$route['kas/masuk/update']                          = 'transaksi/Kas_masuk/update';

/*--------------------------------------------------
TRANSAKSI KAS KELUAR
/--------------------------------------------------*/
$route['kas/keluar']                                = 'transaksi/Kas_keluar';
$route['kas/keluar/store']                          = 'transaksi/Kas_keluar/store';
$route['kas/keluar/update']                         = 'transaksi/Kas_keluar/update';

/*--------------------------------------------------
TRANSAKSI RETUR PEMBELIAN
/--------------------------------------------------*/
$route['retur/pembelian']                           = 'transaksi/Retur_pembelian';
$route['retur/pembelian/find/(:any)']               = 'transaksi/Retur_pembelian/find/$1';
$route['retur/pembelian/create']                    = 'transaksi/Retur_pembelian/create';
$route['retur/pembelian/store']                     = 'transaksi/Retur_pembelian/store';

/*--------------------------------------------------
TRANSAKSI RETUR PENJUALAN
/--------------------------------------------------*/
$route['retur/penjualan']                           = 'transaksi/Retur_penjualan';
$route['retur/penjualan/find/(:any)']               = 'transaksi/Retur_penjualan/find/$1';
$route['retur/penjualan/create']                    = 'transaksi/Retur_penjualan/create';
$route['retur/penjualan/store']                     = 'transaksi/Retur_penjualan/store';

/*--------------------------------------------------
LAPORAN Jurnal Umum
/--------------------------------------------------*/
$route['akuntansi/jurnal_umum']                = 'laporan/Jurnal';

/*--------------------------------------------------
LAPORAN BUKU BESAR
/--------------------------------------------------*/
$route['akuntansi/buku_besar']                  = 'laporan/Buku';
$route['akuntansi/bb_test']                     = 'laporan/Buku/test';

/*--------------------------------------------------
LAPORAN NERACA SALDO
/--------------------------------------------------*/
$route['akuntansi/neraca_saldo']                = 'laporan/Neraca_saldo';

/*--------------------------------------------------
LAPORAN PEMBELIAN
/--------------------------------------------------*/
$route['inventory/pembelian']                    = 'laporan/Pembelian';

/*--------------------------------------------------
LAPORAN PENJUALAN
/--------------------------------------------------*/
$route['inventory/penjualan']                    = 'laporan/Penjualan';

/*--------------------------------------------------
LAPORAN FIFO
/--------------------------------------------------*/
$route['inventory/fifo']                        = 'laporan/Fifo';
$route['inventory/fifo/try']                    = 'laporan/Fifo/try';


/*--------------------------------------------------
LAPORAN FIFO
/--------------------------------------------------*/
$route['akuntansi/lb']                        = 'laporan/Laba_rugi';


/*--------------------------------------------------
SETTING USER
/--------------------------------------------------*/
$route['setting/pengguna']                          = 'setting/User';
$route['setting/pengguna/store']                    = 'setting/User/store';
$route['setting/pengguna/update']                   = 'setting/User/update';
