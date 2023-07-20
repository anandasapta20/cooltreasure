<?php

namespace App\Controllers;

use \App\Models\JaketModel;

class AdminJaket extends BaseController
{
    protected $jaketModel;
    public function __construct()
    {
        $this->jaketModel = new JaketModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Jaket | Admin Cooltreasure.id',
            'jaket' => $this->jaketModel->getJaket()
        ];

        return view('admin/daftarJaket', $data);
    }

    public function tambahJaket()
    {
        // session();
        $data = [
            'title' => 'Tambah Jaket | Admin Cooltreasure.id',
            'validation' => \Config\Services::validation()
        ];
        return view('admin/tambahJaket', $data);
    }

    public function saveJaket()
    {

        // session();
        if (!$this->validate([
            'nama_jaket' => [
                'rules' => 'required|is_unique[jaket.nama_jaket]',
                'errors' => [
                    'required' => 'Nama Jaket Harus Diisi.',
                    'is_unique' => 'Nama Jaket Sudah Terisi.'
                ]
            ],
            'foto_jaket' => [
                'rules' => 'max_size[foto_jaket,1024]|is_image[foto_jaket]',
                'errors' => [
                    'max_size' => 'Ukuran Foto Terlalu Besar',
                    'is_image' => 'File yang Anda Pilih Tidak Berformat Foto'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            session()->setFlashdata('error', $validation->listErrors());
            return redirect()->to('/admin/daftarJaket/tambahJaket')->withInput();
            // return redirect()->to('/admin/daftarJaket/tambahJaket')->withInput()->with('validation', $validation);
        }

        //ambil gambar
        $fileFoto = $this->request->getFile('foto_jaket');
        //apakah tidak ada gambar yang diupload
        if ($fileFoto->getError() == 4) {
            $namaFoto = 'default.png';
        } else {
            //pindahkan file
            $fileFoto->move('Assets/fotojaket');
            //ambil nama file
            $namaFoto = $fileFoto->getName();
        }

        $this->jaketModel->save([
            'nama_jaket' => $this->request->getVar('nama_jaket'),
            'ukuran' => $this->request->getVar('ukuran'),
            'kondisi' => $this->request->getVar('kondisi'),
            'harga' => $this->request->getVar('harga'),
            'jenis' => $this->request->getVar('jenis'),
            'foto_jaket' => $namaFoto
        ]);

        session()->setFlashdata('pesan', 'Jaket Berhasil Ditambahkan.');

        return redirect()->to('/admin/daftarJaket');
    }

    public function deleteJaket($id)
    {
        //cari gambar berdasarkan id
        $jaket = $this->jaketModel->getJaket($id);

        //bukan gambar default
        if ($jaket['foto_jaket'] != 'default.png') {
            //hapus gambar
            unlink('Assets/fotoJaket/' . $jaket['foto_jaket']);
        }

        $this->jaketModel->delete($id);
        session()->setFlashdata('pesan', 'Jaket Berhasil Dihapus');
        return redirect()->to('/admin/daftarJaket');
    }

    public function ubahJaket($id)
    {
        $data = [
            'title' => 'Ubah Data Jaket | Admin Cooltreasure.id',
            'validation' => \Config\Services::validation(),
            'jaket' => $this->jaketModel->getJaket($id)
        ];
        return view('admin/ubahJaket', $data);
    }

    public function updateJaket($id)
    {
        // $jaketLama = $this->jaketModel->getJaket($this->request->getVar('nama_jaket'));
        $jaketLama = $this->jaketModel->getJaket($id);
        // $jaketLama = $this->jaketModel->where('id', $id)->findColumn('nama_jaket');

        if ($this->request->getVar('nama_jaket') == $jaketLama['nama_jaket']) {
            $rule_jaket = 'required';
        } else {
            $rule_jaket = 'required|is_unique[jaket.nama_jaket]';
        }


        if (!$this->validate([
            'nama_jaket' => [
                'rules' => $rule_jaket,
                'errors' => [
                    'required' => 'Nama Jaket Harus Diisi.',
                    'is_unique' => 'Nama Jaket Sudah Terisi.'
                ]
            ],
            'foto_jaket' => [
                'rules' => 'max_size[foto_jaket,1024]|is_image[foto_jaket]',
                'errors' => [
                    'max_size' => 'Ukuran Foto Terlalu Besar',
                    'is_image' => 'File yang Anda Pilih Tidak Berformat Foto'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            session()->setFlashdata('error', $validation->listErrors());
            return redirect()->to('/admin/daftarJaket/ubahJaket/' . $id)->withInput();
        }

        $fileFoto = $this->request->getFile('foto_jaket');

        //cek gambar apakah tetap gambar lama
        if ($fileFoto->getError() == 4) {
            $namaFoto = $this->request->getVar('nama_foto_jaket_lama');
        } else {
            $namaFoto = $fileFoto->getName();

            $fileFoto->move('Assets/fotojaket', $namaFoto);

            unlink('Assets/fotojaket/' . $this->request->getVar('nama_foto_jaket_lama'));
        }

        $this->jaketModel->update($id, [
            'nama_jaket' => $this->request->getVar('nama_jaket'),
            'ukuran' => $this->request->getVar('ukuran'),
            'kondisi' => $this->request->getVar('kondisi'),
            'harga' => $this->request->getVar('harga'),
            'jenis' => $this->request->getVar('jenis'),
            'foto_jaket' => $namaFoto
        ]);

        session()->setFlashdata('pesan', 'Jaket Berhasil Diubah.');

        return redirect()->to('/admin/daftarJaket');
    }
}
