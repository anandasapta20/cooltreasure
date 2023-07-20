<?php

namespace App\Controllers;

use \App\Models\PembelianModel;
use \App\Models\JaketModel;
use \App\Models\UserModel;
use \App\Models\MetodePembayaranModel;

class Pembayaran extends BaseController
{
    protected $pembelianModel;
    protected $jaketModel;
    protected $userModel;
    protected $metodePembayaranModel;
    public function __construct()
    {
        $this->pembelianModel = new PembelianModel();
        $this->jaketModel = new JaketModel();
        $this->userModel = new UserModel();
        $this->metodePembayaranModel = new MetodePembayaranModel();
    }

    public function index($id)
    {
        $data = [
            'title' => 'Pembayaran | Cooltreasure.id',
            'dataPembayaran' => $this->pembelianModel->getIdPembelian($id)
        ];

        // dd($this->pembelianModel->getIdPembelian($id));

        return view('/login/pembayaran', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'foto_bukti' => [
                'rules' => 'uploaded[foto_bukti]|max_size[foto_bukti,1024]|is_image[foto_bukti]',
                'errors' => [
                    'uploaded' => 'Anda Belum Mengunggah Bukti Pembayaran.',
                    'max_size' => 'Ukuran Foto Terlalu Besar',
                    'is_image' => 'File yang Anda Pilih Tidak Berformat Foto'
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->to('/pembayaran/' . $id)->withInput();
        }

        $fileFoto = $this->request->getFile('foto_bukti');
        $namaFoto = $fileFoto->getName();
        $fileFoto->move('Assets/fotobukti', $namaFoto);

        $this->pembelianModel->update($id, [
            'foto_bukti' => $namaFoto,
            'status_pembayaran' => 'Menunggu Konfirmasi Admin',
            'status_bayar' => true,
        ]);

        return redirect()->to('/pembayaran/success');
    }

    public function batal($id)
    {
        $this->pembelianModel->update($id, [
            'status_pembayaran' => 'Batal',
            'status_bayar' => true,
            'status_ulasan' => true,
            'status_terima' => true,
            'status_tolak' => true,

        ]);
        session()->setFlashdata('pesan', 'Pemesanan Jaket Telah Dibatalkan');
        return redirect()->to('/riwayat');
    }
}
