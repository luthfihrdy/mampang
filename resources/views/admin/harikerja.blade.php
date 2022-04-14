@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Hari Kerja</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
            <li class="breadcrumb-item active">Hari Kerja</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
<div class="container-fluid">
    <!-- Main row -->
    <div class="row">
    
    <div class="col-12">
        <div class="card">
            <div class="card-header">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">
                <b>+</b> Tambah Hari Kerja
            </button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <table id="myTable" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tahun</th>
                        <th>Bulan</th>
                        <th>Hari Kerja</th>
                        <th>Aksi</th>
                    </tr>

                </thead>
                <tbody>
                    {{-- <tr>
                        <td>1.</td>
                        <td>2022</td>
                        <td>Februari</td>
                        <td>26</td>
                        <td><button type="button" data-toggle="modal" data-target="#modal-edit" class="btn btn-warning text-white btn-sm" title="edit"><i class="fa fa-pen"></i></button>
                        <button type="button" class="btn btn-danger btn-sm" title="delete"><i class="fa fa-trash"></i></button></td>
                    </tr> --}}
                </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        </div>

    </div>
    
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->

<!-- Modal Insert -->
<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Input Hari</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="" id="form-create">
                @csrf
                    <div class="input-group mb-1">
                        <label>Tahun</label>
                        <div class="input-group mb-3 ">
                            <select class="custom-select form-control" id="date-dropdown" name="tahun">
                            </select>
                        </div>
                    </div>
                    <div class="input-group mb-1">
                        <label>Bulan</label>
                        <div class="input-group mb-1">
                            <select class="custom-select form-control" placeholder="Bulan" name="bulan">
                                <option value="January">Januari</option>
                                <option value="February">Februari</option>
                                <option value="March">Maret</option>
                                <option value="April">April</option>
                                <option value="May">Mei</option>
                                <option value="June">Juni</option>
                                <option value="July">Juli</option>
                                <option value="August">Agustus</option>
                                <option value="September">September</option>
                                <option value="October">Oktober</option>
                                <option value="November">November</option>
                                <option value="December">Desember</option>
                            </select>
                        </div>
                    </div>
                    <div class="input-group mb-1">
                        <label>Jumlah Hari</label>
                        <div class="input-group mb-1">
                            <input type="number" class="form-control @error('jmlhari') is-invalid @enderror" name="jmlhari" value="{{ old('jmlhari') }}" required autocomplete="jmlhari" autofocus placeholder="Jumlah Hari" id="jmlhari">
                        </div>
                    </div>
                
            </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal" id="close-modal">Close</button>
                    <button type="submit" class="btn btn-primary" ><span class="fas fa-save"></span> Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- Modal Edit -->
<div class="modal fade" id="modal-edit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Jumlah Hari</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="" id="form-update">
                @csrf
                <input type="hidden" class="form-control" id="update_id" name="id" required>
                    <div class="input-group mb-1">
                    
                    <div class="input-group mb-1">
                        <label>Jumlah Hari</label>
                        <div class="input-group mb-1">
                            <input type="number" value="{{ old('jmlhari')}}" class="form-control @error('jmlhari') is-invalid @enderror" name="jmlhari" value="{{ old('jmlhari') }}" required autocomplete="jmlhari" autofocus placeholder="Jumlah Hari" id="update_jmlhari">
                        </div>
                    </div>
                </div>  
            </div>        
            
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal" id="close-modal-update">Close</button>
                <button type="submit" class="btn btn-primary" ><span class="fas fa-save"></span> Simpan</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


@endsection


