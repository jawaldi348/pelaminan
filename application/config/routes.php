<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['admin'] = 'auth/login';
$route['admin/signin'] = 'auth/login/signin';
$route['admin/logout'] = 'auth/login/logout';

$route['dashboard'] = 'dashboard';

$route['users'] = 'master/users';
$route['users/data'] = 'master/users/data';
$route['users/create'] = 'master/users/create';
$route['users/store'] = 'master/users/store';
$route['users/edit'] = 'master/users/edit';
$route['users/update'] = 'master/users/update';
$route['users/destroy'] = 'master/users/destroy';

$route['rekening'] = 'master/rekening';
$route['rekening/data'] = 'master/rekening/data';
$route['rekening/create'] = 'master/rekening/create';
$route['rekening/store'] = 'master/rekening/store';
$route['rekening/edit'] = 'master/rekening/edit';
$route['rekening/update'] = 'master/rekening/update';
$route['rekening/destroy'] = 'master/rekening/destroy';

$route['kategori'] = 'master/kategori';
$route['kategori/data'] = 'master/kategori/data';
$route['kategori/create'] = 'master/kategori/create';
$route['kategori/store'] = 'master/kategori/store';
$route['kategori/edit'] = 'master/kategori/edit';
$route['kategori/update'] = 'master/kategori/update';
$route['kategori/destroy'] = 'master/kategori/destroy';

$route['produk'] = 'master/produk';
$route['produk/create'] = 'master/produk/create';
$route['produk/store'] = 'master/produk/store';
$route['produk/edit/(:num)'] = 'master/produk/edit/$1';
$route['produk/update'] = 'master/produk/update';
$route['produk/destroy'] = 'master/produk/destroy';

$route['pelanggan'] = 'master/pelanggan';
$route['pelanggan/data'] = 'master/pelanggan/data';
$route['pelanggan/create'] = 'master/pelanggan/create';
$route['pelanggan/store'] = 'master/pelanggan/store';
$route['pelanggan/edit'] = 'master/pelanggan/edit';
$route['pelanggan/update'] = 'master/pelanggan/update';
$route['pelanggan/destroy'] = 'master/pelanggan/destroy';

$route['orders'] = 'transaksi/orders';
$route['orders/data'] = 'transaksi/orders/data';
$route['orders/detail'] = 'transaksi/orders/detail';
$route['orders/cancel'] = 'transaksi/orders/cancel';

$route['payments'] = 'transaksi/payments';
$route['payments/data'] = 'transaksi/payments/data';
$route['payments/detail'] = 'transaksi/payments/detail';
$route['payments/cancel'] = 'transaksi/payments/cancel';
$route['payments/approve'] = 'transaksi/payments/approve';
$route['payments/batal'] = 'transaksi/payments/batal';

$route['auth'] = 'home/auth';
$route['auth/login'] = 'home/auth/login';
$route['auth/registrasi'] = 'home/auth/registrasi';
$route['auth/logout'] = 'home/auth/logout';

$route['profile'] = 'home/profile';
$route['profile/update'] = 'home/profile/update';

$route['keranjang'] = 'home/keranjang';
$route['keranjang/store'] = 'home/keranjang/store';
$route['keranjang/update'] = 'home/keranjang/update';
$route['keranjang/destroy/(:num)'] = 'home/keranjang/destroy/$1';

$route['checkout'] = 'home/checkout';
$route['checkout/datalokasi'] = 'home/checkout/datalokasi';
$route['checkout/editlokasi'] = 'home/checkout/editlokasi';
$route['checkout/savelokasi'] = 'home/checkout/savelokasi';
$route['checkout/dataproduk'] = 'home/checkout/dataproduk';
$route['checkout/store'] = 'home/checkout/store';

$route['pesanan'] = 'home/pesanan';
$route['pesanan/detail/(:num)'] = 'home/pesanan/detail/$1';
$route['pesanan/cancel'] = 'home/pesanan/cancel';
$route['pesanan/konfirmasi/(:num)'] = 'home/pesanan/konfirmasi/$1';
$route['pesanan/konfirmasi-store'] = 'home/pesanan/konfirmasi_store';
$route['pembayaran'] = 'home/pesanan/pembayaran';
$route['pembayaran/batal'] = 'home/pesanan/pembayaran_batal';

$route['(:any)'] = 'home/produk/detail/$1';
