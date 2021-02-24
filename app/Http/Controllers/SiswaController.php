<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiswaModel;
use Dompdf\Dompdf;

class SiswaController extends Controller
{

    public function __construct()
    {
        $this->SiswaModel = new SiswaModel();
        $this->middleware('auth');
    }

    public function index(){
        $data = [
            'siswa' => $this->SiswaModel->allData(),
        ];
        return view('siswa.v_siswa', $data);
    }

    public function detail($id_siswa){
        // if (!$this->SiswaModel->detail($id_siswa)){
        //     abort(404);
        // }
        $data = [
            'siswa' => $this->SiswaModel->detail($id_siswa),
        ];
        return view('siswa.v_detailSiswa', $data);
    }

    public function add(){
        return view('siswa.v_addSiswa');
    }

    public function insert(){
        Request()->validate([
            'nis'       => 'required|unique:siswa,nis|min:5|max:20',
            'nama_siswa' => 'required',
            'id_kelas'     => 'required',
            'foto_siswa' => 'required|mimes:jpg,png,jpeg',
        ],
        [
            'nis.required'          => 'NIS Wajib Di isi',
            'nis.unique'            => 'NIS ini sudah ada',
            'nama_siswa.required'    => 'Nama Guru Harus Di Isi',
            'id_kelaskelas.required'        => 'Kelas Harus Di Isi',
            'foto_siswa.required'    => 'Foto Harus Di Isi',
            'foto_siswa.mimes'       => 'Format harus JPG, JPEG, atau PNG'
        ]);

        $file = Request()->foto_siswa;
        $fileName = Request()->nis. '.' .$file->extension();
        $file->move(public_path('foto_siswa'), $fileName);

        $data = [
            'nis' => Request()->nis,
            'nama_siswa' => Request()->nama_siswa,
            'id_kelas' => Request()->id_kelas,
            'foto_siswa' => $fileName,
        ];
        // dd($data);
        $this->SiswaModel->addData($data);
        return redirect()->route('siswa')->with('pesan', 'Data Berhasil Di Tambahkan');
    }

    public function edit($id_siswa){
        $data = [
            'siswa' => $this->SiswaModel->detail($id_siswa),
        ];
        return view('siswa.v_editSiswa', $data);
    }

    public function update($id_siswa){
        Request()->validate([
            'nama_siswa' => 'required',
            'id_kelas'     => 'required',
            'foto_siswa' => 'mimes:jpg,png,jpeg',
        ],
        [
            'nis.required'          => 'NIP Wajib Di isi',
            'nama_siswa.required'    => 'Nama Guru Harus Di Isi',
            'id_kelas.required'        => 'Mata Pelajaran Harus Di Isi',
            'foto_siswa.mimes'       => 'Format harus JPG, JPEG, atau PNG'
        ]);

        if (Request()->foto_siswa <> "") {
            // jika ingin ganti foto
            $file = Request()->foto_siswa;
            $fileName = Request()->nis. '.' .$file->extension();
            $file->move(public_path('foto_siswa'), $fileName);
    
            $data = [
                'nis' => Request()->nis,
                'nama_siswa' => Request()->nama_guru,
                'id_kelas' => Request()->id_kelas,
                'foto_siswa' => $fileName,
            ];
            $this->SiswaModel->editData($id_siswa, $data);
        }else{
            // jika tidak ingin ganti foto
            $data = [
                'nis' => Request()->nis,
                'nama_siswa' => Request()->nama_siswa,
                'id_kelas' => Request()->id_kelas,
            ];
            $this->SiswaModel->editData($id_siswa, $data);
        }
        // dd($data);
        return redirect()->route('siswa')->with('pesan', 'Data Berhasil Di Update');
    }

    public function delete($id_siswa){
        $siswa = $this->SiswaModel->detail($id_siswa);
        if ($siswa->foto_siswa <> "") {
            unlink(public_path('foto_siswa'). '/'. $siswa->foto_siswa);
        }
        $this->SiswaModel->deleteData($id_siswa);
        return redirect()->route('siswa')->with('pesan', 'Data Berhasil Di Hapus');
    }

    public function print(){
        $data = [
            'siswa' => $this->SiswaModel->allData(),
        ];
        
        return view('siswa.v_print', $data);
    }

    public function printpdf(){
        $data = [
            'siswa' => $this->SiswaModel->allData(),
        ];
        
        $html = view('siswa.v_printPDF', $data);

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $options = $dompdf->getOptions();
        $options->setIsHtml5ParserEnabled(true);
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream();
    }
    
}
