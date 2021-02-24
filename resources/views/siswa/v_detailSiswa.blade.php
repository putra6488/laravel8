@extends('layouts.v_templates')
@section('title', 'Detail Siswa')

@section('content')

<div class="row">
    {{-- @foreach ($siswa as $data)     --}}
    <div class="col">
            <div class="card" style="width: 18rem;">
                <img src=" {{url('foto_siswa/'.$siswa->foto_siswa)}} " class="card-img-top" alt="{{url('foto_siswa/'.$siswa->foto_siswa)}}">
            </div>
        </div>
        <div class="col">
            <div class="card" style="width: 18rem;">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"> <b>NIS   : </b>{{$siswa->nis}} </li>
                    <li class="list-group-item"> <b>Nama  : </b>{{$siswa->nama_siswa}} </li>
                    <li class="list-group-item"> <b>Kelas : </b>{{$siswa->kelas}} </li>
                    <li class="list-group-item"> <b>Mapel : </b>{{$siswa->mapel}} </li>
                </ul>
            </div>
        </div>
    </div>
    {{-- @endforeach --}}
    <div class="row mt-5">
        <a href="/siswa" class="btn btn-primary mr-3 ml-3">Back</a>
        <a href="/siswa/edit/{{$siswa->id_siswa}}" class="btn btn-success mr-3">Edit</a> 
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$siswa->id_siswa}}">
            Delete
        </button>
    </div>

    {{-- @foreach ($siswa as $data) --}}
    <div class="modal fade" id="delete{{$siswa->id_siswa}}">
        <div class="modal-dialog modal-sm">
            <div class="modal-content bg-danger">
                <div class="modal-header">
                    <h4 class="modal-title">{{$siswa->nama_siswa}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Anda Yakin Ingin Menghapus ?</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                    <a href="/siswa/delete/{{$siswa->id_siswa}}" class="btn btn-outline-light">Delete</a>
                </div>
            </div>
        </div>
    </div>
    {{-- @endforeach --}}
@endsection