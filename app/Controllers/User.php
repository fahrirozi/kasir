<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelUser;

class User extends BaseController
{
    public function __construct()
    {
        $this->ModelUser = new ModelUser();
    }
    public function index()
    {
        $data = [
            'judul' => 'Master Data',
            'subjudul' => 'User',
            'menu' => 'masterdata',
            'submenu' => 'user',
            'page' => 'v_user',
            'user' => $this->ModelUser->AllData(),
        ];
        return view('v_template', $data);
    }

    public function InsertData()
    {
        $data = [
            'nama_user' => $this->request->getPost('nama_user'),
            'email' => $this->request->getPost('email'),
            'password' => md5($this->request->getPost('password')),
            'level' => $this->request->getPost('level'),
        ];
        $this->ModelUser->InsertData($data);
        session()->setFlashData('pesan','Data Berhasil Ditambahkan');
        return redirect()->to('User');
    }

    public function UpdateData($id_user)
    {
        $data = [
            'id_user' => $id_user,
            'nama_user' => $this->request->getPost('nama_user'),
            'email' => $this->request->getPost('email'),
            'password' => md5($this->request->getPost('password')),
            'level' => $this->request->getPost('level'),
        ];
        $this->ModelUser->UpdateData($data);
        session()->setFlashData('pesan','Data Berhasil DiUpdate');
        return redirect()->to('User');
    }

    public function DeleteData($id_user)
    {
        $data = [
            'id_user' => $id_user];
        $this->ModelUser->DeleteData($data);
        session()->setFlashData('pesan','Data Berhasil Dihapus');
        return redirect()->to('User');
    }
}
