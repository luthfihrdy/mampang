@extends('layouts.app')

@section('content')
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

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Aktivitas</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Home</li>
            <li class="breadcrumb-item active">Aktivitas</li>
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
                <h3 class="card-title">Aktivitas</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="width: 10px;">No.</th>
                    <th style="width: 100px;">Bulan</th>
                    <th>Nama</th>
                    <th>Fasyankes</th>
                    <th>Unit</th>
                    <th style="width: 50px;">Sudah divalidasi</th>
                    <th style="width: 50px;">Belum divalidasi</th>
                    <th style="width: 50px;">Aktivitas ditolak</th>
                    <th>Target</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>1</td>
                    <td>Januari 2021</td>
                    <td>Benazheer Salsabila</td>
                    <td>PKC Mampang Prapatan</td>
                    <td>Management</td>
                    <td><button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-xl">10</button></td>
                    <td><button type="button" class="btn btn-warning text-white btn-sm" data-toggle="modal" data-target="#modal-belum">2</button></td>
                    <td><button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-tolak">1</button></td>
                    <td class="text-warning">120/1300</td>
                  </tr>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No.</th>
                    <th>Bulan</th>
                    <th>Nama</th>
                    <th>Fasyankes</th>
                    <th>Unit</th>
                    <th>Sudah divalidasi</th>
                    <th>Belum divalidasi</th>
                    <th>Aktivitas ditolak</th>
                    <th>Target</th>
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

      <!-- /.modal belum acc -->

      <div class="modal fade" id="modal-belum">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Aktivitas Nama</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="width: 100px;">Timestamp</th>
                    <th>Nama</th>
                    <th>Kegiatan</th>
                    <th>Uraian</th>
                    <th>Waktu</th>
                    <th>Durasi</th>
                    <th>Vol</th>
                    <th>Hasil</th>
                    <th>Jenis Aktivitas</th>
                    <th style="width: 20px;">Status</th>
                    <th style="width: 100px;">Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>12/03/2022</td>
                    <td>Januari 2021</td>
                    <td>Ngoding</td>
                    <td>152 menit</td>
                    <td>12/03/2022</td>
                    <td>Januari 2021</td>
                    <td>Ngoding</td>
                    <td>152 menit</td>
                    <td>152 menit</td>
                    <td><button type="button" class="btn btn-warning btn-sm text-white" title="Waiting"><i class="fa fa-hourglass"></button></td>
                    <td><button type="button" class="btn btn-success btn-sm" title="approve"><i class="fa fa-check"></i></button>
                    <button type="button" class="btn btn-danger btn-sm" title="reject"><i class="fa fa-ban"></i></button></td>
                  </tr>
                  <tr>
                    <tr>
                    <td>13/03/2022</td>
                    <td>Januari 2021</td>
                    <td>Ngoding</td>
                    <td>152 menit</td>
                    <td>12/03/2022</td>
                    <td>Januari 2021</td>
                    <td>Ngoding</td>
                    <td>152 menit</td>
                    <td>152 menit</td>
                    <td><button type="button" class="btn btn-warning btn-sm text-white" title="Waiting"><i class="fa fa-hourglass"></button></td>
                    <td><button type="button" class="btn btn-success btn-sm" title="approve"><i class="fa fa-check"></i></button>
                    <button type="button" class="btn btn-danger btn-sm" title="reject"><i class="fa fa-ban"></i></button></td>
                  </tr>
                 <tr>
                    <td>14/03/2022</td>
                    <td>Januari 2021</td>
                    <td>Ngoding</td>
                    <td>152 menit</td>
                    <td>12/03/2022</td>
                    <td>Januari 2021</td>
                    <td>Ngoding</td>
                    <td>152 menit</td>
                    <td>152 menit</td>
                    <td><button type="button" class="btn btn-warning btn-sm text-white" title="Waiting"><i class="fa fa-hourglass"></i></button></td>
                    <td><button type="button" class="btn btn-success btn-sm" title="approve"><i class="fa fa-check"></i></button>
                    <button type="button" class="btn btn-danger btn-sm" title="reject"><i class="fa fa-ban"></i></button></td>
                  </tr>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Timestamp</th>
                    <th>Nama</th>
                    <th>Kegiatan</th>
                    <th>Uraian</th>
                    <th>Waktu</th>
                    <th>Durasi</th>
                    <th>Vol</th>
                    <th>Hasil</th>
                    <th>Jenis Aktivitas</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                  </tfoot>
                </table>
              
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <!-- /.modal tolak -->

      <div class="modal fade" id="modal-tolak">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Aktivitas Nama</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="width: 100px;">Timestamp</th>
                    <th>Nama</th>
                    <th>Kegiatan</th>
                    <th>Uraian</th>
                    <th>Waktu</th>
                    <th>Durasi</th>
                    <th>Vol</th>
                    <th>Hasil</th>
                    <th>Jenis Aktivitas</th>
                    <th style="width: 20px;">Status</th>
                    <th>Validator</th>
                    <th style="width: 100px;">Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                   <tr>
                    <td>12/03/2022</td>
                    <td>Januari 2021</td>
                    <td>Ngoding</td>
                    <td>152 menit</td>
                    <td>12/03/2022</td>
                    <td>Januari 2021</td>
                    <td>Ngoding</td>
                    <td>152 menit</td>
                    <td>152 menit</td>
                    <td><button type="button" class="btn btn-danger btn-sm" title="Rejected"><i class="fa fa-ban"></button></td>
                    <td>Benazheer</td>
                    <td><button type="button" class="btn btn-danger btn-sm" title="Delete"><i class="fa fa-trash"></i></button></td>
                  </tr>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Timestamp</th>
                    <th>Nama</th>
                    <th>Kegiatan</th>
                    <th>Uraian</th>
                    <th>Waktu</th>
                    <th>Durasi</th>
                    <th>Vol</th>
                    <th>Hasil</th>
                    <th>Jenis Aktivitas</th>
                    <th>Status</th>
                    <th>Validator</th>
                    <th>Aksi</th>
                  </tr>
                  </tfoot>
                </table>
              
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <!-- /.modal di acc -->

      <div class="modal fade" id="modal-xl">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Aktivitas Nama</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="width: 100px;">Timestamp</th>
                    <th>Nama</th>
                    <th>Kegiatan</th>
                    <th>Uraian</th>
                    <th>Waktu</th>
                    <th>Durasi</th>
                    <th>Vol</th>
                    <th>Hasil</th>
                    <th>Jenis Aktivitas</th>
                    <th style="width: 20px;">Status</th>
                    <th>Validator</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>14/03/2022</td>
                    <td>Januari 2021</td>
                    <td>Ngoding</td>
                    <td>152 menit</td>
                    <td>12/03/2022</td>
                    <td>Januari 2021</td>
                    <td>Ngoding</td>
                    <td>152 menit</td>
                    <td>152 menit</td>
                    <td><button type="button" class="btn btn-success btn-sm" title="Verified"><i class="fa fa-thumbs-up"></button></td>
                    <td>Benazheer</td>
                </tr>
                <tr>
                    <td>14/03/2022</td>
                    <td>Januari 2021</td>
                    <td>Ngoding</td>
                    <td>152 menit</td>
                    <td>12/03/2022</td>
                    <td>Januari 2021</td>
                    <td>Ngoding</td>
                    <td>152 menit</td>
                    <td>152 menit</td>
                    <td><button type="button" class="btn btn-success btn-sm" title="Verified"><i class="fa fa-thumbs-up"></button></td>
                    <td>Benazheer</td>
                </tr>
                <tr>
                    <td>14/03/2022</td>
                    <td>Januari 2021</td>
                    <td>Ngoding</td>
                    <td>152 menit</td>
                    <td>12/03/2022</td>
                    <td>Januari 2021</td>
                    <td>Ngoding</td>
                    <td>152 menit</td>
                    <td>152 menit</td>
                    <td><button type="button" class="btn btn-success btn-sm" title="Verified"><i class="fa fa-thumbs-up"></button></td>
                    <td>Benazheer</td>
                </tr>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Timestamp</th>
                    <th>Nama</th>
                    <th>Kegiatan</th>
                    <th>Uraian</th>
                    <th>Waktu</th>
                    <th>Durasi</th>
                    <th>Vol</th>
                    <th>Hasil</th>
                    <th>Jenis Aktivitas</th>
                    <th>Validator</th>
                    <th>Status</th>
                  </tr>
                  </tfoot>
                </table>
              
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

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
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>

@endsection


