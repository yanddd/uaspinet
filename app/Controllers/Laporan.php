<?php

namespace App\Controllers;

use App\Models\LaporanModel;

class Laporan extends BaseController
{
    protected $laporanModel;
    public function __construct()
    {
        $this->laporanModel = new LaporanModel();
    }

    public function index()
    {
        $currentPage = $this->request->getVar('page_laporan') ? $this->request->getVar('page_laporan') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $laporan = $this->laporanModel->search($keyword);
        } else {
            $laporan = $this->laporanModel;
        }
        $data = [
            'title' => 'Daftar laporan',
            'laporan' => $laporan->paginate(7, 'laporan'),
            'pager' => $this->laporanModel->pager,
            'validation' => \Config\Services::validation(),
            'currentPage' => $currentPage
        ];

        return view('laporan/index', $data);
    }
    public function lihatPdf($id)
    {

        $data = [
            'title' => 'Lihat Laporan',
            'laporan' => $this->laporanModel->getLaporan($id)

        ];

        return view('laporan/lihatPdf', $data);
    }

    public function delete($id)
    {
        $this->laporanModel->delete($id);
        session()->setFlashdata('pesan', 'Laporan berhasil dihapus!.');

        return redirect()->to('/laporan/index');
    }
}
