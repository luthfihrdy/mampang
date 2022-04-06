@extends('layouts.app')

@section('content')

<!-- Content Header (Page header) -->
<style>
select {
  width: 100px;
  overflow: hidden;
  white-space: pre;
  text-overflow: ellipsis;
  -webkit-appearance: none;
}

option {
  border: solid 1px #DDDDDD;
}
</style>
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
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">
                <b>+</b> Tambah Kegiatan
            </button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="table-responsive">
                    <table id="myTable" class="table table-bordered table-hover" width="100%">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Jam Mulai</th>
                            <th>Jam Selesai</th>
                            <th>Kegiatan</th>
                            <th>Uraian</th>
                            <th>Point Menit</th>
                            <th>Jenis Aktivitas</th>
                            <th>Status</th>
                            <th>Aksi</th>
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

<!-- Modal Insert -->
<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Tambah Kegiatan</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="" id="form-create">
                {{-- <input type="hidden" value="{{ csrf_token() }}" name="_token" /> --}}
                @csrf
                
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Tanggal Kegiatan</label>
                            <div class="input-group mb-3">
                                <input type="date" class="form-control" name="keg_date" value="{{ old('keg_date') }}" required autocomplete="name" autofocus>
                                {{-- <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-calendar"></span>
                                </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>Jam Mulai</label>
                            {{-- <div class="input-group mb-3">
                                <input type="time" class="form-control" name="jam_awal" value="{{ old('jam_awal') }}" required autocomplete="jam_awal" autofocus min="08:00" max="18:00" id="jamMulai">
                            </div> --}}
        
                            <div class="input-group clockpicker pull-center"> 
                                <input type="text" class="form-control" name="keg_jamawal" data-placement="bottom" data-align="left" data-autoclose="true" id="keg_jamawal"> 
                                <div class="input-group-append" data-target="#keg_jamawal" onclick="timeclick('keg_jamawal')"> 
                                    <div class="input-group-text"><i class="fas fa-clock"></i> </div>
                                </div> 
                            </div>
        
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>Jam Selesai</label>
                            {{-- <div class="input-group mb-3">
                                <input type="time" class="form-control" name="jam_awal" value="{{ old('jam_awal') }}" required autocomplete="jam_awal" autofocus min="08:00" max="18:00" id="jamMulai">
                            </div> --}}
        
                            <div class="input-group clockpicker pull-center"> 
                                <input type="text" class="form-control" name="keg_jamselesai" data-placement="bottom" data-align="left" data-autoclose="true" id="keg_jamselesai"> 
                                <div class="input-group-append" data-target="#keg_jamselesai" onclick="timeclick('keg_jamselesai')"> 
                                    <div class="input-group-text"><i class="fas fa-clock"></i> </div>
                                </div> 
                            </div>
        
                        </div>
                    </div>
                </div>
                
                {{-- <div class="form-group">
                    <label>Jam Selesai</label>
                    <div class="input-group mb-3">
                        <input type="time" name="keg_jamselesai" class="form-control @error('keg_jamselesai') is-invalid @enderror"  value="{{ old('keg_jamselesai') }}" required autocomplete="jam_akhir" autofocus min="08:00" max="17:00" id="jamSelesai">
                    </div>
                </div> --}}
                
                {{-- <div class="input-group date mb-3" id="reservationdate" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" placeholder="Tanggal Kegiatan | 12/30/2022"/>
                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div> --}}
                {{-- <div class="form-group">
                    <label>Aktivitas Umum</label>
                    <div class="input-group mb-3">
                        <select class="">
                        
                        </select>
                    </div>
                </div> --}}
                <div class ="form-group">
                    <label>Aktivitas Umum</label>
                    <div class="input-group mb-3" >
                        <select class="form-control selectpicker"  data-live-search="true" data-size="5" id="aktivitas">

                        @forelse($aktivitas as $data)
                            <option value="{{$data->act_id}}" class="" data-option="">
                                <?php 
                                    $a =$data->act_nama;
                                    $b = substr($a, 0, 95);
                                    $y = $b . "...";
                                    if($a > $b)echo $y; 
                                    else echo $a;
                                ?>
                                {{' | '.$data->act_waktu.' '.$data->act_durasi}} 
                            
                            </option>
                        @empty
                            <option>Data Aktivitas belum ada </option>
                        @endforelse
                            
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="">Waktu Efektif</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="efektif" readonly="true">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Jumlah Hasil</label>
                            <input type="number" name="" id="" class="form-control" id="jumlah">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Jenis Hasil</label>
                            <input type="text" class="form-control" id="hasil" readonly="true">
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label>Deskripsi</label>
                    <div class="input-group mb-3">
                        <textarea name="keg_notes" id="" class="form-control" rows="5">{{ old('keg_notes') }}</textarea>
                        {{-- <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                        </div> --}}
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
                <div class="form-group">
                    <label>Tanggal Kegiatan</label>
                    <div class="input-group mb-3">
                        <input type="date" class="form-control" name="keg_date" id="update_keg_date" value="{{ old('keg_date') }}" required autocomplete="keg_date" autofocus>

                    </div>
                </div>
                
                <div class="form-group">
                    <label>Jam Mulai</label>
                    <div class="input-group mb-3">
                        <input type="time" class="form-control" name="keg_jammulai" id="update_keg_jammulai" value="{{ old('keg_jammulai') }}" required autocomplete="keg_jammulai" autofocus min="08:00" max="17:00">

                    </div>
                </div>
                <div class="form-group">
                    <label>Jam Selesai</label>
                    <div class="input-group mb-3">
                        <input type="time" name="keg_jamselesai" id="update_keg_jamselesai" class="form-control @error('keg_jamselesai') is-invalid @enderror"  value="{{ old('keg_jamselesai') }}" required autocomplete="keg_jamselesai" autofocus min="08:00" max="17:00">

                    </div>
                    
                </div>

                <div class="form-group">
                    <label>Kegiatan</label>
                    <div class="input-group mb-3">
                        <textarea name="keg_notes" id="update_keg_notes" class="form-control" rows="5">{{ old('keg_notes') }}</textarea>
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
// Kalo mau make tempus dominus js
// $(function () {
//     $('#datetimepicker3').datetimepicker({
//         format: 'LT'
//     });
// });

function timeclick(data){
        $(data).click();
}

function dataEfektif(id) {
    $.ajax({
        type: "GET",
        url : "{{route('aktivitas.json',"+id+")}}",
        success: function (data) {
            console.log(data.act_id);
        }
    })
}

$('#aktivitas').on("change", function(){
    dataEfektif(this.value);
})

$(document).ready(function(){

    var choiches = ['00','01','02','03','04','05','06','07','18','19','20','21','22','23'];

    $('#keg_jamawal').on('change', function() {
        var hasil = document.getElementById('keg_jamawal').value;
        var strip = hasil.substring(0,2);
        for(let i = 0; i < choiches.length-1; i++){
            if(strip == choiches[i]){
                Swal.fire({
                    icon: 'error',
                    title: 'Jam mulai salah',
                    text: 'Input jam mulai minimal pukul 08:00 dan maksimal 18:00',
                    showConfirmButton: true,
                    timer: 2500,
                    // footer: '<a href="">Why do I have this issue?</a>'
                });
                $('#keg_jamawal').val("08:00");
            }
        }
        
    });

    $('#keg_jamselesai').on('change', function() {
        var hasil = document.getElementById('keg_jamselesai').value;
        var strip = hasil.substring(0,2);
        for(let i = 0; i < choiches.length-1; i++){
            if(strip == choiches[i]){
                Swal.fire({
                    icon: 'error',
                    title: 'Jam selesai salah',
                    text: 'Input jam selesai minimal pukul 08:00 dan maksimal 18:00',
                    showConfirmButton: true,
                    timer: 2500,
                    // footer: '<a href="">Why do I have this issue?</a>'
                });
                $('#keg_jamselesai').val("08:00");
            }
        }
        
    });

    //select picker
    // $('.selectpicker').selectpicker();

    //var choiches = [00,15,30,45];
    //Clock Picker
    $('.clockpicker').clockpicker({
        autoclose: true,
        // 'default': '08:00',
        'afterDone': function() {
            console.log("after hour selected");
        },
    });

     $("#keg_jamawal").val('08:00');
     $("#keg_jamselesai").val('08:00');

    dTable = $('#myTable').DataTable({
        columnDefs: [
            { width: '12.5%', targets:1},
            { width: '12.5%', targets:2},
            { width: '12%', targets:4}
        ],
        buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
        // order: [[2,'asc']],
        responsive: true,
        processing: true,
        "language": {
            "processing": "<img style='width:150px;' src='{{asset('img/loader-transparent.gif')}}' />" //add a loading image,simply putting <img src="loader.gif" /> tag.
        },
        serverSide: true,
        ajax: "{{ route('pegawai.kegiatan_get')}}",
        columns: [
            // { data: 'IdType', name: 'IdType' },
            {
                data: 'keg_date',
                name: 'keg_date'
            },
            {
                data: 'keg_jammulai',
                name: 'keg_jammulai'
            },
            {
                data: 'keg_jamselesai',
                name: 'keg_jamselesai'
            },
            {
                data: 'keg_notes',
                name: 'keg_notes'
            },
            {
                data: 'keg_notes',
                name: 'keg_notes'
            },
            {
                data: 'point_menit',
                name: 'point_menit'
            },
            {
                data: 'point_menit',
                name: 'point_menit'
            },
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
                    if(row.status == 'Waiting'){
                        // console.log(type);
                        let buttonEdit =
                        '<a href="#" class="text-primary" data-toggle="modal" data-target="#modal-update" onclick="buttonEdit(\'' + data + '\');"><i class="fas fa-edit"></i></a>';
                            // '<button type="button" class="btn btn-success btn-rounded btn-icon" data-toggle="modal" data-placement="buttom" data-custom-class="tooltip-success" title="EDIT" data-target="#showModalUpdateLocation" style="margin-right:5px;" onclick="buttonEdit(\'' + data + '\');"><i style="font-size:1.5rem; margin-left:-7px;" class="ti-pencil-alt"></i></button>';
                        let buttonDelete = '<a href="#" class="text-danger ml-2" onclick="buttonDelete(\'' + data + '\')"><i class="fas fa-trash"></i></a>';
                        return buttonEdit + buttonDelete;
                    }else if(row.status == 'Rejected'){
                        let buttonEdit = '';
                        let buttonDelete = '<a href="#" class="text-danger ml-2" onclick="buttonDelete(\'' + data + '\')"><i class="fas fa-trash"></i></a>';
                        return buttonEdit + buttonDelete;
                    }else {
                        let buttonEdit = '';
                        let buttonDelete = '';
                        return buttonEdit + buttonDelete;
                    }
                }
            }
            ]
    });

});

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
        url: "{{ route ('pegawai.kegiatan_store') }}",
        //untuk data ini kalo semua isi form akan d kirimkan k controller amka menggunakan form serialize
        data: $(this).serialize(),
        //success cuma buat method ajax ajax , yg intinya di pake sh function(response) nya itu sesuai dengan yg kita kirimkan dari controller
        success: function (response) {
            $('#close-modal').click();
            if (response.status == 200) {
                // autonumber();
                $('#form-create').trigger("reset");
                $("#keg_jamawal").val('08:00');
                $("#keg_jamselesai").val('08:00');
                dTable.ajax.reload();
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: response.message,
                    showConfirmButton: false,
                    timer: 1500,
                    // footer: '<a href="">Why do I have this issue?</a>'
                    });
                $('#close-modal').click();
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: response.message,
                    showConfirmButton: false,
                    timer: 1500,
                    // footer: '<a href="">Why do I have this issue?</a>'
                });
                $('#form-create').trigger("reset");
                $("#keg_jamawal").val('08:00');
                $("#keg_jamselesai").val('08:00');
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
            url: "{{ route('pegawai.kegiatan_update') }}",
            data: {
                id: ids
            },
            success: function (datas) {
                console.log(datas);
                    $("#update_id").val(datas[0].id);
                    $("#update_keg_date").val(datas[0].keg_date);
                    $("#update_keg_jammulai").val(datas[0].keg_jammulai);
                    $("#update_keg_jamselesai").val(datas[0].keg_jamselesai);
                    $("#update_keg_notes").val(datas[0].keg_notes);
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
            url: "{{ route ('pegawai.kegiatan_edit') }}",
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
                    $('#form-update').trigger("reset");
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
                let _url = `/pegawai/kegiatan/delete/${ids}`;

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

// $(function () {

//     //Date picker
//     $('#reservationdate').datetimepicker({
//         format: 'L'
//     });

// });


</script>

@endsection

