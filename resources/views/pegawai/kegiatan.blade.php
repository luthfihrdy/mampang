@extends('layouts.app')

@section('content')

<!-- Content Header (Page header) -->
<link rel="stylesheet" href="{{asset('datatables/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('datatables/buttons.bootstrap4.min.css')}}">
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
                    <table id="myTable" class="table table-bordered table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>Jam Selesai-Hide</th>
                            <th>Kegiatan</th>
                            <th>Uraian</th>
                            <th>Durasi</th>
                            <th>Vol</th>
                            <th>Hasil</th>
                            <th>Aktivitas</th>
                            <th>Status</th>
                            <th>Aksi</th>
                            <th>Dibuat-Hide</th>
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
                                <input type="date" class="form-control" name="keg_date" value="{{ old('keg_date') }}" required autocomplete="name" id="keg_date" autofocus>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>Jam Mulai</label>
                            <div class="input-group clockpicker pull-center"> 
                                <input type="text" class="form-control" name="keg_jammulai" data-placement="bottom" data-align="left" data-autoclose="true" id="keg_jammulai"> 
                                <div class="input-group-append" data-target="#keg_jammulai"> 
                                    <a class="input-group-text" id="jammulai"><i class="fas fa-clock"></i> </a>
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>Jam Selesai</label>
                            <div class="input-group clockpicker pull-center"> 
                                <input type="text" class="form-control" name="keg_jamselesai" data-placement="bottom" data-align="left" data-autoclose="true" id="keg_jamselesai"> 
                                <div class="input-group-append" data-target="#keg_jamselesai" onclick="timeclick('keg_jamselesai')"> 
                                    <a class="input-group-text" id="jamselesai"><i class="fas fa-clock"></i> </a>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
                <div class ="form-group">
                    <label>Aktivitas Umum</label>
                    <div class="input-group mb-3" >
                        <select class="form-control selectpicker" name="act_id" data-live-search="true" data-size="5" id="aktivitas" onchange="dataEfektif(this.value)" title="== Pilih Aktivitas ==">
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
                                <input type="number" name="wkt_efektif" class="form-control" id="waktu_efektif" readonly="true">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Jumlah Hasil</label>
                            <input type="number" name="totalunit" id="" class="form-control" id="jumlah">
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
                <div class="row">
                    <div class="col">
                        <input type="hidden" class="form-control" id="update_id" name="id" required>
                        <div class="form-group">
                            <label>Tanggal Kegiatan</label>
                            <div class="input-group mb-3">
                                <input type="date" class="form-control" name="keg_date" id="update_keg_date"  required autocomplete="keg_date" autofocus>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>Jam Mulai</label>
                            <div class="input-group pull-center"> 
                                <input type="text" class="form-control" name="update_keg_jammulai" data-placement="bottom" data-align="left" data-autoclose="true" id="update_keg_jammulai" value="{{ old('keg_jammulai')}}" required autocomplete="keg_jammulai" autofocus min="08:00" max="17:00"> 
                                <div class="input-group-append" data-target="#update_keg_jammulai"> 
                                    <a class="input-group-text" id="updatejammulai"><i class="fas fa-clock"></i> </a>
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>Jam Selesai</label>
                            <div class="input-group pull-center"> 
                                <input type="text" class="form-control" name="update_keg_jamselesai" data-placement="bottom" data-align="left" data-autoclose="true" id="update_keg_jamselesai" value="{{ old('keg_jamselesai')}}" required autocomplete="keg_jamselesai" autofocus min="08:00" max="17:00"> 
                                <div class="input-group-append" data-target="#update_keg_jamselesai"> 
                                    <a class="input-group-text" id="updatejamselesai"><i class="fas fa-clock"></i> </a>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
                <div class ="form-group">
                    <label>Aktivitas Umum</label>
                    <div class="input-group mb-3" >
                        <select class="form-control selectpicker" name="act_id" data-live-search="true" data-size="5" onchange="dataEfektifUpdate(this.value)" title="== Pilih Aktivitas ==" id="updateActid">
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
                                <input type="number" name="wkt_efektif" class="form-control" id="update_waktu_efektif" readonly="true" value="{{old('wkt_efektif')}}">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Jumlah Hasil</label>
                            <input type="number" name="totalunit" class="form-control" id="update_jumlah">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Jenis Hasil</label>
                            <input type="text" class="form-control" id="update_hasil" readonly="true">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
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

function dataEfektif(id) {
    $.ajax({
        type: "GET",
        url: "{{ route('aktivitas.json') }}?id="+id,
        success: function (data) {
            $.each(data, function (index, value) {
                    $('#waktu_efektif').val(value.act_waktu);
                    $('#hasil').val(value.act_unit);
                });
            
        }
    })
}

function dataEfektifUpdate(id) {
    $.ajax({
        type: "GET",
        url: "{{ route('aktivitas.json') }}?id="+id,
        success: function (data) {
            $.each(data, function (index, value) {
                    $('#update_waktu_efektif').val(value.act_waktu);
                    $('#update_hasil').val(value.act_unit);
                });
        }
    })
}

