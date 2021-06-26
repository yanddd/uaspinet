<?php

namespace App\Controllers;

use App\Models\PenjualanModel;
use App\Models\LaporanModel;
use Dompdf\Dompdf;

class Penjualan extends BaseController
{
    protected $penjualanModel;
    public function __construct()
    {
        $this->penjualanModel = new PenjualanModel();
        $this->laporanModel = new LaporanModel();
    }
    public function index()
    {
        $currentPage = $this->request->getVar('page_penjualan') ? $this->request->getVar('page_penjualan') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $penjualan = $this->penjualanModel->search($keyword);
        } else {
            $penjualan = $this->penjualanModel;
        }
        $data = [
            'title' => 'Data Penjualan',
            'penjualan' => $penjualan->paginate(7, 'penjualan'),
            'pager' => $this->penjualanModel->pager,
            'validation' => \Config\Services::validation(),
            'currentPage' => $currentPage
        ];

        return view('penjualan/index', $data);
    }

    public function delete($id)
    {
        $this->penjualanModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus!.');

        return redirect()->to('/penjualan');
    }

    public function pdf()
    {
        $data = [
            'penjualan' => $this->penjualanModel->getPenjualan()
        ];

        $mpdf = new \Mpdf\Mpdf();

        $html =
            view('penjualan/pdf', $data);

        $mpdf->WriteHTML($html);
        $mpdf->Output('Data Penjualan.pdf', \Mpdf\Output\Destination::INLINE);
    }
    public function save()
    {
        $fileLaporan = $this->request->getFile('laporan');
        $namaLaporan = $fileLaporan->getName();
        $fileLaporan->move('laporan', $namaLaporan);
        $this->laporanModel->save([
            'laporan' => $namaLaporan
        ]);

        session()->setFlashdata('pesan', 'Laporan berhasil dikirim!');

        return redirect()->to('/penjualan');
    }
}
