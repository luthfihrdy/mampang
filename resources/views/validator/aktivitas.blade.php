@extends('layouts.app')

@section('content')

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
                    <th>Total Target</th>
                  </tr>
                  </thead>
                  <tbody>
                  {{-- <tr>
                    <td>1</td>
                    <td>Januari 2021</td>
                    <td>Benazheer Salsabila</td>
                    <td>PKC Mampang Prapatan</td>
                    <td>Management</td>
                    <td><button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-xl">10</button></td>
                    <td><button type="button" class="btn btn-warning text-white btn-sm" data-toggle="modal" data-target="#modal-belum">2</button></td>
                    <td><button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-tolak">1</button></td>
                    <td class="text-warning">120/1300</td>
                  </tr> --}}
                  </tbody>
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
            <table id="tbl_waiting" class="table table-bordered table-striped">
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
                 {{-- <tr>
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
                  </tr> --}}
                  </tbody>
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
            <table id="example3" class="table table-bordered table-striped">
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
                    <td>1</td>
                    <td>152 menit</td>
                    <td><button type="button" class="btn btn-danger btn-sm" title="Rejected"><i class="fa fa-ban"></button></td>
                    <td>Benazheer</td>
                    <td><button type="button" class="btn btn-danger btn-sm" title="Delete"><i class="fa fa-trash"></i></button></td>
                  </tr>
                  </tbody>
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
            <table id="example4" class="table table-bordered table-striped">
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

<script>

var bTable;

function table_reload(id){
    //console.log(id);
    bTable.ajax.url("{{ route('validator.kegiatan_get') }}?id="+id).load();
}

$(document).ready(function(){

  dTable = $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "dom": 'Brftip',
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
      "responsive": true,
      "processing": true,
      "language": {
          "processing": "<img style='width:150px;' src='{{asset('img/loader-transparent.gif')}}' />" //add a loading image,simply putting <img src="loader.gif" /> tag.
      },
      "serverSide": true,
      "ajax": "{{ route('validator.aktivitas_get')}}",
      "columns": [
        {  
          data: 'id',
          render: function (data, type, row, meta) {
              return meta.row + meta.settings._iDisplayStart + 1;
          }
        },
        {
          data: 'bulan',
          name: 'bulan',
        },
        {
          data: 'name',
          name: 'name',
        },
        {
          data: 'id',
          render:function(data, type, row, meta){
            return 'null';
          }
        },
        {
          data: 'id',
          render:function(data, type, row, meta){
            return 'null';
          }
        },
        {
          data: 'approved',
          render: function(data, type, row, meta) {
            return '<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-xl">'+data+'</button>'
          }
        },
        {
          data: 'waiting',
          render: function(data, type, row, meta) {
            // return '<a href="route(\''" type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-belum" onclick="table_reload(\'' + row.id + '\')">'+data+'</a>'
            let jomo = row.id;
            return '<a href="/validator/aktivitas/detail/?users_id='+row.users_id+'&get_date='+row.keg_date+'&status=1" type="button" class="btn btn-warning btn-sm">'+data+'</a>'
          }
        },
        {
          data: 'rejected',
          render: function(data, type, row, meta) {
            return '<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-xl">'+data+'</button>'
          }
        },
        {
          data: 'total',
          name: 'total'
        },
        {
          data: 'tahun',
          render: function(data, type, row) {
            return data;
          }
        }
      ],
      columnDefs:[
        {
          "targets": 8,
          "render": function(data, type, row){
            if(data == null){
              data = 0
            }

            let target = '<span id="place_target"></span>'

            return data + '/' + row.tahun;
          }
        },
        // {
        //   "visible" : false, "targets": 9
        // }
        
      ]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    

  rTable = $("#example3").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "dom": 'Brftip',
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');

  aTable = $("#example4").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "dom": 'Brftip',
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
  }).buttons().container().appendTo('#example4_wrapper .col-md-6:eq(0)');

});

function table_reload() {
  
}




</script>

@endsection


