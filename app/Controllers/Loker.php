<?php

namespace App\Controllers;

use App\Models\LokerModel;
use App\Models\CalonModel;

class Loker extends BaseController
{
    protected $lokerModel;
    public function __construct()
    {
        $this->lokerModel = new LokerModel();
        $this->calonModel = new CalonModel();
    }
    public function index()
    {
        $currentPage = $this->request->getVar('page_loker') ? $this->request->getVar('page_loker') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $loker = $this->lokerModel->search($keyword);
        } else {
            $loker = $this->lokerModel;
        }
        $data = [
            'title' => 'Daftar Loker',
            // 'loker' => $this->lokerModel->getLoker(),
            'loker' => $loker->paginate(6, 'loker'),
            'pager' => $this->lokerModel->pager,
            'currentPage' => $currentPage
        ];

        return view('loker/index', $data);
    }

    public function detail($slug)
    {

        $data = [
            'title' => 'Detail Loker',
            'loker' => $this->lokerModel->getLoker($slug)
        ];

        if (empty($data['loker'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Loker ' . $slug . ' tidak ditemukan.');
        }

        return view('loker/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form tambah data loker',
            'validation' => \Config\Services::validation()
        ];

        return view('loker/create', $data);
    }

    public function save()
    {

        // validasi input
        if (!$this->validate([
            'nama_loker' => [
                'rules' => 'required|is_unique[loker.nama_loker]',
                'errors' => [
                    'required' => '{field} harus di isi',
                    'is_unique' => '{field} sudah terdaftar'
                ]
            ],
            'sampul' => [
                'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar {field} terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            return redirect()->to('/loker/create')->withInput();
        }

        // ambil gambar
        $fileSampul = $this->request->getFile('sampul');
        // apakah tidak ada gambar yang di upload
        if ($fileSampul->getError() == 4) {
            $namaSampul = 'default.jpg';
        } else {
            // generate nama sampul random
            $namaSampul = $fileSampul->getRandomName();
            // pindahkan file ke folder img
            $fileSampul->move('img', $namaSampul);
        }

        $slug = url_title($this->request->getVar('nama_loker'), '-', true);
        $this->lokerModel->save([
            'nama_loker' => $this->request->getVar('nama_loker'),
            'slug' => $slug,
            'jenis_loker' => $this->request->getVar('jenis_loker'),
            'nama_perusahaan' => $this->request->getVar('nama_perusahaan'),
            'sampul' => $namaSampul
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan!.');

        return redirect()->to('/loker');
    }

    public function delete($id)
    {
        // cari gambar berdasarkan id
        $loker = $this->lokerModel->find($id);

        // cek jika file gambarnya default
        if ($loker['sampul'] != 'default.jpg') {
            // hapus gambar
            unlink('img/' . $loker['sampul']);
        }

        $this->lokerModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus!.');

        return redirect()->to('/loker');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Form ubah data Loker',
            'validation' => \Config\Services::validation(),
            'loker' => $this->lokerModel->getLoker($slug)
        ];

        return view('loker/edit', $data);
    }

    public function update($id)
    {
        $lokerLama = $this->lokerModel->getLoker($this->request->getVar('slug'));
        if ($lokerLama['nama_loker'] == $this->request->getVar('nama_loker')) {
            $rule_nama_loker = 'required';
        } else {
            $rule_nama_loker = 'required|is_unique[loker.nama_loker]';
        }
        if (!$this->validate([
            'nama_loker' => [
                'rules' => $rule_nama_loker,
                'errors' => [
                    'required' => '{field} harus di isi.',
                    'is_unique' => '{field} sudah terdaftar.'
                ]
            ],
            'sampul' => [
                'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar {field} terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            return redirect()->to('/loker/edit/' . $this->request->getVar('slug'))->withInput();
        }

        $fileSampul = $this->request->getFile('sampul');

        // cek gambar, apakah tetap gambar lama
        if ($fileSampul->getError() == 4) {
            $namaSampul = $this->request->getVar('sampulLama');
        } else {
            // generate nama file random
            $namaSampul = $fileSampul->getRandomName();
            // pindahkan gambar
            $fileSampul->move('img', $namaSampul);
            // hapus file yang lama
            if ($this->request->getVar('sampulLama') != 'default.jpg') {
                unlink('img/' . $this->request->getVar('sampulLama'));
            }
        }

        $slug = url_title($this->request->getVar('nama_loker'), '-', true);
        $this->lokerModel->save([
            'id' => $id,
            'nama_loker' => $this->request->getVar('nama_loker'),
            'slug' => $slug,
            'jenis_loker' => $this->request->getVar('jenis_loker'),
            'nama_perusahaan' => $this->request->getVar('nama_perusahaan'),
            'sampul' => $namaSampul
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah!.');

        return redirect()->to('/loker');
    }

    public function form($id)
    {

        $data = [
            'title' => 'Form Loker',
            'validation' => \Config\Services::validation(),
            'loker' => $this->lokerModel->getForm($id)
        ];

        return view('loker/form', $data);
    }

    public function saveCalon()
    {

        // validasi input
        if (!$this->validate([
            'username' => [
                'rules' => 'is_unique[calon.username]',
                'errors' => [
                    'required' => '{field} harus di isi',
                    'is_unique' => '{field} sudah terdaftar'
                ]
            ],

            'nama_calon' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi',
                ]
            ],

            'alamat_calon' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi',
                ]
            ],

            'sampul' => [
                'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar {field} terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            session()->setFlashdata('pesan_gagal', 'Gagal mengirim Formulir!');
            return redirect()->to('/loker');
        }

        // ambil gambar
        $fileSampul = $this->request->getFile('sampul');
        // apakah tidak ada gambar yang di upload
        if ($fileSampul->getError() == 4) {
            $namaSampul = 'default2.jpg';
        } else {
            // generate nama sampul random
            $namaSampul = $fileSampul->getRandomName();
            // pindahkan file ke folder img
            $fileSampul->move('img', $namaSampul);
        }

        $this->calonModel->save([
            'username' => $this->request->getVar('username'),
            'nama_calon' => $this->request->getVar('nama_calon'),
            'alamat_calon' => $this->request->getVar('alamat_calon'),
            'nama_loker' => $this->request->getVar('nama_loker'),
            'jenis_loker' => $this->request->getVar('jenis_loker'),
            'nama_perusahaan' => $this->request->getVar('nama_perusahaan'),
            'sampul' => $namaSampul
        ]);

        session()->setFlashdata('pesan', 'Formulir berhasil dikirim!');

        return redirect()->to('/loker');
    }
}
