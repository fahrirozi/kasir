<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelAdmin;

class Admin extends BaseController
{
    public function __construct()
    {
        $this->ModelAdmin = new ModelAdmin();
    }

    public function index()
    {
        $data = [
            'judul' => 'Dashboard',
            'subjudul' => '',
            'menu' => 'dashboard',
            'submenu' => '',
            'page' => 'v_admin',
            'grafik' => $this->ModelAdmin->Grafik(),
            'p_harian' => $this->ModelAdmin->PendapatanHarian(),
            'p_bulanan' => $this->ModelAdmin->PendapatanBulanan(),
            'p_tahunan' => $this->ModelAdmin->PendapatanTahunan(),
            'total_produk' => $this->ModelAdmin->TotalProduk(),
            'total_kategori' => $this->ModelAdmin->TotalKategori(),
            'total_satuan' => $this->ModelAdmin->TotalSatuan(),
            'total_user' => $this->ModelAdmin->TotalUser(),
        ];
        return view('v_template', $data);
    }

    public function About()
    {
        $data = [
            'judul' => 'About',
            'page' => 'v_about',
        ];
        return view('v_template', $data);
    }

    

    public function Setting()
    {
        $data = [
            'judul' => 'Setting',
            'subjudul' => 'Setting',
            'page' => 'v_setting',
            'setting' => $this->ModelAdmin->DetailData(),
        ];
        return view('v_template', $data);
    }

    public function UpdateSetting()
    {
        $data = [
            'id' => '1',
            'nama_toko' => $this->request->getPost('nama_toko'),
            'slogan' => $this->request->getPost('slogan'),
            'alamat' => $this->request->getPost('alamat'),
            'no_telpon' => $this->request->getPost('no_telpon'),
            'deskripsi' => $this->request->getPost('deskripsi'),
        ];
            
        $this->ModelAdmin->UpdateSetting($data);
        session()->setFlashData('pesan','Data Berhasil DiUpdate');
        return redirect()->to('Admin/Setting');
    }

    public function Cek()
    {

    }
}
