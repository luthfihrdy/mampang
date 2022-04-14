@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">User</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
            <li class="breadcrumb-item active">User</li>
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
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">
                <b>+</b> Tambah User
            </button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <table id="example1" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Role</th>
                        <th>Nrk</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Fasyankes</th>
                        <th>Unit</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Admin</td>
                        <td>231355</td>
                        <td>Benazheer</td>
                        <td>bena@gmail.com</td>
                        <td>PKC Mampang Prapatan</td>
                        <td>Manajemen</td>
                        <td><button type="button" class="btn btn-warning btn-sm text-white" title="Detail" data-toggle="modal" data-target="#modal-detail"><i class="fa fa-info-circle"></button></td>
                    </tr>
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

<!-- Modal Insert -->
<div class="modal fade" id="modal-lg">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Tambah User</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form method="POST" action="" id="form-create">
            @csrf
            <div class="input-group mb-3">
                <select class="custom-select" name="role_id" id="role_id">
                    <option value="3">Pegawai</option>
                    <option value="2">Validator</option>
                    <option value="1">Admin</option>
                </select>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user-friends"></span>
                    </div>
                </div>
            </div>

            <div class="input-group mb-3">
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Full Name" id="name">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
            </div>
    
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
    
            <div class="input-group mb-3">
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email" id="email">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>
    
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
    
            <div class="input-group mb-3">
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password" id="password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
    
            <div class="row">
                <!-- <div class="col-8">
                <div class="icheck-primary">
                    <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                    <label for="agreeTerms">
                    I agree to the <a href="#">terms</a>
                    </label>
                </div>
                </div> -->
                <!-- /.col -->
                <!-- /.col -->
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

