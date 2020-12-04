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

/*
| -------------------------------------------------------------------------
| MASTER DATA BRAND
| -------------------------------------------------------------------------
*/
$route['master/brand']					= 'master/Brand';
$route['master/brand/store']				= 'master/Brand/store';
$route['master/brand/update']				= 'master/Brand/update';

/*
| -------------------------------------------------------------------------
| MASTER DATA CATEGORY
| -------------------------------------------------------------------------
*/
$route['master/kategori']					= 'master/Kategori';
$route['master/kategori/store']				= 'master/Kategori/store';
$route['master/kategori/update']				= 'master/Kategori/update';

/*
| -------------------------------------------------------------------------
| MASTER DATA PRODUCT
| -------------------------------------------------------------------------
*/
$route['master/produk']						= 'master/Produk';
$route['master/produk/create']				= 'master/Produk/create';
$route['master/produk/store']					= 'master/Produk/store';
$route['master/produk/edit/(:any)']			= 'master/Produk/edit/$1';
$route['master/produk/update']				= 'master/Produk/update';
$route['master/produk/show/(:any)']			= 'master/Produk/show/$1';

/*--------------------------------------------------
MASTER CHART OF ACCOUNT
/--------------------------------------------------*/
$route['master/coa']						= 'master/Coa';
$route['master/coa/store']					= 'master/Coa/store';
$route['master/coa/update']					= 'master/Coa/update';

/*--------------------------------------------------
MASTER VENDOR
/--------------------------------------------------*/
$route['master/vendor']						= 'master/Vendor';
$route['master/vendor/store']					= 'master/Vendor/store';
$route['master/vendor/update']				= 'master/Vendor/update';

/*--------------------------------------------------
MASTER CUSTOMER
/--------------------------------------------------*/
$route['master/pelanggan']					= 'master/Pelanggan';
$route['master/pelanggan/store']				= 'master/Pelanggan/store';
$route['master/pelanggan/update']				= 'master/Pelanggan/update';

/*--------------------------------------------------
TRANSAKSI PEMBELIAN
/--------------------------------------------------*/
$route['transaksi/pembelian']					= 'transaksi/Pembelian';
$route['transaksi/pembelian/create']			= 'transaksi/Pembelian/create';
$route['transaksi/pembelian/store']			= 'transaksi/Pembelian/store';
$route['transaksi/pembelian/detail/(:any)']		= 'transaksi/Pembelian/show/$1';

/*--------------------------------------------------
TRANSAKSI PENJUALAN
/--------------------------------------------------*/
$route['transaksi/penjualan']						= 'transaksi/Penjualan';
$route['transaksi/penjualan/draff']				= 'transaksi/Penjualan/create_draff';
$route['transaksi/penjualan/find_produk']			= 'transaksi/Penjualan/find_produk';
$route['transaksi/penjualan/create/(:any)']			= 'transaksi/Penjualan/create/$1';
$route['transaksi/penjualan/add_item']				= 'transaksi/Penjualan/add_item';
$route['transaksi/penjualan/detail/(:any)']			= 'transaksi/Penjualan/show/$1';
$route['transaksi/penjualan/detail/(:any)/(:any)']	= 'transaksi/Penjualan/show/$1/$2';
$route['transaksi/penjualan/store']				= 'transaksi/Penjualan/store';


/*--------------------------------------------------
LAPORAN Jurnal Umum
/--------------------------------------------------*/
$route['akuntansi/jurnal_umum']				= 'laporan/Jurnal';

/*--------------------------------------------------
LAPORAN BUKU BESAR
/--------------------------------------------------*/
$route['akuntansi/buku_besar']				= 'laporan/Buku';


/*--------------------------------------------------
LAPORAN PEMBELIAN
/--------------------------------------------------*/
$route['inventory/pembelian']					= 'laporan/Pembelian';

/*--------------------------------------------------
LAPORAN PENJUALAN
/--------------------------------------------------*/
$route['inventory/penjualan']					= 'laporan/Penjualan';
