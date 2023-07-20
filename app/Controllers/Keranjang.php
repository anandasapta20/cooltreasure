<?php

namespace App\Controllers;

use \App\Models\KeranjangModel;
use \App\Models\PembelianModel;
use \App\Models\JaketModel;
use \App\Models\UserModel;

class Keranjang extends BaseController
{
    protected $keranjangModel;
    protected $pembelianModel;
    protected $jaketModel;
    protected $userModel;
    public function __construct()
    {
        $this->keranjangModel = new KeranjangModel();
        $this->pembelianModel = new PembelianModel();
        $this->jaketModel = new JaketModel();
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Keranjang | Cooltreasure.id',
            'dataKeranjang' => $this->keranjangModel->getKeranjang()
        ];

        // $dataKeranjang = $this->keranjangModel->getKeranjang();
        // dd($dataKeranjang);

        return view('/login/keranjang', $data);
    }

    public function tambah($id)
    {
        $this->keranjangModel->insert([
            'user_id' => session()->get('id_user'),
            'jaket_id' => $id,
        ]);
        session()->setFlashdata('pesan', 'Jaket Berhasil Ditambahkan ke Keranjang');
        return redirect()->back();
    }

    public function hapus($id)
    {
        $this->keranjangModel->delete($id);
        session()->setFlashdata('pesan', 'Jaket Berhasil Dihapus dari Keranjang');
        return redirect()->to('/keranjang/' . session()->get('id_user'));
    }

    public function hapusSemua()
    {
        $dataKeranjang = $this->keranjangModel->getKeranjang();

        $this->keranjangModel->delete($dataKeranjang['user_id'] = session()->get('id_user'));
        session()->setFlashdata('pesan', 'Semua jaket berhasil dihapus dari keranjang');
        return redirect()->to('/keranjang/' . session()->get('id_user'));
    }

    public function beli($id)
    {
        dd($this->request->getVar('total'));

        $this->pembelianModel->insert([
            'user_id' => session()->get('id_user'),
            'jaket_id' => $id,
            'total' => $this->request->getVar('total')
        ]);
        return redirect()->to('/pemesanan/' . session()->get('id_user'));
    }
}
