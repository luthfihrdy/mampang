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
    <!-- /.row -->
    <!-- Main row -->
    <div class="form-group">
        <label>Tahun</label>
            <div class="input-group mb-3 ">
                <select class="custom-select form-control" id="date-dropdown">
                </select>
            </div>
    </div>
    <div class="form-group">
        <label>Bulan</label>
        <div class="input-group mb-3">
            <select class="custom-select form-control" placeholder="Bulan">
                <option name="January" value="Jan">January</option>
                <option name="February" value="Feb">February</option>
                <option name="March" value="Mar">March</option>
                <option name="April" value="Apr">April</option>
                <option name="May" value="May">May</option>
                <option name="June" value="Jun">June</option>
                <option name="July" value="Jul">July</option>
                <option name="August" value="Aug">August</option>
                <option name="September" value="Sep">September</option>
                <option name="October" value="Oct">October</option>
                <option name="November" value="Nov">November</option>
                <option name="December" value="Dec">December</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label>Jumlah Hari</label>
        <div class="input-group mb-3">
            <input type="text" class="form-control @error('jmlhari') is-invalid @enderror" name="jmlhari" value="{{ old('jmlhari') }}" required autocomplete="jmlhari" autofocus placeholder="Jumlah Hari" id="jmlhari">
        </div>
    </div>    
    <div class="form-group">
        <button type="submit" class="btn btn-primary" ><span class="fas fa-save"></span> Simpan</button>  
    </div>

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

    
</script>
@endsection
