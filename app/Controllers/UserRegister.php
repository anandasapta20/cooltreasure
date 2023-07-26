<?php

namespace App\Controllers;

use \App\Models\UserModel;

class UserRegister extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Buat Akun | Cooltreasure.id',
        ];

        return view('buatAkun', $data);
    }

    public function saveDaftar()
    {
        if (!$this->validate([
            'foto_profil' => [
                'rules' => 'max_size[foto_profil,1024]|is_image[foto_profil]',
                'errors' => [
                    'max_size' => 'Ukuran Foto Terlalu Besar.',
                    'is_image' => 'File yang Anda Pilih Tidak Berformat Foto.'
                ]
            ],
            'nama_lengkap' => [
                'rules' => 'required|min_length[1]|max_length[255]',
                'errors' => [
                    'required' => 'Nama Lengkap Harus Diisi.',
                    'min_length' => 'Nama Lengkap Minimal 4 Karakter.',
                    'max_length' => 'Nama Lengkap Maksimal 100 Karakter.',
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email|min_length[4]|max_length[255]|is_unique[user.email]',
                'errors' => [
                    'required' => 'Email Harus Diisi.',
                    'valid_email' => 'Email Tidak Valid.',
                    'min_length' => 'Email Minimal 4 Karakter.',
                    'max_length' => 'Email Maksimal 255 Karakter.',
                    'is_unique' => 'Email Sudah Terdaftar.'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[8]|max_length[24]',
                'errors' => [
                    'required' => 'Password Harus Diisi.',
                    'min_length' => 'Password Minimal 8 Karakter.',
                    'max_length' => 'Password Maksimal 24 Karakter.'
                ]
            ],
            'passwordConf' => [
                'rules' => 'matches[password]',
                'errors' => [
                    'matches' => 'Konfirmasi Password Tidak Sesuai',
                ]
            ],
            'nomor_hp' => [
                'rules' => 'required|min_length[10]|max_length[20]|numeric',
                'errors' => [
                    'required' => 'Nomor Handphone Harus diisi.',
                    'min_length' => 'Nomor Handphone Minimal 10 Angka.',
                    'max_length' => 'Nomor Handphone Maksimal 20 Angka.',
                    'numeric' => 'Nomor Handphone Harus angka.'
                ]
            ]
        ])) {
            // dd(session());
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->to('/buatAkun')->withInput();
        }

        //ambil gambar
        $fileFoto = $this->request->getFile('foto_profil');
        //apakah tidak ada gambar yang diupload
        if ($fileFoto->getError() == 4) {
            $namaFoto = 'default_profil.png';
        } else {
            //pindahkan file
            $fileFoto->move('Assets/fotoprofil');
            //ambil nama file
            $namaFoto = $fileFoto->getName();
        }

        $users = new UserModel();
        $users->insert([
            'foto_profil' => $namaFoto,
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'email' => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            'no_hp' => $this->request->getVar('nomor_hp'),
        ]);
        return redirect()->to('/buatAkun/success');
    }
}