<!-- Modal Update -->
<div class="modal fade" id="modal-update">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Ubah User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <div class="modal-body">
            <form method="POST" action="" id="form-update">
                @csrf
                <input type="hidden" class="form-control" id="update_id" name="id" required>
                <div class="input-group mb-3">
                    <select class="custom-select" name="role_id" id="update_role_id">
                        <option value="3">Pegawai</option>
                        <option value="2">Validator</option>
                        <option value="1">Admin</option>
                    </select>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user-friends"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Full Name" id="update_name">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="input-group mb-3">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email" id="update_email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
        
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        
                <div class="input-group mb-3">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password" id="update_password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
        
                <div class="row">
                    <!-- <div class="col-8">
                    <div class="icheck-primary">
                        <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                        <label for="agreeTerms">
                        I agree to the <a href="#">terms</a>
                        </label>
                    </div>
                    </div> -->
                    <!-- /.col -->
                    <!-- /.col -->
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
    <!-- /.modal update -->

    <!-- Modal Detail -->
    <div class="modal fade bd-example-modal-lg" id="modal-detail" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <!-- Main row -->
            <div class="row">
                <div class="col-md-3">
                <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                src="{{asset('img/logo.png')}}"
                                alt="User profile picture">
                            </div>
                            <h3 class="profile-username text-center">
                            {{Auth::user()->name}}</h3>
                            <p class="text-muted text-center">Software Engineer</p>
                        </div>
                    <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <!-- Box Informasi Kontak -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Informasi Kontak</h3>
                        </div>
                    <!-- /.card-header -->
                        <div class="card-body">
                            <strong><i class="fas fa-user"></i> Nama Lengkap</strong>
                            <p class="text-muted">  
                                {{-- Ambil nama --}}
                                {{Auth::user()->name}}</p>
                            <hr>
                            {{-- Email --}}
                            <strong><i class="fas fa-at"></i> Email</strong>
                            <p class="text-muted">bena@gmail.com</p>
                            <hr>
                            {{-- No Hp --}}
                            <strong><i class="fas fa-phone mr-1"></i> No. Telp</strong>
                            <p class="text-muted">08455156565</p>
                            <hr>
                            {{-- Alamat --}}
                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>
                            <p class="text-muted">Alamat</p>
                            <p class="text-muted">Kelurahan</p>
                            <p class="text-muted">Kecamatan</p>
                            <p class="text-muted">Kota</p>
                            <p class="text-muted">Provinsi</p>
                            <hr>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Data Diri</a></li>
                            <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">File Kepegawaian</a></li>
                            <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="activity">
                            {{-- Data Diti --}}
                            <fieldset disabled>
                                <div class= "col-bg-12">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="disabledTextInput" class="form-label">Nama Lengkap Dengan Gelar</label>
                                            <input type="text" id="disabledTextInput" class="form-control" placeholder="
                                            {{Auth::user()->name}}">
                                        </div>
                                        <div class="mb-3 col-sm-6">
                                            <label for="disabledTextInput" class="form-label">NIK</label>
                                            <input type="text" id="disabledTextInput" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class= "col-bg-12">
                                        <div class="row">
                                            <div class="mb-3 col-sm-6">
                                                <label for="disabledTextInput" class="form-label">NRK</label>
                                                <input type="text" id="disabledTextInput" class="form-control" placeholder="">
                                            </div>
                                            <div class="mb-3 col-sm-6">
                                                <label for="disabledTextInput" class="form-label">ID/NIP/NRP</label>
                                                <input type="text" id="disabledTextInput" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                </div>
                        {{-- Medis --}}
                                <div class="row">
                                    <div class="col-6">
                                    <label class="form-label">Medis</label>
                                        <div class="list-group" id="list-tab" role="tablist">
                                        <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">STR</a>
                                        <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">SIP</a>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                    <label class="form-label"></label>
                                        <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">no str : 82392749237492847924 <br> terbit : 22/02/20 <br> berakhir : 22/02/20</div>
                                        <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">no sip : 82392749237492847924 <br> terbit : 22/02/20 <br> berakhir : 22/02/20</div>
                                        </div>
                                    </div>
                                    </div>
                                {{-- akhir medis --}}
                                    <div class= "col-bg-12">
                                            <div class="row">
                                                <div class="mb-3 col-sm-6">
                                                    <label for="disabledTextInput" class="form-label">Tempat Lahir</label>
                                                    <input type="text" id="disabledTextInput" class="form-control" placeholder="">
                                                </div>
                                                <div class="mb-3 col-sm-6">
                                                    <label for="disabledTextInput" class="form-label">Tanggal Lahir</label>
                                                    <input type="text" id="disabledTextInput" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                    </div>
                                    <div class= "col-bg-12">
                                            <div class="row">
                                                <div class="mb-3 col-sm-6">
                                                    <label for="disabledTextInput" class="form-label">Jenis Kelamin</label>
                                                    <input type="text" id="disabledTextInput" class="form-control" placeholder="">
                                                </div>
                                                <div class="mb-3 col-sm-6">
                                                    <label for="disabledTextInput" class="form-label">Pangkat</label>
                                                    <input type="text" id="disabledTextInput" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                    </div>
                                    <div class= "col-bg-12">
                                            <div class="row">
                                                <div class="mb-3 col-sm-6">
                                                    <label for="disabledTextInput" class="form-label">Jabatan</label>
                                                    <input type="text" id="disabledTextInput" class="form-control" placeholder="">
                                                </div>
                                                <div class="mb-3 col-sm-6">
                                                    <label for="disabledTextInput" class="form-label">Jenis Jabatan</label>
                                                    <input type="text" id="disabledTextInput" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                    </div>
                                    <div class= "col-bg-12">
                                            <div class="row">
                                                <div class="mb-3 col-sm-6">
                                                    <label for="disabledTextInput" class="form-label">Unit Kerja</label>
                                                    <input type="text" id="disabledTextInput" class="form-control" placeholder="">
                                                </div>
                                                <div class="mb-3 col-sm-6">
                                                    <label for="disabledTextInput" class="form-label">Jenis Unit</label>
                                                    <input type="text" id="disabledTextInput" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                    </div>
                                    <div class= "col-bg-12">
                                            <div class="row">
                                                <div class="mb-3 col-sm-6">
                                                    <label for="disabledTextInput" class="form-label">Nama Fasyankes</label>
                                                    <input type="text" id="disabledTextInput" class="form-control" placeholder="">
                                                </div>
                                                <div class="mb-3 col-sm-6">
                                                    <label for="disabledTextInput" class="form-label">Formasi Jabatan</label>
                                                    <input type="text" id="disabledTextInput" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                    </div>
                                    <div class= "col-bg-12">
                                            <div class="row">
                                                <div class="mb-3 col-sm-6">
                                                    <label for="disabledTextInput" class="form-label">Status Pegawai</label>
                                                    <input type="text" id="disabledTextInput" class="form-control" placeholder="">
                                                </div>
                                                <div class="mb-3 col-sm-6">
                                                    <label for="disabledTextInput" class="form-label">Golongan</label>
                                                    <input type="text" id="disabledTextInput" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                    </div>
                                    <div class= "col-bg-12">
                                            <div class="row">
                                                <div class="mb-3 col-sm-6">
                                                    <label for="disabledTextInput" class="form-label">TMT</label>
                                                    <input type="text" id="disabledTextInput" class="form-control" placeholder="">
                                                </div>
                                                <div class="mb-3 col-sm-6">
                                                    <label for="disabledTextInput" class="form-label">TMT Berakhir</label>
                                                    <input type="text" id="disabledTextInput" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                    </div>
                            </fieldset>
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                    </div><!-- /.card -->
                </div><!-- /.col -->
                </div><!-- /.row -->
                </div>
            </div>
        </div>