$(document).ready(function(){

    var choiches = ['00','01','02','03','04','05','06','07','19','20','21','22','23'];

    $('#keg_jammulai').on('change', function() {
        var hasil = document.getElementById('keg_jammulai').value;
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
                $('#keg_jammulai').val("08:00");
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
    var jammulai = $('#keg_jammulai').clockpicker({
        donetext: 'Done'
        // 'default': '08:00',
    });

    var jamselesai = $('#keg_jamselesai').clockpicker({
        donetext: 'Done'
        // 'default': '08:00',
    });

    var updatejammulai = $('#update_keg_jammulai').clockpicker({
        donetext: 'Done'
        // 'default': '08:00',
    });

    var updatejamselesai = $('#update_keg_jamselesai').clockpicker({
        donetext: 'Done'
        // 'default': '08:00',
    });

    $('#jammulai').click(function(e){
        e.stopPropagation();
        jammulai.clockpicker('show');
    });
    
    $('#jamselesai').click(function(e){
        e.stopPropagation();
        jamselesai.clockpicker('show');
    });

    $('#updatejammulai').click(function(e){
        e.stopPropagation();
        updatejammulai.clockpicker('show');
    });

    $('#updatejamselesai').click(function(e){
        e.stopPropagation();
        updatejamselesai.clockpicker('show');
    });
    
    $("#keg_jammulai").val('08:00');
    $("#keg_jamselesai").val('08:00');

    dTable = $('#myTable').DataTable({
        dom: 'Bfrtip',
        buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
        // order: [[2,'asc']],
        responsive: true,
        processing: true,
        "language": {
            "processing": "<img style='width:150px;' src='{{asset('img/loader-transparent.gif')}}' />" //add a loading image,simply putting <img src="loader.gif" /> tag.
        },
        serverSide: true,
        ajax: "{{ route('pegawai.kegiatan_umum_get')}}",
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
                data: 'get_act',
                render: function(data, type, row, meta){
                    if(data == null){
                            return null;
                        }else{
                            return data.act_nama;
                    }
                }
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
                data: 'keg_volume',
                name: 'keg_volume'
            },
            {
                data: 'totalunit',
                name: 'totalunit'
            },
            {
                data: 'cacode',
                name: 'cacode'
            },
            {
                data: 'status',
                render: function(data, type, row) {
                    if(row.status == 1) {
                        return '<span class="badge badge-warning"><i class="fa fa-hourglass"></i> Waiting</span>'
                    }else if(row.status == 2) {
                        return '<span class="badge badge-success"><i class="fa fa-check"></i> Approved</span>'
                    }else if(row.status == 3) {
                        return '<span class="badge badge-danger"><i class="fa fa-ban"></i> Rejected</span>'
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
                    if(row.status == '1'){
                        // console.log(type);
                        let buttonEdit =
                        '<a href="#" class="text-primary" data-toggle="modal" data-target="#modal-update" onclick="buttonEdit(\'' + data + '\');"><i class="fas fa-edit"></i></a>';
                            // '<button type="button" class="btn btn-success btn-rounded btn-icon" data-toggle="modal" data-placement="buttom" data-custom-class="tooltip-success" title="EDIT" data-target="#showModalUpdateLocation" style="margin-right:5px;" onclick="buttonEdit(\'' + data + '\');"><i style="font-size:1.5rem; margin-left:-7px;" class="ti-pencil-alt"></i></button>';
                        let buttonDelete = '<a href="#" class="text-danger ml-2" onclick="buttonDelete(\'' + data + '\')"><i class="fas fa-trash"></i></a>';
                        return buttonEdit + buttonDelete;
                    }else if(row.status == '3'){
                        let buttonEdit = '';
                        let buttonDelete = '<a href="#" class="text-danger ml-2" onclick="buttonDelete(\'' + data + '\')"><i class="fas fa-trash"></i></a>';
                        return buttonEdit + buttonDelete;
                    }else {
                        let buttonEdit = '';
                        let buttonDelete = '';
                        return buttonEdit + buttonDelete;
                    }
                }
            },
            {
                data: 'created_at',
                name: 'created_at'
            }
            ],
            columnDefs:[
                {
                    "targets" : 1,
                    "render" : function(data,type,row) {
                        var awal = data.substring(0,5);
                        var selesai = row.keg_jamselesai.substring(0,5);
                        return awal +' - '+ selesai;
                    },
                },
                {
                    "targets" : 7,
                    "render" : function(data,type,row) {
                        return data +' '+ row.get_act.act_unit;
                    },
                },
                {
                    "targets" : 5,
                    "render" : function(data,type,row) {
                        return data +'  '+ row.get_act.act_durasi;
                    },
                },
                {
                    "visible": false, "targets": [ 2,11 ]
                },
                { width: '12%', targets:1},
                { width: '10%', targets:7}
            ],
            "order": [[11, 'desc']]
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
        url: "{{ route ('pegawai.kegiatan_umum_store') }}",
        //untuk data ini kalo semua isi form akan d kirimkan k controller amka menggunakan form serialize
        data: $(this).serialize(),
        //success cuma buat method ajax ajax , yg intinya di pake sh function(response) nya itu sesuai dengan yg kita kirimkan dari controller
        success: function (response) {
            $('#close-modal').click();
            if (response.status == 200) {
                // autonumber();
                $('#form-create').trigger("reset");
                $("#keg_jammulai").val('08:00');
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
                $("#keg_jammulai").val('08:00');
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
            url: "{{ route('pegawai.kegiatan_umum_update') }}",
            data: {
                id: ids
            },
            success: function (datas) {
                console.log(datas);
                    $("#update_id").val(datas[0].id);
                    $("#update_keg_date").val((datas[0].keg_date).substring(0,10));
                    $("#update_keg_jammulai").val((datas[0].keg_jammulai).substring(0,5));
                    $("#update_keg_jamselesai").val((datas[0].keg_jamselesai).substring(0,5));
                    $("#update_keg_notes").val(datas[0].keg_notes);
                    $("#updateActid").val(datas[0].act_id);
                    $("#update_waktu_efektif").val(datas[0].get_act.act_waktu);
                    $("#update_jumlah").val(datas[0].totalunit);
                    $("#update_hasil").val(datas[0].get_act.act_unit);
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
            url: "{{ route ('pegawai.kegiatan_umum_edit') }}",
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

</script>

@endsection

