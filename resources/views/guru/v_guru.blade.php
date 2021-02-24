@extends('layouts.v_templates')
@section('title', 'GURU')

@section('content')
    <h1>Halaman Guru</h1>
    @if (session('pesan'))
      <div class="alert alert-success" role="alert">
        {{session('pesan')}}
      </div>
    @endif
    <a href="/guru/add" class="btn btn-primary">Tambah Guru</a>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">NIP</th>
            <th scope="col">Nama Guru</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            <?php $no = 1 ?>
            @foreach ($guru as $data)
            <tr>
                <th scope="row">{{$no++}}</th>
                <td> {{$data->nip}} </td>
                <td> {{$data->nama_guru}} </td>
                <td> 
                    <a href="/guru/detail/{{$data->id_guru}}" class="btn btn-success">Detail</a> 
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>
@endsection