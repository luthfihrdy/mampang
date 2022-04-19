@if(empty($data->count()))
    <script>window.location = "{{ route('validator.skpvalidasi') }}";</script>
    <?php exit; ?>
@endif

@extends('layouts.app')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Validasi</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">SKP Tahunan</li>
            <li class="breadcrumb-item active">Validasi</li>
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
                <h3 class="card-title">Validasi</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="tbl_waiting" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th style="width: 100px;">Timestamp</th>
                      <th>Tahun</th>
                      <th>Kegiatan</th>
                      <th>Target</th>
                      <th style="width: 20px;">Status</th>
                      <th style="width: 100px;">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $d)
                        <tr>
                            <td>{{substr($d->created_at,0,10)}}</td>
                            <td>{{$d->skp_tahun}}</td>
                            <td>{{$d->getAct->act_nama}}</td>
                            <td>{{$d->skp_target.' '.$d->getAct->act_unit}}</td>
                            <td><button type="button" class="btn btn-warning btn-sm text-white" title="Waiting"><i class="fa fa-hourglass"></i></button></td>
                            <td>
                                <button type="button" class="btn btn-success btn-sm" title="approve" onclick="buttonApprove('{{$d->id}}','approve')"><i class="fa fa-check"></i></button>
                                <button type="button" class="btn btn-danger btn-sm" title="reject" onclick="buttonReject('{{$d->id}}','reject')"><i class="fa fa-ban"></i></button>
                            </td>
                        </tr>
                        @endforeach
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

@endsection

@section('script')

<script>

    function buttonApprove(id,status) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $("input[name='_token']").val()
            }
        });
        // let token = $('meta[name="csrf-token"]').attr('content');
        let _url = `/validator/skpvalidasi/detail/validasi/${id}/${status}`;

        $.ajax({
            type: 'POST',
            url: _url,
            data: {
                id: id,
                status: status,
            },
            success: function (resp) {
                if (resp.success) {
                    swal.fire("Done!", resp.message, "success");
                    setInterval(function () {
                        window.location.reload();
                    }, 1500)
                } else {
                    swal.fire("Error!", 'Something went wrong.', "error");
                }
            },
            error: function (resp) {
                swal.fire("Error!", 'Something went wrong.', "error");
            }
        });
    }

    function buttonReject(id,status) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $("input[name='_token']").val()
            }
        });
        // let token = $('meta[name="csrf-token"]').attr('content');
        let _url = `/validator/skpvalidasi/detail/validasi/${id}/${status}`;

        $.ajax({
            type: 'POST',
            url: _url,
            data: {
                id: id,
                status: status,
            },
            success: function (resp) {
                if (resp.success) {
                    swal.fire("Done!", resp.message, "success");
                    setInterval(function () {
                        window.location.reload();
                    }, 1500)
                } else {
                    swal.fire("Error!", 'Something went wrong.', "error");
                }
            },
            error: function (resp) {
                swal.fire("Error!", 'Something went wrong.', "error");
            }
        });
    }

// bTable = $("#tbl_waiting").DataTable({
//       "responsive": true, "lengthChange": false, "autoWidth": false,
//       "dom": 'Brftip',
//       "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
//       "responsive": true,
//       "processing": true,
//       "language": {
//           "processing": "<img style='width:150px;' src='{{asset('img/loader-transparent.gif')}}' />" //add a loading image,simply putting <img src="loader.gif" /> tag.
//       },
//       "serverSide": true,
//       "type": "GET",
//       "ajax": "{{ route('validator.kegiatan_get',['status'=>1])}}",
//       "columns": [
//         {
//             data: 'keg_date',
//             name: 'keg_date'
//         },
//         {
//             data: 'get_user',
//             render: function(data, type, row, meta){
//                 if(data == null){
//                         return null;
//                     }else{
//                         return data.name;
//                 }
//             }
//         },
//         {
//             data: 'get_act',
//             render: function(data, type, row, meta){
//                 if(data == null){
//                         return null;
//                     }else{
//                         return data.act_nama;
//                 }
//             }
//         },
//         {
//           data: 'keg_notes',
//           name: 'keg_notes'
//         },
//         {
//           data: 'keg_jammulai',
//           name: 'keg_jammulai'
//         },
//         {
//           data: 'keg_jamselesai',
//           name: 'keg_jamselesai'
//         },
//         {
//           data: 'keg_volume',
//           name: 'keg_volume'
//         },
//         {
//           data: 'totalunit',
//           name: 'totalunit'
//         },
//         {
//           data: 'cacode',
//           name: 'cacode'
//         },
//         {
//           data: 'id',
//           render: function(data, row, type) {
//             return '<td><button type="button" class="btn btn-warning btn-sm text-white" title="Waiting"><i class="fa fa-hourglass"></i></button></td>';
//           }
//         },
//         {
//           data: 'id',
//           render: function(data, row, type) {
//             let buttonApprove = '<button type="button" class="btn btn-success btn-sm" title="approve"><i class="fa fa-check"></i></button>';
//             let buttonReject = '<button type="button" class="btn btn-danger btn-sm ml-2" title="reject"><i class="fa fa-ban"></i></button>';
//             return buttonApprove + buttonReject;
//           }
//         }
//       ],
//       columnDefs:[
//         {
//             "targets" : 4,
//             "render" : function(data,type,row) {
//                 var awal = data.substring(0,5);
//                 var selesai = row.keg_jamselesai.substring(0,5);
//                 return awal +' - '+ selesai;
//             },
//         }, //GABUNGING ROW JAM MULAI DAN SELESAI
//         {
//           "targets" : 7,
//           "render" : function(data, type, row, meta){
//             return data + ' ' + row.get_act.act_unit;
//           }
//         },
//         {
//           "visible": false, "targets": [ 5 ]
//         },
//       ]
      
//     }).buttons().container().appendTo('#tbl_waiting_wrapper .col-md-6:eq(0)');

</script>

@endsection


