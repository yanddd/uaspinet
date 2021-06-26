<?php

namespace App\Controllers;

use App\Models\PenjualanModel;

class Order extends BaseController
{
    protected $orderModel;
    protected $penjualanModel;
    public function __construct()
    {
        $this->orderModel = new PenjualanModel();
        $this->penjualanModel = new PenjualanModel();
    }

    public function index()
    {
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $penjualan = $this->orderModel->search($keyword);
        } else {
            $penjualan = $this->orderModel;
        }
        if (in_groups('admin')) {
            $data = [
                'title' => 'Orderan',
                'penjualan' => $penjualan->findAll(),
                'validation' => \Config\Services::validation(),
            ];
        } else {
            $data = [
                'title' => 'Histori Pembelian',
                'penjualan' => $penjualan->findAll(),
                'validation' => \Config\Services::validation(),
            ];
        }
        return view('order/index', $data);
    }

    public function update($id)
    {
        $this->penjualanModel->save([
            'id' => $id,
            'status' => $this->request->getVar('status'),
        ]);

        session()->setFlashdata('pesan', 'Orderan telah berhasil di konfirmasi!');

        return redirect()->to('/order');
    }

    public function kwitansi($id)
    {
        $data = [
            'penjualan' => $this->penjualanModel->getKwin($id)
        ];

        $mpdf = new \Mpdf\Mpdf(['orientation' => 'L', 'format' => [100, 200]]);

        $html =
            view('order/kwitansi', $data);

        $mpdf->WriteHTML($html);
        $mpdf->Output('kwitansi ' . $id . '.pdf', \Mpdf\Output\Destination::INLINE);
    }
}
