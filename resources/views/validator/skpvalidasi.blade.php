@extends('layouts.app')

<head>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/buttons.bootstrap4.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('css/adminlte.min.css')}}">
</head>

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">SKP Tahunan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Home</li>
            <li class="breadcrumb-item active">SKP Tahunan</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
<div class="container-fluid">
    <!-- /.row -->
    <!-- Main row -->
    <div class="row">
    
    <div class="col-12">
        <div class="card">
            <div class="card-header">
            {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">
                <b>+</b> Tambah Kegiatan
            </button> --}}
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="card">
              <div class="card-header">
                <h3 class="card-title">SKP</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="width: 10px;">No.</th>
                    <th style="width: 20px;">Tahun</th>
                    <th>Nama</th>
                    <th>Fasyankes</th>
                    <th>Unit</th>
                    <th style="width: 50px;">Sudah divalidasi</th>
                    <th style="width: 50px;">Belum divalidasi</th>
                    <th style="width: 50px;">SKP ditolak</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>1</td>
                    <td>2021</td>
                    <td>Benazheer Salsabila</td>
                    <td>PKC Mampang Prapatan</td>
                    <td>Management</td>
                    <td><button type="button" class="btn btn-success btn-sm">10</button></td>
                    <td><button type="button" class="btn btn-secondary btn-sm">2</button></td>
                    <td><button type="button" class="btn btn-danger btn-sm">1</button></td>
                  </tr>
                  <tr>
                    <td>1</td>
                    <td>2021</td>
                    <td>test 1</td>
                    <td>PKC Mampang Prapatan</td>
                    <td>Management</td>
                    <td><button type="button" class="btn btn-success btn-sm">1</button></td>
                    <td><button type="button" class="btn btn-secondary btn-sm">12</button></td>
                    <td><button type="button" class="btn btn-danger btn-sm">2</button></td>
                  </tr>
                  <tr>
                    <td>1</td>
                    <td>2021</td>
                    <td>test2</td>
                    <td>PKC Mampang Prapatan</td>
                    <td>Management</td>
                    <td><button type="button" class="btn btn-success btn-sm">1</button></td>
                    <td><button type="button" class="btn btn-secondary btn-sm">12</button></td>
                    <td><button type="button" class="btn btn-danger btn-sm">2</button></td>
                  </tr>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No.</th>
                    <th>Tahun</th>
                    <th>Nama</th>
                    <th>Fasyankes</th>
                    <th>Unit</th>
                    <th>Sudah divalidasi</th>
                    <th>Belum divalidasi</th>
                    <th>SKP ditolak</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        </div>

    </div>
    <!-- /.row (main row) -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection

@section('script')
<!-- jQuery -->
<script src="{{asset('jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/djs/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatabljs/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatabljs/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatabljs/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('plugins/datatabljs/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('plugins/datatabljs/buttons.html5.min.js')}}"></script>
<script src="{{asset('plugins/datatabljs/buttons.print.min.js')}}"></script>
<script src="{{asset('plugins/datatabljs/buttons.colVis.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('js/demo.js')}}"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

@endsection


