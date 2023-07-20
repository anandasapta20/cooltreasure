<?php

namespace App\Controllers;

use \App\Models\AdminModel;

class Admin extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Masuk Admin | Cooltreasure.id',
        ];
        return view('/admin/adminMasuk', $data);
    }

    public function login()
    {
        $admin = new AdminModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $dataAdmin = $admin->where([
            'email' => $email,
        ])->first();

        if ($dataAdmin) {
            if ($dataAdmin['password'] == $password) {
                session()->set([
                    'id' => $dataAdmin['id'],
                    'logged_in' => TRUE
                ]);
                return redirect()->to('/admin/daftarJaket');
            } else {
                session()->setFlashdata('error', 'Email & Password Salah');
                return redirect()->to('/admin');
            }
        } else {
            session()->setFlashdata('error', 'Email & Password Salah');
            return redirect()->to('/admin');
        }
    }

    function logout()
    {
        session()->destroy();
        return redirect()->to('/admin');
    }
}
