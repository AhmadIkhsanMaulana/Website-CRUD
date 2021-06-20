<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SiswaModel extends Model
{
    public function allData()
    {
        return DB::table('tbl_siswa')
                ->leftJoin('tbl_rombel', 'tbl_rombel.id_rombel', '=', 'tbl_siswa.id_rombel')
                ->leftJoin('tbl_mapel', 'tbl_mapel.id_mapel', '=', 'tbl_siswa.id_mapel')
                ->get();
    }
}
