<?php

namespace App\Controllers;

use App\Models\PenjualanModel;

class Cart extends BaseController
{
    protected $cartModel;
    protected $penjualanModel;
    public function __construct()
    {
        $this->cartModel = new PenjualanModel();
        $this->penjualanModel = new PenjualanModel();
    }

    public function index()
    {
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $penjualan = $this->cartModel->search($keyword);
        } else {
            $penjualan = $this->cartModel;
        }

        $data = [
            'title' => 'Keranjang Belanja',
            'penjualan' => $penjualan->findAll(),
            'validation' => \Config\Services::validation(),
        ];

        return view('cart/index', $data);
    }

    public function delete($id)
    {
        $this->penjualanModel->delete($id);
        session()->setFlashdata('pesan', 'Pembelian telah di batalkan!');

        return redirect()->to('/cart');
    }
}
