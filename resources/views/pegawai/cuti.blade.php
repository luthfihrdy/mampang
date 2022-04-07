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
                <b>+</b> Tambah Cuti
            </button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <table id="myTable" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Mulai Cuti</th>
                        <th>Selesai Cuti</th>
                        <th>Jenis Cuti</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name}}</td>
                            <td>{{ $user->email}}</td>
                            <td>
                                @if($user->role_id == 1)
                                    Admin
                                @elseif($user->role_id == 2)
                                    Validator
                                @elseif($user->role_id == 3)
                                    Pegawai
                                @endif
                            </td>
                            <td>ACT</td>
                        </tr>
                    @endforeach --}}
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
        <h4 class="modal-title">Ajukan Cuti</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form method="POST" action="" id="form-create">
            @csrf
            <div class="form-group">
                    <label>Tanggal Mulai Cuti</label>
                    <div class="input-group mb-3">
                        <input type="date" class="form-control" name="cuti_mulai" value="{{ old('cuti_mulai') }}" required autocomplete="name" autofocus>
                    </div>
            </div>
            <div class="form-group">
                    <label>Tanggal Akhir Cuti</label>
                    <div class="input-group mb-3">
                        <input type="date" class="form-control" name="cuti_selesai" value="{{ old('cuti_selesai') }}" required autocomplete="name" autofocus>
                    </div>
            </div>
            <div class="form-group">
                <label>Jenis Cuti</label>
                <div class="input-group mb-3">
                    <select class="custom-select" name="jcuti" id="jcuti">
                        <option value="1">Cuti Tahunan</option>
                        <option value="2">Cuti Besar</option>
                        <option value="3">Cuti Sakit</option>
                        <option value="4">Cuti Melahirkan</option>
                        <option value="5">Cuti Karena Alasan Penting</option>
                        <option value="6">Cuti di Luar Tanggungan Negara</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label> Alasan Cuti </label>
                <div class="input-group-mb3">
                    <textarea name="cuti_alasan" id="" class="form-control" rows="3">{{ old('cuti_alasan') }}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label>Pengganti Cuti</label>
                <div class="input-group mb-3">
                    <select class="custom-select" name="nrkpengganti" id="nrkpengganti">
                        <option value="1">test</option>
                    </select>
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
            ajax: "{{ route('pegawai.cuti')}}",
            columns: [
                // { data: 'IdType', name: 'IdType' },
                {
                    data: 'cuti_mulai',
                    name: 'cuti_mulai'
                },
                {
                    data: 'cuti_selesai',
                    name: 'cuti_selesai'
                },
                {
                    data: 'jcuti',
                    render: function(data, type, row){
                        if(row.jcuti == 1) {
                            return 'Cuti Tahunan';
                        }else if(row.jcuti == 2){
                            return 'Cuti Besar';
                        }else if(row.jcuti == 3){
                            return 'Cuti Sakit';
                        }else if(row.jcuti == 4){
                            return 'Cuti Melahirkan';
                        }else if(row.jcuti == 5){
                            return 'Cuti Alasan Penting';
                        }else if(row.jcuti == 6){
                            return 'Cuti di Luar Tanggungan Negara';
                        }
                    }
                },
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
    
</script>
@endsection
