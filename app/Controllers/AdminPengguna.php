<?php

namespace App\Controllers;

use \App\Models\UserModel;

class AdminPengguna extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Pengguna | Admin Cooltreasure.id',
            'user' => $this->userModel->getUser()
        ];

        return view('admin/daftarPengguna', $data);
    }

    public function detailPengguna($id)
    {
        $data = [
            'title' => 'Data Pengiriman | Cooltreasure.id',
            'user' => $this->userModel->getUser($id)
        ];

        if (empty($data['user'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('ID pengguna ' . $id . ' tidak ditemukan.');
        }

        return view('admin/detailPengguna', $data);
    }

    public function deletePengguna($id)
    {
        $this->userModel->delete($id);
        session()->setFlashdata('pesan', 'Pengguna Berhasil Dihapus');
        return redirect()->to('/admin/daftarPengguna');
    }
}
