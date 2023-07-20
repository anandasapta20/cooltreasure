<?php

namespace App\Controllers;

use \App\Models\UserModel;

class UserMasuk extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Masuk Akun | Cooltreasure.id',
        ];

        return view('masuk', $data);
    }

    public function saveAkun()
    {
        $users = new UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $dataUser = $users->where([
            'email' => $email,
        ])->first();

        if ($dataUser) {
            if (password_verify($password, $dataUser['password'])) {

                session()->set([
                    'id_user' => $dataUser['id_user'],
                    'email' => $dataUser['email'],
                    'nama_lengkap' => $dataUser['nama_lengkap'],
                    'logged_in' => TRUE
                ]);
                return redirect()->to('/login');
            } else {
                session()->setFlashdata('error', 'Email & Password Salah');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('error', 'Email & Password Salah');
            return redirect()->back();
        }
    }

    function logout()
    {
        session()->destroy();
        return redirect()->to('/masuk');
    }
}
