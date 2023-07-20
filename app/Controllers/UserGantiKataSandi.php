<?php

namespace App\Controllers;

use \App\Models\UserModel;

class UserGantiKataSandi extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index($id)
    {
        $data = [
            'title' => 'Ganti Kata Sandi | Cooltreasure.id',
            'dataUser' => $this->userModel->getUser($id)
        ];

        return view('login/gantiKataSandi', $data);
    }

    public function update($id)
    {
        $dataUser = $this->userModel->getUser($id);
        $passwordLama = $dataUser['password'];

        if (!$this->validate([
            'password' => [
                'rules' => 'required|min_length[8]|max_length[24]',
                'errors' => [
                    'required' => 'Password Harus diisi.',
                    'min_length' => 'Password Minimal 8 Karakter.',
                    'max_length' => 'Password Maksimal 24 Karakter.'
                ]
            ],
            'passwordConf' => [
                'rules' => 'matches[password]',
                'errors' => [
                    'matches' => 'Konfirmasi Password Tidak Sesuai',
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->to('/profil/gantiKataSandi/' . $id)->withInput();
        };

        // if (password_hash($this->request->getVar('passwordLama'), PASSWORD_BCRYPT) == $passwordLama) {
        // } else {
        //     session()->setFlashdata('error', 'Password Lama Tidak Sesuai');
        //     return redirect()->to('/profil/gantiKataSandi/' . $id);
        // }


        $users = new UserModel();
        $users->update($id, [
            'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT)
        ]);
        session()->setFlashdata('pesan', 'Password Berhasil Diubah.');
        return redirect()->to('/profil/gantiKataSandi/' . $id);
    }
}
