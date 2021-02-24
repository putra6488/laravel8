<?php

namespace App\Models;

use App\Http\Controllers\GuruController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use PhpParser\Builder\Function_;

class SiswaModel extends Model
{

    public function allData(){
        // relasi table
        return DB::table('siswa')
        ->leftJoin('kelas', 'kelas.id_kelas', '=', 'siswa.id_kelas')
        ->leftJoin('mapel', 'mapel.id_mapel', '=', 'siswa.id_mapel')
        ->get();
    }

    public function detail($id_siswa){
        return DB::table('siswa')->where('id_siswa', $id_siswa)
        ->leftJoin('kelas', 'kelas.id_kelas', '=', 'siswa.id_kelas')
        ->leftJoin('mapel', 'mapel.id_mapel', '=', 'siswa.id_mapel')
        ->first();
    }

    public function addData($data){
        DB::table('siswa')->insert($data);
    }

    public function editData($id_siswa, $data){
        DB::table('siswa')->where('id_siswa',$id_siswa)->update($data);
    }

    public function deleteData($id_siswa){
        DB::table('siswa')->where('id_siswa',$id_siswa)->delete();
    }
}
