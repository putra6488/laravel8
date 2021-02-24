@extends('layouts.v_templates')
@section('title', 'Edit Guru')

@section('content')
    <h1>Halaman Edit</h1>
    <form action="/guru/update/{{$guru->id_guru}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group col-6">
          <label for="nip">NIP</label>
          <input name="nip" class="form-control" value=" {{$guru->nip}} " readonly  id="nip" placeholder="NIP">
          <div class=" text-danger">
            @error('nip')
                {{ $message }}
            @enderror
          </div>
        </div>
        <div class="form-group col-6">
            <label for="nama_guru">Nama</label>
            <input name="nama_guru" class="form-control" value=" {{$guru->nama_guru}} " id="nama_guru" placeholder="Nama">
            <div class="text-danger">
                @error('nama_guru')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="form-group col-6">
            <label for="mapel">Mapel</label>
            <input name="mapel" class="form-control"  value=" {{$guru->mapel}}" id="mapel" placeholder="mapel">
            <div class=" text-danger">
                @error('mapel')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="col-sm-12">
            <div class="col-sm-6">
                <div class="form-group col-6">
                    <label for="foto_guru">Ganti Foto</label><br>
                    <input name="foto_guru" type="file"  value=" {{$guru->foto_guru}}" class="form-control-file" id="foto_guru">
                    <div class=" text-danger">
                        @error('foto_guru')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 mb-4">
            <img src=" {{url('foto/'.$guru->foto_guru)}} " width="300px" >
        </div>
        <div class="form-group">
            <button class="btn btn-primary">Simpan</button>
        </div>
    </form>
@endsection