@endsection


@section('script')
<script>
    $(document).ready(function(){
        dTable = $('#myTable').DataTable({
            order: [[2,'asc']],
            responsive: true,
            processing: true,
            "language": {
                "processing": "<img style='width:150px;' src='{{asset('img/loader-transparent.gif')}}' />" //add a loading image,simply putting <img src="loader.gif" /> tag.
            },
            serverSide: true,
            ajax: "{{ route('admin.user_get')}}",
            columns: [
                // { data: 'IdType', name: 'IdType' },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'role_id',
                    render: function(data, type, row){
                        if(row.role_id == 1) {
                            return 'Admin';
                        }else if(row.role_id == 2){
                            return 'Validator';
                        }else if(row.role_id == 3){
                            return 'Pegawai';
                        }
                    }
                },
                // {
                //     data: 'role_id',
                //     name: 'role_id'
                // },
                {
                    data: 'id',
                    render: function (data, type, row) {
                        // console.log(type);
                        let buttonEdit =
                        '<a href="#" class="text-primary" data-toggle="modal" data-target="#modal-update" onclick="buttonEdit(\'' + data + '\');"><i class="fas fa-edit"></i></a>';
                            // '<button type="button" class="btn btn-success btn-rounded btn-icon" data-toggle="modal" data-placement="buttom" data-custom-class="tooltip-success" title="EDIT" data-target="#showModalUpdateLocation" style="margin-right:5px;" onclick="buttonEdit(\'' + data + '\');"><i style="font-size:1.5rem; margin-left:-7px;" class="ti-pencil-alt"></i></button>';
                        let buttonDelete = '<a href="#" class="text-danger ml-2" onclick="buttonDelete(\'' + data + '\')"><i class="fas fa-trash"></i></a>';
                        return buttonEdit + buttonDelete;
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
            url: "{{ route ('admin.user_create') }}",
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
            url: "{{ route('admin.user_update') }}",
            data: {
                id: ids
            },
            success: function (datas) {
                console.log(datas);
                    $("#update_id").val(datas[0].id);
                    $("#update_role_id").val(datas[0].role_id);
                    $("#update_name").val(datas[0].name);
                    $("#update_email").val(datas[0].email);
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
            url: "{{ route ('admin.user_edit') }}",
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
                        position: 'top-end',
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

    // function create() {
    //     var name = $("#name").val();
    // }

    $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "dom": 'Bfrtip',
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
    
</script>
@endsection
