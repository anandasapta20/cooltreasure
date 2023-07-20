<?php

namespace App\Controllers;

use \App\Models\JaketModel;
use App\Models\UserModel;
use App\Models\UlasanModel;

class HomeLogin extends BaseController
{
    protected $jaketModel;
    protected $userModel;
    protected $ulasanModel;
    public function __construct()
    {
        $this->jaketModel = new JaketModel();
        $this->userModel = new UserModel();
        $this->ulasanModel = new UlasanModel();
    }

    public function index()
    {
        $jaket = $this->jaketModel->get4Jaket();
        $ulasan = $this->ulasanModel->get4Ulasan();
        $data = [
            'title' => 'Selamat Datang di Cooltreasure.id!',
            'jaket' => $jaket,
            'ulasan' => $ulasan
        ];

        return view('/login/landing', $data);
    }

    public function katalog()
    {
        $data = [
            'title' => 'Katalog | Cooltreasure.id',
            'jaket' => $this->jaketModel->getJaket()
        ];

        return view('/login/katalog', $data);
    }

    public function tentang()
    {
        $data = [
            'title' => 'Tentang Kami | Cooltreasure.id',
        ];

        return view('/login/tentang', $data);
    }

    public function semuaUlasan()
    {
        $data = [
            'title' => 'Semua Ulasan | Cooltreasure.id',
            'ulasan' => $this->ulasanModel->getUlasan()
        ];

        return view('/login/semuaUlasan', $data);
    }

    public function detailJaket($id)
    {
        $data = [
            'title' => 'Detail Jaket | Cooltreasure.id',
            'jaket' => $this->jaketModel->getJaket($id)
        ];

        return view('/login/detailJaket', $data);
    }

    public function pembayaran()
    {
        $data = [
            'title' => 'Pembayaran | Cooltreasure.id',
        ];

        return view('/login/pembayaran', $data);
    }

    public function riwayat()
    {
        $data = [
            'title' => 'Riwayat | Cooltreasure.id',
        ];

        return view('/login/riwayat', $data);
    }

    public function detailRiwayat()
    {
        $data = [
            'title' => 'Detail Riwayat | Cooltreasure.id',
        ];

        return view('/login/detailRiwayat', $data);
    }

    public function ulasan()
    {
        $data = [
            'title' => 'Ulasan | Cooltreasure.id',
        ];

        return view('/login/ulasan', $data);
    }
}
