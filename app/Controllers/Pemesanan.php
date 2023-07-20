<?php

namespace App\Controllers;

use \App\Models\PembelianModel;
use \App\Models\JaketModel;
use \App\Models\UserModel;
use \App\Models\MetodePengirimanModel;
use \App\Models\MetodePembayaranModel;

class Pemesanan extends BaseController
{
    protected $pembelianModel;
    protected $jaketModel;
    protected $userModel;
    protected $metodePengirimanModel;
    protected $metodePembayaranModel;
    public function __construct()
    {
        $this->pembelianModel = new PembelianModel();
        $this->jaketModel = new JaketModel();
        $this->userModel = new UserModel();
        $this->metodePengirimanModel = new MetodePengirimanModel();
        $this->metodePembayaranModel = new MetodePembayaranModel();
    }

    public function index($id)
    {
        $data = [
            'title' => 'Pemesanan | Cooltreasure.id',
            'jaket' => $this->jaketModel->getJaket($id),
            'metodePengiriman' => $this->metodePengirimanModel->getMetode(),
            'metodePembayaran' => $this->metodePembayaranModel->getMetode(),
            'dataUser' => $this->userModel->getUser(session()->get('id_user'))
        ];

        return view('/login/pemesanan', $data);
    }

    public function save($id)
    {
        $dataJaket = $this->jaketModel->getJaket($id);

        // dd($this->request->getVar('metode_pengiriman'));

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
                    'required' => 'Kode pos Harus Diisi.'
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->to('/pemesanan/' . $id)->withInput();
        }

        // dd($this->request->getVar('mpembayaran_id'));

        $this->userModel->update(session()->get('id_user'), [
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'alamat' => $this->request->getVar('alamat'),
            'rt_rw' => $this->request->getVar('rt_rw'),
            'kelurahan_desa' => $this->request->getVar('kelurahan_desa'),
            'kecamatan' => $this->request->getVar('kecamatan'),
            'kabupaten_kota' => $this->request->getVar('kabupaten_kota'),
            'provinsi' => $this->request->getVar('provinsi'),
            'kode_pos' => $this->request->getVar('kode_pos'),
        ]);

        $this->pembelianModel->insert([
            'user_id' => session()->get('id_user'),
            'jaket_id' => $id,
            'mpembayaran_id' => $this->request->getVar('mpembayaran_id'),
            'mpengiriman_id' => $this->request->getVar('mpengiriman_id'),
            'status_pembayaran' => 'Menunggu Pembayaran',
            'total' => $dataJaket['harga']
        ]);

        return redirect()->to('/pemesanan/success/' . $this->pembelianModel->getInsertID());
    }
}
