@extends('layouts.v_templates')
@section('title', 'Tambah Siswa')

@section('content')
<form action="/siswa/insert" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group col-6">
      <label for="nis">NIS</label>
      <input name="nis" class="form-control" value=" {{old('nis')}} "  id="nis" placeholder="NIS">
      <div class=" text-danger">
        @error('nis')
            {{ $message }}
        @enderror
      </div>
    </div>
    <div class="form-group col-6">
        <label for="nama_siswa">Nama</label>
        <input name="nama_siswa" class="form-control" value=" {{old('nama_siswa')}} " id="nama_siswa" placeholder="Nama">
        <div class="text-danger">
            @error('nama_siswa')
                {{ $message }}
            @enderror
        </div>
    </div>
    <div class="form-group">
        <label for="kelas">Kelas</label>
        <select class="form-control" id="kelas" name="id_kelas">
          <option value="1">X-TKJ</option>
          <option value="2">XI-TKJ</option>
          <option value="3">XII-TKJ</option>
          <option value="4">X-RPL</option>
          <option value="5">XI-RPL</option>
          <option value="6">XII-RPL</option>
        </select>
    </div>
    <div class="form-group col-6">
        <label for="foto_siswa">Upload Foto</label><br>
        <input name="foto_siswa" type="file"  value=" {{old('foto_siswa')}}" class="form-control-file" id="foto_siswa">
        <div class=" text-danger">
            @error('foto_siswa')
                {{ $message }}
            @enderror
        </div>
    </div>
    <div class="form-group">
        <button class="btn btn-primary">Simpan</button>
    </div>
</form>

@endsection