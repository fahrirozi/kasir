<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Forgot extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'forgot',
        ];
        return view('v_forgot', $data);
    }
}
