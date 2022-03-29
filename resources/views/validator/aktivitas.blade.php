@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
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
            {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">
                <b>+</b> Tambah Kegiatan
            </button> --}}
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="myTable" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Pegawai</th>
                            <th>Tanggal</th>
                            <th>Jam Mulai</th>
                            <th>Jam Selesai</th>
                            <th>Kegiatan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
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

$(document).ready(function(){

    dTable = $('#myTable').DataTable({
        columnDefs: [
            { width: '12%', targets:1},
            { width: '5%', targets:2},
            { width: '5%', targets:3},
            { width: '40%', targets:4}
        ],
        // order: [[2,'asc']],
        responsive: true,
        processing: true,
        "language": {
            "processing": "<img style='width:150px;' src='{{asset('img/loader-transparent.gif')}}' />" //add a loading image,simply putting <img src="loader.gif" /> tag.
        },
        serverSide: true,
        ajax: "{{ route('validator.aktivitas_get')}}",
        columns: [
            // { data: 'IdType', name: 'IdType' },
            {
                data: 'get_user',
                render: function(data, type, row, meta){
                    if(data == null){
                            return null;
                        }else{
                            return data.name;
                    }
                }
            },
            {
                data: 'tanggal_kegiatan',
                name: 'tanggal_kegiatan'
            },
            {
                data: 'jam_awal',
                name: 'jam_awal'
            },
            {
                data: 'jam_akhir',
                name: 'jam_akhir'
            },
            {
                data: 'kegiatan',
                name: 'kegiatan'
            },
            // {
            //     data: 'point_menit',
            //     name: 'point_menit'
            // },
            {
                data: 'status',
                render: function(data, type, row) {
                    if(row.status == 'Waiting') {
                        return '<span class="badge badge-warning">' + data + '</span>'
                    }else if(row.status == 'Approved') {
                        return '<span class="badge badge-success">' + data + '</span>'
                    }else if(row.status == 'Rejected') {
                        return '<span class="badge badge-danger">' + data + '</span>'
                    }
                }
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
            {
                data: 'id',
                //name: 'id'
                render: function (data, type, row) {
                    if(row.status == 'Approved' || row.status == 'Rejected') {
                        let buttonApprove = '<button type="button" class="ml-2 btn btn-success btn-sm disabled" onclick="buttonApprove(\'' + data + '\')"><i class="fas fa-check"></i></button>'
                        let buttonReject = '<button type="button" class="ml-2 btn btn-danger btn-sm disabled" onclick="buttonReject(\'' + data + '\')"><i class="fa fa-times"></i></button>'
                        return buttonApprove + buttonReject;
                    }
                    if(row.status == 'Waiting') {
                        let buttonApprove = '<button type="button" class="ml-2 btn btn-success btn-sm" onclick="buttonApprove(\'' + data + '\')"><i class="fas fa-check"></i></button>'
                        let buttonReject = '<button type="button" class="ml-2 btn btn-danger btn-sm" onclick="buttonReject(\'' + data + '\')"><i class="fa fa-times"></i></button>'
                        return buttonApprove + buttonReject;
                    }//let buttonApprove = '<button href="#" class="text-success ml-2 disabled" onclick="buttonApprove(\'' + data + '\')"><i class="fas fa-check"></i></button>';
                    //return buttonApprove + buttonReject;
                }
            }
            ]
    });

});

function buttonApprove(ids) {
        swal.fire({
            title: "Approve?",
            icon: 'question',
            text: "Apakah anda yakin ingin mengkonfirmasi data?",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Ya Konfirmasi!",
            cancelButtonText: "Batal",
            reverseButtons: !0,
        }).then(function (e) {

            if (e.value === true) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $("input[name='_token']").val()
                    }
                });
                // let token = $('meta[name="csrf-token"]').attr('content');
                
                let _url = `/validator/aktivitas/approve/${ids}`;

                $.ajax({
                    type: 'POST',
                    url: _url,
                    data: {ids: ids},
                    success: function (resp) {
                        if (resp.success) {
                            swal.fire("Done!", resp.message, "success");
                            dTable.ajax.reload();
                        } else {
                            swal.fire("Error!", 'Something went wrong.', "error");
                        }
                    },
                    error: function (resp) {
                        swal.fire("Error!", 'Something went wrong.', "error");
                    }
                });

            } else {
                e.dismiss;
            }

        }, function (dismiss) {
            return false;
        })
    }

    function buttonReject(ids) {
        swal.fire({
            title: "Tolak?",
            icon: 'question',
            text: "Apakah anda yakin ingin Menolak data?",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Ya Tolak!",
            cancelButtonText: "Batal",
            reverseButtons: !0,
        }).then(function (e) {

            if (e.value === true) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $("input[name='_token']").val()
                    }
                });
                // let token = $('meta[name="csrf-token"]').attr('content');
                let _url = `/validator/aktivitas/reject/${ids}`;

                $.ajax({
                    type: 'POST',
                    url: _url,
                    data: {ids: ids},
                    success: function (resp) {
                        if (resp.success) {
                            swal.fire("Done!", resp.message, "success");
                            dTable.ajax.reload();
                        } else {
                            swal.fire("Error!", 'Something went wrong.', "error");
                        }
                    },
                    error: function (resp) {
                        swal.fire("Error!", 'Something went wrong.', "error");
                    }
                });

            } else {
                e.dismiss;
            }

        }, function (dismiss) {
            return false;
        })
    }

</script>

@endsection


