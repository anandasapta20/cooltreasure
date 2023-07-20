<?php

namespace App\Controllers;

use \App\Models\UserModel;
use \App\Models\UlasanModel;
use \App\Models\RiwayatModel;

class UserUlasan extends BaseController
{
    protected $userModel;
    protected $ulasanModel;
    protected $riwayatModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->ulasanModel = new UlasanModel();
        $this->riwayatModel = new RiwayatModel();
    }

    public function index($id)
    {
        $data = [
            'title' => 'Berikan Ulasan | Cooltreasure.id',
            'dataRiwayat' => $this->riwayatModel->getRiwayat($id)
        ];

        return view('/login/ulasan', $data);
    }

    public function save($id)
    {
        if (!$this->validate([
            'ulasan' => [
                'rules' => 'required|min_length[1]|max_length[255]',
                'errors' => [
                    'required' => 'Ulasan Harus Diisi.',
                    'min_length' => 'Ulasanmu Terlalu Sedikit.',
                ]
            ],
            'foto_ulasan' => [
                'rules' => 'uploaded[foto_ulasan]|max_size[foto_ulasan,1024]|is_image[foto_ulasan]',
                'errors' => [
                    'uploaded' => 'Anda Belum Mengunggah Foto Ulasan',
                    'max_size' => 'Ukuran Foto Terlalu Besar',
                    'is_image' => 'File yang Anda Pilih Tidak Berformat Foto'
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->to('/riwayat/detailRiwayat/ulasan/' . $id)->withInput();
        }

        $fileFoto = $this->request->getFile('foto_ulasan');
        $namaFoto = $fileFoto->getName();
        $fileFoto->move('Assets/ulasan', $namaFoto);

        $this->ulasanModel->insert([
            'id_pengguna' => session()->get('id_user'),
            'ulasan' => $this->request->getVar('ulasan'),
            'foto_ulasan' => $namaFoto,
            'anonim' => $this->request->getVar('anonim')
        ]);

        $this->riwayatModel->update($id, [
            'status_ulasan' => true
        ]);

        return redirect()->to('/login/semuaUlasan');
    }
}
