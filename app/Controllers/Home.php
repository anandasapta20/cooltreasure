<?php

namespace App\Controllers;

use \App\Models\JaketModel;
use App\Models\UserModel;
use App\Models\UlasanModel;

class Home extends BaseController
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

        return view('landing', $data);
    }

    public function katalog()
    {
        $data = [
            'title' => 'Katalog | Cooltreasure.id',
            'jaket' => $this->jaketModel->getJaket()
        ];

        return view('katalog', $data);
    }

    public function tentang()
    {
        $data = [
            'title' => 'Tentang Kami | Cooltreasure.id',
        ];

        return view('tentang', $data);
    }

    public function masuk()
    {
        $data = [
            'title' => 'Masuk Akun | Cooltreasure.id',
        ];

        return view('masuk', $data);
    }

    public function lupaKataSandi()
    {
        $data = [
            'title' => 'Lupa Kata Sandi | Cooltreasure.id',
        ];

        return view('lupaKataSandi', $data);
    }

    public function buatAkun()
    {
        $data = [
            'title' => 'Buat Akun | Cooltreasure.id',
        ];

        return view('buatAkun', $data);
    }

    public function semuaUlasan()
    {
        $data = [
            'title' => 'Semua Ulasan | Cooltreasure.id',
            'ulasan' => $this->ulasanModel->getUlasan()
        ];

        return view('semuaUlasan', $data);
    }

    public function detailJaket($id)
    {
        $data = [
            'title' => 'Detail Jaket | Cooltreasure.id',
            'user' => $this->jaketModel->getJaket($id)
        ];

        return view('detailJaket', $data);
    }
}
