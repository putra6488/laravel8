@extends('layouts.v_templates')
@section('title', 'SISWA')

@section('content')
<h1>Halaman Siswa</h1>
  <a href="/siswa/printpdf" target="_blank" class="btn btn-danger mr-4">Print to PDF</a>
  <a href="/siswa/print" target="_blank" class="btn btn-warning mr-4">Print to Printer</a>
    @if (session('pesan'))
      <div class="alert alert-success mt-3" role="alert">
        {{session('pesan')}}
      </div>
    @endif
    <a href="/siswa/add" class="btn btn-primary">Tambah Siswa</a>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">NIS</th>
            <th scope="col">Nama Siswa</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            <?php $no = 1 ?>
            @foreach ($siswa as $data)
            <tr>
                <th scope="row">{{$no++}}</th>
                <td> {{$data->nis}} </td>
                <td> {{$data->nama_siswa}} </td>
                <td> 
                    <a href="/siswa/detail/{{$data->id_siswa}}" class="btn btn-success">Detail</a> 
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>
@endsection