<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// Not Login
$routes->get('/', 'Home::index');
$routes->get('/tentang', 'Home::tentang');
$routes->get('/katalog', 'Home::katalog');
$routes->get('/semuaUlasan', 'Home::semuaUlasan');

$routes->get('/masuk', 'UserMasuk::index');
$routes->post('/masuk/save', 'UserMasuk::saveAkun');
$routes->get('/keluarAkun', 'UserMasuk::logout');

$routes->get('/masuk/lupaKataSandi', 'UserLupaSandi::index');
$routes->post('/masuk/lupaKataSandi/check', 'UserLupaSandi::checkEmail');
$routes->get('/masuk/lupaKataSandi/success', 'Success::lupaSandi');
$routes->get('/masuk/lupaKataSandi/gantiKataSandi', 'UserLupaSandi::gantiSandi');
$routes->post('/masuk/lupaKataSandi/gantiKataSandi/update', 'UserLupaSandi::saveSandi');

$routes->get('/buatAkun', 'UserRegister::index');
$routes->post('/buatAkun/save', 'UserRegister::saveDaftar');
$routes->get('/buatAkun/success', 'Success::index');

$routes->get('/detailJaket/(:num)', 'Home::detailJaket/$1');

// Login
$routes->get('/login', 'HomeLogin::index');
$routes->get('/login/tentang', 'HomeLogin::tentang');
$routes->get('/login/semuaUlasan', 'HomeLogin::semuaUlasan');

$routes->get('/login/katalog', 'HomeLogin::katalog');
$routes->get('/login/detailJaket/(:num)', 'HomeLogin::detailJaket/$1');
$routes->get('/login/detailJaket/tambahKeranjang/(:num)', 'Keranjang::tambah/$1');

$routes->get('/keranjang/(:num)', 'Keranjang::index/$1');
$routes->get('/keranjang/delete/(:num)', 'Keranjang::hapus/$1');
$routes->get('/keranjang/deleteAll', 'Keranjang::hapusSemua');
$routes->get('/keranjang/pemesanan/(:num)', 'Keranjang::pesan/$1');

$routes->get('/pemesanan/(:num)', 'Pemesanan::index/$1');
$routes->post('/pemesanan/save/(:num)', 'Pemesanan::save/$1');
$routes->get('/pemesanan/success/(:num)', 'Success::pesan/$1');
$routes->get('/pembayaran/(:num)', 'Pembayaran::index/$1');
$routes->post('/pembayaran/update/(:num)', 'Pembayaran::update/$1');
$routes->get('/pembayaran/batal/(:num)', 'Pembayaran::batal/$1');
$routes->get('/pembayaran/success', 'Success::beli');

$routes->get('/riwayat', 'Riwayat::index');
$routes->get('/riwayat/detailRiwayat/(:num)', 'Riwayat::detail/$1');
$routes->get('/riwayat/detailRiwayat/ulasan/(:num)', 'UserUlasan::index/$1');
$routes->post('/riwayat/detailRiwayat/ulasan/save/(:num)', 'UserUlasan::save/$1');
$routes->get('/riwayat/detailRiwayat/ulasan/success', 'Success::ulasan');

$routes->get('/profil/(:num)', 'Profil::index/$1');
$routes->post('/profil/update/profil/(:num)', 'Profil::updateProfil/$1');
$routes->get('/profil/gantiKataSandi/(:num)', 'UserGantiKataSandi::index/$1');
$routes->post('/profil/gantiKataSandi/update/(:num)', 'UserGantiKataSandi::update/$1');
$routes->get('/profil/dataPengiriman/(:num)', 'Profil::dataPengiriman/$1');
$routes->post('/profil/update/alamat/(:num)', 'Profil::updateAlamat/$1');

// Admin
$routes->get('/admin', 'Admin::index');
$routes->post('/admin/masuk', 'Admin::login');
$routes->get('/admin/keluar', 'Admin::logout');

$routes->get('/admin/daftarPengguna', 'AdminPengguna::index');
$routes->get('/admin/daftarPengguna/delete/(:num)', 'AdminPengguna::deletePengguna/$1');

$routes->get('/admin/daftarJaket', 'AdminJaket::index');
$routes->get('/admin/daftarJaket/tambahJaket', 'AdminJaket::tambahJaket');
$routes->post('/admin/daftarJaket/tambahJaket/save', 'AdminJaket::saveJaket');
$routes->post('/admin/daftarJaket/ubahJaket/update/(:num)', 'AdminJaket::updateJaket/$1');
$routes->get('/admin/daftarJaket/delete/(:num)', 'AdminJaket::deleteJaket/$1');
$routes->get('/admin/daftarJaket/ubahJaket/(:num)', 'AdminJaket::ubahJaket/$1');

$routes->get('/admin/daftarPembelian', 'AdminPembelian::index');
$routes->post('/admin/daftarPembelian/kirim/(:num)', 'AdminPembelian::kirim/$1');
$routes->get('/admin/daftarPembelian/tolak/(:num)', 'AdminPembelian::tolak/$1');
$routes->get('/admin/daftarPembelian/terima/(:num)', 'AdminPembelian::terima/$1');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
