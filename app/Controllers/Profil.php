<?php

namespace App\Controllers;

use \App\Models\UserModel;

class Profil extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index($id)
    {
        $data = [
            'title' => 'Profil | Cooltreasure.id',
            'dataUser' => $this->userModel->getUser($id)
        ];

        return view('/login/profil', $data);
    }

    public function updateProfil($id)
    {
        $userLama = $this->userModel->getUser($id);

        if ($this->request->getVar('nama_lengkap') == $userLama['nama_lengkap']) {
            $rule_user = 'required';
        } else {
            $rule_user = 'required|is_unique[jaket.nama_jaket]';
        }

        if (!$this->validate([
            'nama_lengkap' => [
                'rules' => $rule_user,
                'errors' => [
                    'required' => 'Nama Lengkap Harus Diisi.',
                    'is_unique' => 'Nama Lengkap Sudah Terisi.'
                ]
            ],
            'foto_profil' => [
                'rules' => 'max_size[foto_profil,1024]|is_image[foto_profil]',
                'errors' => [
                    'max_size' => 'Ukuran Foto Terlalu Besar',
                    'is_image' => 'File yang Anda Pilih Bukan Foto'
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->to('/profil/' . $id)->withInput();
        }

        $fileFoto = $this->request->getFile('foto_profil');

        //cek gambar apakah tetap gambar lama
        if ($fileFoto->getError() == 4) {
            $namaFoto = $this->request->getVar('nama_foto_profil_lama');
        } else {
            $namaFoto = $fileFoto->getName();

            $fileFoto->move('Assets/fotoprofil', $namaFoto);

            unlink('Assets/fotoprofil/' . $this->request->getVar('nama_foto_profil_lama'));
        }

        $this->userModel->update($id, [
            'foto_profil' => $namaFoto,
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'email' => $this->request->getVar('email'),
            'no_hp' => $this->request->getVar('no_hp'),
        ]);

        session()->setFlashdata('pesan', 'Profil Berhasil Diubah.');

        return redirect()->to('/profil/' . $id);
    }

    public function dataPengiriman($id)
    {
        $data = [
            'title' => 'Ubah Data Pengiriman | Cooltreasure.id',
            'dataUser' => $this->userModel->getUser($id)
        ];

        return view('/login/dataPengiriman', $data);
    }

    public function updateAlamat($id)
    {
        if (!$this->validate([
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat Harus Diisi.'
                ]
            ],
            'rt_rw' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'RT/RW Harus Diisi.'
                ]
            ],
            'kelurahan_desa' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kelurahan/Desa Harus Diisi.'
                ]
            ],
            'kecamatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kecamatan Harus Diisi.'
                ]
            ],
            'kabupaten_kota' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kabupaten/Kota Harus Diisi.'
                ]
            ],
            'provinsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Provinsi Harus Diisi.'
                ]
            ],
            'kode_pos' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kode Pos Harus Diisi.'
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->to('/profil/dataPengiriman/' . $id)->withInput();
        }

        $this->userModel->update($id, [
            'alamat' => $this->request->getVar('alamat'),
            'rt_rw' => $this->request->getVar('rt_rw'),
            'kelurahan_desa' => $this->request->getVar('kelurahan_desa'),
            'kecamatan' => $this->request->getVar('kecamatan'),
            'kabupaten_kota' => $this->request->getVar('kabupaten_kota'),
            'provinsi' => $this->request->getVar('provinsi'),
            'kode_pos' => $this->request->getVar('kode_pos'),
        ]);

        session()->setFlashdata('pesan', 'Data Pengiriman Berhasil Diubah.');

        return redirect()->to('/profil/dataPengiriman/' . $id);
    }

    public function gantiKataSandi()
    {
        $data = [
            'title' => 'Ganti Kata Sandi | Cooltreasure.id',
        ];

        return view('/login/gantiKataSandi', $data);
    }
}
