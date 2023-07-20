<?php

namespace App\Controllers;

use \App\Models\PembelianModel;

class Success extends BaseController
{
    protected $pembelianModel;

    public function __construct()
    {
        $this->pembelianModel = new PembelianModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Akun Berhasil Dibuat | Cooltreasure.id'
        ];

        return view('/success/registerSuccess', $data);
    }

    public function lupaSandi()
    {
        $data = [
            'title' => 'Email Terkirim | Cooltreasure.id'
        ];

        return view('/success/lupaSandiSuccess', $data);
    }

    public function pesan($id)
    {
        $data = [
            'title' => 'Pemesanan Berhasil | Cooltreasure.id',
            'dataPemesanan' => $this->pembelianModel->getIdPembelian($id)
        ];

        return view('/success/pesanSuccess', $data);
    }

    public function beli()
    {
        $data = [
            'title' => 'Pembayaran Berhasil | Cooltreasure.id'
        ];

        return view('/success/beliSuccess', $data);
    }

    public function ulasan()
    {
        $data = [
            'title' => 'Ulasan Terkirim | Cooltreasure.id'
        ];

        return view('/success/ulasanSuccess', $data);
    }
}
