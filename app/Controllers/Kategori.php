<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelKategori;

class Kategori extends BaseController
{
    public function __construct()
    {
        $this->ModelKategori = new ModelKategori();
    }

    public function index()
    {
        $data = [
            'judul' => 'Master Data',
            'subjudul' => 'Kategori',
            'menu' => 'masterdata',
            'submenu' => 'kategori',
            'page' => 'v_kategori',
            'kategori' => $this->ModelKategori->AllData(),
        ];
        return view('v_template', $data);
    }

    public function InsertData()
    {
        $data = ['nama_kategori' => $this->request->getPost('nama_kategori')];
        $this->ModelKategori->InsertData($data);
        session()->setFlashData('pesan','Data Berhasil Ditambahkan');
        return redirect()->to('Kategori');
    }

    public function UpdateData($id_kategori)
    {
        $data = [
            'id_kategori' => $id_kategori,
            'nama_kategori' => $this->request->getPost('nama_kategori')];
        $this->ModelKategori->UpdateData($data);
        session()->setFlashData('pesan','Data Berhasil DiUpdate');
        return redirect()->to('Kategori');
    }

    public function DeleteData($id_kategori)
    {
        $data = [
            'id_kategori' => $id_kategori];
        $this->ModelKategori->DeleteData($data);
        session()->setFlashData('pesan','Data Berhasil Dihapus');
        return redirect()->to('Kategori');
    }
}
