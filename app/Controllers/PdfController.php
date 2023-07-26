<?php

namespace App\Controllers;

use CodeIgniter\Controller;

use \App\Models\PembelianModel;
use \App\Models\UserModel;
use Dompdf\Dompdf;

class PdfController extends Controller
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
            'tanggal' => $this->pembelianModel->getTanggal()
        ];
        return view('pdf_view', $data);
    }
    function htmlToPDF()
    {
        $data = [
            'title' => 'Daftar Pemesanan | Admin Cooltreasure.id',
            'pembelian' => $this->pembelianModel->getPembelian(),
            'tanggal' => $this->pembelianModel->getTanggal()
        ];

        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('pdf_view', $data));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream();
    }
}
