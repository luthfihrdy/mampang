@extends('layouts.app')


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
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
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


