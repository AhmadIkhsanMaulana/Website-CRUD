<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GuruModel;

class GuruController extends Controller
{
    public function __construct()
    {
        $this->GuruModel = new GuruModel();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'guru' => $this->GuruModel->allData(),
        ];
        
        return view('guru', $data);
    }

    public function detail($id_guru)
    {
        if (!$this->GuruModel->detailGuru($id_guru)) {
            abort(404);
        }

        $data = [
            'guru' => $this->GuruModel->detailGuru($id_guru),
        ];

        return view('detail_guru', $data);
    }

    public function add()
    {
        return view('add_guru');
    }

    public function insert()
    {
        // Jika Data kosong
        Request()->validate([
            'nip' => 'required|unique:tbl_guru,nip|min:4|max:11',
            'nama_guru' => 'required',
            'mapel' => 'required',
            'foto' => 'required|mimes:jpg,jpeg,png,bmp|max:1024',
        ],[
            'nip.required' => 'Wajib Diisi!!',
            'nip.unique' => 'Nip Ini Sudah Ada!!',
            'nip.min' => 'Min 4 Karakter',
            'nip.max' => 'Max 11 karakter',
            'nama_guru.required' => 'Wajib Diisi!!',
            'mapel.required' => 'Wajib Diisi!!',
            'foto.required' => 'Wajib Diisi!!',
        ]);
        // Jika Validasi tidak ada maka lakukan simpan data
        // upload foto
        $file = Request()->foto;
        $fileName = Request()->nip . '.' . $file->extension();
        $file->move(public_path('foto'), $fileName);

        $data = [
            'nip' => Request()->nip,
            'nama_guru' => Request()->nama_guru,
            'mapel' => Request()->mapel,
            'foto' => $fileName,
        ];

        $this->GuruModel->addGuru($data);
        return redirect()->route('guru')
                         ->with('pesan', 'Data Berhasil Ditambahkan !!!');
    }

    public function edit($id_guru)
    {
        if (!$this->GuruModel->detailGuru($id_guru)) {
            abort(404);
        }
        $data = [
            'guru' => $this->GuruModel->detailGuru($id_guru),
        ];
        return view('edit_guru', $data);
    }

    public function update($id_guru)
    {
        Request()->validate([
            'nip' => 'required|min:4|max:11',
            'nama_guru' => 'required',
            'mapel' => 'required',
            'foto' => 'mimes:jpg,jpeg,png,bmp|max:1024',
        ],[
            'nip.required' => 'Wajib Diisi!!',
            'nip.min' => 'Min 4 Karakter',
            'nip.max' => 'Max 11 karakter',
            'nama_guru.required' => 'Wajib Diisi!!',
            'mapel.required' => 'Wajib Diisi!!',
        ]);

        if (Request()->foto <> ""){
            // Jika Ingin ganti Foto
            // upload foto
            $file = Request()->foto;
            $fileName = Request()->nip . '.' . $file->extension();
            $file->move(public_path('foto'), $fileName);

            $data = [
                'nip' => Request()->nip,
                'nama_guru' => Request()->nama_guru,
                'mapel' => Request()->mapel,
                'foto' => $fileName,
             ];

            $this->GuruModel->edit($id_guru, $data);
        } else {
            // Jika tidak ingin ganti foto
            $data = [
                'nip' => Request()->nip,
                'nama_guru' => Request()->nama_guru,
                'mapel' => Request()->mapel,
            ];

            $this->GuruModel->editGuru($id_guru, $data);
        }
        return redirect()->route('guru')
                         ->with('pesan', 'Data Berhasil DiUpdate !!!');
    }

    public function delete($id_guru)
    {
        // Hapus Foto
        $guru = $this->GuruModel->detailGuru($id_guru);
        if($guru->foto <> ""){
            unlink(public_path('foto'). '/' . $guru->foto);
        }

        $this->GuruModel->deleteGuru($id_guru);
        return redirect()->route('guru')
                         ->with('pesan', 'Data Berhasil Dihapus !!!');
    }

}
