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
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#">
                <i class="nav-icon fas fa-print"></i> Export
            </button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="table-responsive">
                    <table id="myTable" class="table table-bordered table-hover" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Aktivitas</th>
                            <th>Waktu</th>
                            <th>Durasi</th>
                            <th>Unit</th>
                        </tr>
                    </thead>
                    <tbody>
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
// Kalo mau make tempus dominus js
// $(function () {
//     $('#datetimepicker3').datetimepicker({
//         format: 'LT'
//     });
// });

//tambahin document ready function
$(document).ready(function(){
    dTable = $('#myTable').DataTable({
        // columnDefs: [
        //     { width: '12.5%', targets:1},
        //     { width: '12.5%', targets:2},
        //     { width: '12%', targets:4}
        // ],
        buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
        // order: [[2,'asc']],
        responsive: true,
        processing: true,
        "language": {
            "processing": "<img style='width:150px;' src='{{asset('img/loader-transparent.gif')}}' />" //add a loading image,simply putting <img src="loader.gif" /> tag.
        },
        serverSide: true,
        ajax: "{{ route('aktivitas.keg_get')}}",
        columns: [
            // { data: 'IdType', name: 'IdType' },
            {
                data: 'act_id',
                name: 'act_id'
            },
            {
                data: 'act_nama',
                name: 'act_nama'
            },
            {
                data: 'act_waktu',
                name: 'act_waktu'
            },
            {
                data: 'act_durasi',
                name: 'act_durasi'
            },
            
            {
                data: 'act_unit',
                name: 'act_unit'
            },
            // {
            //     data: 'role_id',
            //     render: function(data, type, row){
            //         if(row.role_id == 1) {
            //             return 'Admin';
            //         }else if(row.role_id == 2){
            //             return 'Validator';
            //         }else if(row.role_id == 3){
            //             return 'Pegawai';
            //         }
            //     }
            // },
            // {
            //     data: 'role_id',
            //     name: 'role_id'
            // },
            ]
    });
});


 


// $(function () {

//     //Date picker
//     $('#reservationdate').datetimepicker({
//         format: 'L'
//     });

// });
</script>

@endsection

