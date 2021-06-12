<?php

namespace App\Controllers;

use App\Models\CalonModel;
use Dompdf\Dompdf;

class Calon extends BaseController
{
    protected $calonModel;
    public function __construct()
    {
        $this->calonModel = new CalonModel();
    }
    public function index()
    {
        $currentPage = $this->request->getVar('page_calon') ? $this->request->getVar('page_calon') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $calon = $this->calonModel->search($keyword);
        } else {
            $calon = $this->calonModel;
        }
        $data = [
            'title' => 'Daftar Calon',
            // 'calon' => $this->calonModel->getCalon(),
            'calon' => $calon->paginate(7, 'calon'),
            'pager' => $this->calonModel->pager,
            'currentPage' => $currentPage
        ];

        return view('calon/index', $data);
    }

    public function delete($id)
    {
        // cari gambar berdasarkan id
        $calon = $this->calonModel->find($id);

        // cek jika file gambarnya default
        if ($calon['sampul'] != 'default2.jpg') {
            // hapus gambar
            unlink('img/' . $calon['sampul']);
        }

        $this->calonModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus!.');

        return redirect()->to('/calon');
    }

    public function pdf()
    {
        // // $calon = $this->calonModel->getCalon();
        // // $pdf = new TCPDF('p', 'mm', 'A4');
        // // $pdf->setPrintHeader(false);
        // // $pdf->setPrintFooter(false);
        // // $pdf->addpage();
        // // $pdf->Cell(10, 6, 'No', 1, 0);
        // // $pdf->Cell(25, 6, 'Nama Calon', 1, 0);
        // // $pdf->Cell(25, 6, 'Alamat Calon', 1, 0);
        // // $pdf->Cell(25, 6, 'Nama Loker', 1, 0);
        // // $pdf->Cell(25, 6, 'Jenis Loker', 1, 0);
        // // $pdf->Cell(25, 6, 'Nama Perusahaan', 1, 1);

        // // $no = 1;
        // // foreach ($calon as $c) {
        // //     $pdf->Cell(10, 6, $no++, 1, 0);
        // //     $pdf->Cell(25, 6, $c['nama_calon'], 1, 0);
        // //     $pdf->Cell(25, 6, $c['alamat_calon'], 1, 0);
        // //     $pdf->Cell(25, 6, $c['nama_loker'], 1, 0);
        // //     $pdf->Cell(25, 6, $c['jenis_loker'], 1, 0);
        // //     $pdf->Cell(25, 6, $c['nama_perusahaan'], 1, 1);
        // // }
        // // $this->response->setContentType('application/pdf');
        // // $pdf->Output();

        $data = [
            'calon' => $this->calonModel->getCalon()
        ];


        // // instantiate and use the dompdf class
        // $dompdf = new Dompdf();
        // $html = view('calon/index', $data);
        // $dompdf->loadHtml($html);

        // // (Optional) Setup the paper size and orientation
        // $dompdf->setPaper('A4', 'landscape');

        // // Render the HTML as PDF
        // $dompdf->render();

        // // Output the generated PDF to Browser
        // $dompdf->stream();
        $mpdf = new \Mpdf\Mpdf();

        $html =
            view('calon/pdf', $data);

        $mpdf->WriteHTML($html);
        $mpdf->Output('Daftar Calon.pdf', \Mpdf\Output\Destination::INLINE);
    }
}
