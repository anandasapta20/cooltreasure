<?php

namespace App\Controllers;

use \App\Models\UserModel;

class UserLupaSandi extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Lupa Kata Sandi | Cooltreasure.id'
        ];

        return view('/lupaKataSandi', $data);
    }

    public function checkEmail()
    {
        $email = $this->request->getVar('email');
        $dataUser = $this->userModel->where([
            'email' => $email,
        ])->first();

        // dd($dataUser);

        if ($dataUser) {
            session()->set([
                'id_user' => $dataUser['id_user']
            ]);
            return redirect()->to('/masuk/lupaKataSandi/success');
        } else {
            session()->setFlashdata('error', 'Email Tidak Terdaftar.');
            return redirect()->to('/masuk/lupaKataSandi');
        }
    }

    public function gantiSandi()
    {
        $dataUser = $this->userModel->getUser(session()->get('email'));
        $data = [
            'title' => 'Ganti Kata Sandi | Cooltreasure.id',
            'dataUser' => $dataUser
        ];

        return view('/gantiKataSandiLupa', $data);
    }

    public function saveSandi()
    {
        if (!$this->validate([
            'password' => [
                'rules' => 'required|min_length[8]|max_length[24]',
                'errors' => [
                    'required' => 'Password Harus diisi',
                    'min_length' => 'Password Minimal 8 Karakter',
                    'max_length' => 'Password Maksimal 24 Karakter',
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
            return redirect()->back()->withInput();
        }

        $this->userModel->update(session()->get('id_user'), [
            'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT)
        ]);

        session()->destroy();
        return redirect()->to('/masuk');
    }
}
