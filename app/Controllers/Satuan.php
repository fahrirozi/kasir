<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelSatuan;

class Satuan extends BaseController
{
    public function __construct()
    {
        $this->ModelSatuan = new ModelSatuan();
    }
    public function index()
    {
        $data = [
            'judul' => 'Master Data',
            'subjudul' => 'Satuan',
            'menu' => 'masterdata',
            'submenu' => 'satuan',
            'page' => 'v_satuan',
            'satuan' => $this->ModelSatuan->AllData(),
        ];
        return view('v_template', $data);
    }

    public function InsertData()
    {
        $data = ['nama_satuan' => $this->request->getPost('nama_satuan')];
        $this->ModelSatuan->InsertData($data);
        session()->setFlashData('pesan','Data Berhasil Ditambahkan');
        return redirect()->to('Satuan');
    }

    public function UpdateData($id_satuan)
    {
        $data = [
            'id_satuan' => $id_satuan,
            'nama_satuan' => $this->request->getPost('nama_satuan')];
        $this->ModelSatuan->UpdateData($data);
        session()->setFlashData('pesan','Data Berhasil DiUpdate');
        return redirect()->to('Satuan');
    }

    public function DeleteData($id_satuan)
    {
        $data = [
            'id_satuan' => $id_satuan];
        $this->ModelSatuan->DeleteData($data);
        session()->setFlashData('pesan','Data Berhasil Dihapus');
        return redirect()->to('Satuan');
    }
}
