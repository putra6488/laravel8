@extends('layouts.v_templates')
@section('title', 'Detail Guru')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card" style="width: 18rem;">
                <img src=" {{url('foto/'.$guru->foto_guru)}} " class="card-img-top" alt="{{url('foto_guru/'.$guru->foto_guru)}}">
            </div>
        </div>
        <div class="col">
            <div class="card" style="width: 18rem;">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item"> <b>NIP   : </b>{{$guru->nip}} </li>
                  <li class="list-group-item"> <b>Nama  : </b>{{$guru->nama_guru}} </li>
                  <li class="list-group-item"> <b>Mapel : </b>{{$guru->mapel}} </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <a href="/guru" class="btn btn-primary mr-3 ml-3">Back</a>
        <a href="/guru/edit/{{$guru->id_guru}}" class="btn btn-success mr-3">Edit</a> 
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$guru->id_guru}}">
            Delete
        </button>
    </div>

    {{-- @foreach ($guru as $data) --}}
    <div class="modal fade" id="delete{{$guru->id_guru}}">
        <div class="modal-dialog modal-sm">
            <div class="modal-content bg-danger">
                <div class="modal-header">
                    <h4 class="modal-title">{{$guru->nama_guru}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Anda Yakin Ingin Menghapus ?</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                    <a href="/guru/delete/{{$guru->id_guru}}" class="btn btn-outline-light">Delete</a>
                </div>
            </div>
        </div>
    </div>
    {{-- @endforeach --}}
@endsection