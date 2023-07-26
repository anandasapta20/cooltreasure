<?php

namespace App\Controllers;

use \App\Models\PembelianModel;
use \App\Models\UserModel;

class AdminPembelian extends BaseController
{
    protected $pembelianModel;
    protected $userModel;
    public function __construct()
    {
        $this->pembelianModel = new PembelianModel();
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Pemesanan | Admin Cooltreasure.id',
            'pembelian' => $this->pembelianModel->getPembelian(),
            'hariIni' => $this->pembelianModel->getHariIni(),
            'bulanIni' => $this->pembelianModel->getBulanIni(),
            'belumDiproses' => $this->pembelianModel->getBelumDiproses(),
            'totalPesanan' => $this->pembelianModel->getTotalPesanan()
        ];

        return view('admin/daftarPembelian', $data);
    }

    public function tolak($id)
    {
        $this->pembelianModel->update($id, [
            'status_pembayaran' => 'Gagal',
            'status_tolak' => true,
        ]);
        session()->setFlashdata('pesan', 'Pemesanan Jaket Telah Ditolak');
        return redirect()->to('/admin/daftarPembelian');
    }

    public function kirim($id)
    {
        $this->pembelianModel->update($id, [
            'no_resi' => $this->request->getVar('no_resi'),
            'status_pembayaran' => 'Barang Dikirim',
        ]);
        session()->setFlashdata('pesan', 'Nomor Resi Telah Disimpan');
        return redirect()->to('/admin/daftarPembelian');
    }

    public function terima($id)
    {
        $this->pembelianModel->update($id, [
            'status_pembayaran' => 'Barang Sedang Diproses',
            'status_terima' => true,
        ]);
        session()->setFlashdata('pesan', 'Pemesanan Jaket Telah Diterima');
        return redirect()->to('/admin/daftarPembelian');
    }
}
