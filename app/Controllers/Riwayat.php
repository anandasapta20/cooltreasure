<?php

namespace App\Controllers;

use \App\Models\RiwayatModel;
use \App\Models\JaketModel;

class Riwayat extends BaseController
{
    protected $riwayatModel;
    protected $jaketModel;

    public function __construct()
    {
        $this->riwayatModel = new RiwayatModel();
        $this->jaketModel = new JaketModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Riwayat | Cooltreasure.id',
            'dataRiwayat' => $this->riwayatModel->getRiwayat()
        ];

        // dd($this->riwayatModel->getRiwayat());

        return view('/login/riwayat', $data);
    }

    public function detail($id)
    {
        $data = [
            'title' => 'Detail Riwayat | Cooltreasure.id',
            'dataRiwayat' => $this->riwayatModel->getRiwayat($id)
        ];

        return view('/login/detailRiwayat', $data);
    }
}
