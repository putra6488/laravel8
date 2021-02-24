<?php

namespace App\Http\Controllers;

use App\Models\GuruModel;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function __construct()
    {
        $this->GuruModel = new GuruModel();
        $this->middleware('auth');
    }

    // menampilkan data guru
    public function index(){
        $data = [
            'guru' => $this->GuruModel->allData(),
        ];
        return view('guru.v_guru', $data);
    }

    // menampilkan detail data dari guru
    public function detail($id_guru){
        if (!$this->GuruModel->detail($id_guru)){
            abort(404);
        }
        $data = [
            'guru' => $this->GuruModel->detail($id_guru),
        ];
        return view('guru.v_detailGuru', $data);
    }

    // menampilkan form tambah data guru
    public function add(){
        return view('guru.v_addGuru');
    }

    // melakukan validasi data guru dan menambahkan data guru
    public function insert(){
        Request()->validate([
            'nip'       => 'required|unique:guru,nip|min:5|max:20',
            'nama_guru' => 'required',
            'mapel'     => 'required',
            'foto_guru' => 'required|mimes:jpg,png,jpeg',
        ],
        [
            'nip.required'          => 'NIP Wajib Di isi',
            'nip.unique'            => 'NIP ini sudah ada',
            'nama_guru.required'    => 'Nama Guru Harus Di Isi',
            'mapel.required'        => 'Mata Pelajaran Harus Di Isi',
            'foto_guru.required'    => 'Foto Harus Di Isi',
            'foto_guru.mimes'       => 'Format harus JPG, JPEG, atau PNG'
        ]);

        $file = Request()->foto_guru;
        $fileName = Request()->nip. '.' .$file->extension();
        $file->move(public_path('foto'), $fileName);

        $data = [
            'nip' => Request()->nip,
            'nama_guru' => Request()->nama_guru,
            'mapel' => Request()->mapel,
            'foto_guru' => $fileName,
        ];

        $this->GuruModel->addData($data);
        return redirect()->route('guru')->with('pesan', 'Data Berhasil Di Tambahkan');
    }

    // menampilkan form edit data guru
    public function edit($id_guru){
        if (!$this->GuruModel->detail($id_guru)){
            abort(404);
        }
        $data = [
            'guru' => $this->GuruModel->detail($id_guru),
        ];
        return view('guru.v_editGuru', $data);
    }

    public function update($id_guru){
        Request()->validate([
            'nama_guru' => 'required',
            'mapel'     => 'required',
            'foto_guru' => 'mimes:jpg,png,jpeg',
        ],
        [
            'nip.required'          => 'NIP Wajib Di isi',
            'nama_guru.required'    => 'Nama Guru Harus Di Isi',
            'mapel.required'        => 'Mata Pelajaran Harus Di Isi',
            'foto_guru.mimes'       => 'Format harus JPG, JPEG, atau PNG'
        ]);

        if (Request()->foto_guru <> "") {
            // jika ingin ganti foto
            $file = Request()->foto_guru;
            $fileName = Request()->nip. '.' .$file->extension();
            $file->move(public_path('foto'), $fileName);
    
            $data = [
                'nip' => Request()->nip,
                'nama_guru' => Request()->nama_guru,
                'mapel' => Request()->mapel,
                'foto_guru' => $fileName,
            ];
    
            $this->GuruModel->editData($id_guru, $data);
        }else{
            // jika tidak ingin ganti foto
            $data = [
                'nip' => Request()->nip,
                'nama_guru' => Request()->nama_guru,
                'mapel' => Request()->mapel,
            ];
            $this->GuruModel->editData($id_guru, $data);
        }

        return redirect()->route('guru')->with('pesan', 'Data Berhasil Di Update');
    }

    public function delete($id_guru){
        // hapus foto
        $guru = $this->GuruModel->detail($id_guru);
        if ($guru->foto_guru <> "") {
            unlink(public_path('foto'). '/'. $guru->foto_guru);
        }
        $this->GuruModel->deleteData($id_guru);
        return redirect()->route('guru')->with('pesan', 'Data Berhasil Di Hapus');
    }

}
