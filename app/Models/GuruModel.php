<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class GuruModel extends Model
{
    use HasFactory;

    public function allData()
    {
        return DB::table('tbl_guru')->get();
    }

    public function detailGuru($id_guru)
    {
        return DB::table('tbl_guru')->where('id_guru', $id_guru)->first();
    }

    public function addGuru($data)
    {
        DB::table('tbl_guru')->insert($data);
    }

    public function editGuru($id_guru, $data)
    {
        DB::table('tbl_guru')->where('id_guru', $id_guru)->update($data);
    }

    public function deleteGuru($id_guru)
    {
        DB::table('tbl_guru')->where('id_guru', $id_guru)->delete();
    }
}
