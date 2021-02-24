<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Print to Printer</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 4 -->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('templates/')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('templates/')}}/dist/css/adminlte.min.css">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-12">
        <h2 class="page-header">
          <i class="fas fa-globe"></i> SMK SUKA SUKA SAYA
          <small class="float-right">@php
              $tgl = date('l, d-m-Y');
              echo $tgl
          @endphp</small>
        </h2>
        <h3 class="text-center font-weight-bold">Daftar Siswa</h3>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    
    <!-- /.row -->

    <!-- Table row -->
    <div class="row mt-4">
      <div class="col-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
            <th>NO</th>
            <th>NIS</th>
            <th>Nama Siswa</th>
            <th>Kelas</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($siswa as $data)
            <?php $no = 1; ?>
            <tr>
              <td> {{$no++}} </td>
              <td> {{$data->nis}} </td>
              <td>{{$data->nama_siswa}}</td>
              <td>{{$data->kelas}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->

{{-- <script type="text/javascript"> 
  window.addEventListener("load", window.print());
</script> --}}
</body>
</html>