@section('script')
<script>
    $(document).ready(function(){
            //Year Dropdown
    let dateDropdown = document.getElementById('date-dropdown');

    let currentYear = new Date().getFullYear();
    let earliestYear = 2020;

    while (currentYear >= earliestYear) {
    let dateOption = document.createElement('option');
    dateOption.text = currentYear;
    dateOption.value = currentYear;
    dateDropdown.add(dateOption);
    currentYear -= 1;
    }

        dTable = $('#myTable').DataTable({
            responsive: true,
            processing: true,
            "language": {
                "processing": "<img style='width:150px;' src='{{asset('img/loader-transparent.gif')}}' />" //add a loading image,simply putting <img src="loader.gif" /> tag.
            },
            serverSide: true,
            ajax: "{{ route('hari_kerja') }}",
            columns: [
                // { data: 'IdType', name: 'IdType' },
                {  
                    data: 'id',
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    data: 'tahun',
                    name: 'tahun'
                },
                {
                    data: 'bulan',
                    name: 'bulan'
                },
                {
                    data: 'jmlhari',
                    name: 'jmlhari'
                },
                {
                    data: 'id',
                    render: function (data, type, row, meta) {
                        let buttonEdit = '<button type="button" data-toggle="modal" data-target="#modal-edit" class="btn btn-warning text-white btn-sm " title="edit" onclick="buttonEdit(\'' + data + '\')"><i class="fa fa-pen"></i></button>';
                        let buttonDelete = '<button type="button" class="btn btn-danger btn-sm ml-2" title="delete" onclick="buttonDelete(\'' + data + '\')"><i class="fa fa-trash"></i></button>'
                        return buttonEdit+buttonDelete;
                    }
                }
            ]
        });

    })

    $('#form-create').on('submit', function(e){
        $('#close-modal').click();
        //buat preevent untuk ajax event
        e.preventDefault();
        //untuk ajax setup kirim token agar bisa akses method post
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $("input[name='_token']").val()
            }
        });

        //proses kirim data ke Controller
        $.ajax({
            //type yg akan di kirim => ada get atau post
            type: "POST",
            //url ini di sesuaikan dengan routing yg udah d bikin
            url: "{{ route ('admin.harikerja_create') }}",
            //untuk data ini kalo semua isi form akan d kirimkan k controller amka menggunakan form serialize
            data: $(this).serialize(),
            //success cuma buat method ajax ajax , yg intinya di pake sh function(response) nya itu sesuai dengan yg kita kirimkan dari controller
            success: function (response) {
                $('#close-modal').click();
                if (response.status == 200) {
                    // autonumber();
                    $('#form-create').trigger("reset");
                    dTable.ajax.reload();
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response.message,
                        showConfirmButton: false,
                        timer: 1500,
                        // footer: '<a href="">Why do I have this issue?</a>'
                    })
                    $('#close-modal').click();
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: response.message,
                        showConfirmButton: false,
                        timer: 1500,
                        // footer: '<a href="">Why do I have this issue?</a>'
                    })
                    $('#close-modal').click();
                }
            }
        });
    })

    function buttonEdit(ids) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $("input[name='_token']").val()
            }
        });
        $.ajax({
            type: "GET",
            url: "{{ route('admin.harikerja_update') }}",
            data: {
                id: ids
            },
            success: function (datas) {
                console.log(datas);
                    $("#update_id").val(datas[0].id);
                    $("#update-tahun").val(datas[0].tahun);
                    $("#update_bulan").val(datas[0].bulan);
                    $("#update_jmlhari").val(datas[0].jmlhari);
            }
        });
    }

    $('#form-update').on('submit', function(e){
        $('#close-modal-update').click();
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $("input[name='_token']").val()
            }
        });

        $.ajax({
            type: "POST",
            url: "{{ route ('admin.harikerja_edit') }}",
            data: $(this).serialize(),
            success: function (response) {
                $('#close-modal-update').click();
                if (response.status == 200) {
                    $('#form-update').trigger("reset");
                    dTable.ajax.reload();
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response.message,
                        showConfirmButton: false,
                        timer: 1500,
                        // footer: '<a href="">Why do I have this issue?</a>'
                    })
                    $('#close-modal-update').click();
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: response.message,
                        showConfirmButton: false,
                        timer: 1500,
                        // footer: '<a href="">Why do I have this issue?</a>'
                    })
                    $('#close-modal-update').click();
                }
            }
        });
    })

    function buttonDelete(ids) {
        swal.fire({
            title: "Delete?",
            icon: 'question',
            text: "Apakah anda yakin ingin menghapus data?",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Ya, Hapus!",
            cancelButtonText: "Tidak",
            reverseButtons: !0,
        }).then(function (e) {

            if (e.value === true) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $("input[name='_token']").val()
                    }
                });
                // let token = $('meta[name="csrf-token"]').attr('content');
                let _url = `/admin/user/delete/${ids}`;

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

    function buttonDelete(ids) {
        swal.fire({
            title: "Delete?",
            icon: 'question',
            text: "Apakah anda yakin ingin menghapus data?",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Ya, Hapus!",
            cancelButtonText: "Tidak",
            reverseButtons: !0,
        }).then(function (e) {

            if (e.value === true) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $("input[name='_token']").val()
                    }
                });
                // let token = $('meta[name="csrf-token"]').attr('content');
                let _url = `/admin/harikerja/delete/${ids}`;

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

    // function create() {
    //     var name = $("#name").val();
    // }


</script>
@endsection
