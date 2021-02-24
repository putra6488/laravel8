@extends('layouts.v_templates')
@section('title', 'Tambah Guru')

@section('content')
<form action="/guru/insert" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group col-6">
      <label for="nip">NIP</label>
      <input name="nip" class="form-control" value=" {{old('nip')}} "  id="nip" placeholder="NIP">
      <div class=" text-danger">
        @error('nip')
            {{ $message }}
        @enderror
      </div>
    </div>
    <div class="form-group col-6">
        <label for="nama_guru">Nama</label>
        <input name="nama_guru" class="form-control" value=" {{old('nama_guru')}} " id="nama_guru" placeholder="Nama">
        <div class="text-danger">
            @error('nama_guru')
                {{ $message }}
            @enderror
        </div>
    </div>
    <div class="form-group col-6">
        <label for="mapel">Mapel</label>
        <input name="mapel" class="form-control"  value=" {{old('mapel')}}" id="mapel" placeholder="mapel">
        <div class=" text-danger">
            @error('mapel')
                {{ $message }}
            @enderror
        </div>
    </div>
    <div class="form-group col-6">
        <label for="foto_guru">Upload Foto</label><br>
        <input name="foto_guru" type="file"  value=" {{old('foto_guru')}}" class="form-control-file" id="foto_guru">
        <div class=" text-danger">
            @error('foto_guru')
                {{ $message }}
            @enderror
        </div>
    </div>
    <div class="form-group">
        <button class="btn btn-primary">Simpan</button>
    </div>
</form>

@endsection