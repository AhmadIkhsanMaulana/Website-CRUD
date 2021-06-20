<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiswaModel;

class SiswaController extends Controller
{
    public function __construct()
    {
        $this->SiswaModel = new SiswaModel();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'siswa' => $this->SiswaModel->allData(),
        ];

        return view('siswa', $data);
    }

    public function print()
    {
        $data = [
            'siswa' => $this->SiswaModel->allData(),
        ];

        return view('print', $data);
    }
}
