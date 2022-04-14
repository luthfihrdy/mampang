@extends('layouts.app')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Capaian Kegiatan</h1>
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
            <!-- /.card-header -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Statistik Capaian Kegiatan</h3>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <canvas id="stackedBarChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    <div class="col-12">
    <div class="progress" style="height: 100px;">
        <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
    </div>
    </div>
    </div>
    <br>
    <!-- /.row (main row) -->
    <div class="card">
              <div class="card-header">
                <h3 class="card-title">Kinerja Bulan Lalu</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">Tahun</th>
                      <th>Bulan</th>
                      <th>Progres</th>
                      <th style="width: 40px">Label</th>
                      <th style="width: 120px">Point Menit</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>2022</td>
                      <td>Januari</td>
                      <td>
                        <div class="progress progress-xs progress-striped active">
                          <div class="progress-bar bg-danger" style="width: 30%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-danger">30%</span></td>
                      <td><span class="badge bg-danger">1500 menit</span></td>
                    </tr>
                    <tr>
                      <td>2022</td>
                      <td>Februari</td>
                      <td>
                        <div class="progress progress-xs">
                          <div class="progress-bar bg-warning" style="width: 70%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-warning">70%</span></td>
                      <td><span class="badge bg-warning">1500 menit</span></td>
                    </tr>
                    <tr>
                      <td>2022</td>
                      <td>Maret</td>
                      <td>
                        <div class="progress progress-xs progress-striped active">
                          <div class="progress-bar bg-danger" style="width: 30%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-danger">30%</span></td>
                      <td><span class="badge bg-danger">1500 menit</span></td>
                    </tr>
                    <tr>
                      <td>2022</td>
                      <td>April</td>
                      <td>
                        <div class="progress progress-xs progress-striped active">
                          <div class="progress-bar bg-success" style="width: 100%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-success">100%</span></td>
                      <td><span class="badge bg-success">1500 menit</span></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>

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
                
                <div class="form-group">
                    <label>Jam Mulai</label>
                    {{-- <div class="input-group mb-3">
                        <input type="time" class="form-control" name="jam_awal" value="{{ old('jam_awal') }}" required autocomplete="jam_awal" autofocus min="08:00" max="18:00" id="jamMulai">
                    </div> --}}
                    <div class="input-group clockpicker pull-center"> 
                        <input type="text" class="form-control" value="08:00" name="keg_jamawal" data-placement="bottom" data-align="left" data-autoclose="true" id="keg_jamawal"> 
                        <div class="input-group-append" data-target="#keg_jamawal" onclick="timeclick('keg_jamawal')"> 
                            <div class="input-group-text"><i class="fas fa-clock"></i>
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="form-group">
                    <label>Jam Selesai</label>
                    <div class="input-group mb-3">
                        <input type="time" name="keg_jamselesai" class="form-control @error('keg_jamselesai') is-invalid @enderror"  value="{{ old('keg_jamselesai') }}" required autocomplete="jam_akhir" autofocus min="08:00" max="17:00" id="jamSelesai">
                        {{-- <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-calendar"></span>
                        </div>
                        </div> --}}
                    </div>
                </div>
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
                        <select class="form-control selectpicker"  data-live-search="true" data-size="5" >
                            <option style= "width: 100px; white-space: wrap;" >Pilih Kegiatan</option>  
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label>Kegiatan</label>
                    <div class="input-group mb-3">
                        <textarea name="keg_notes" id="" class="form-control" rows="5">{{ old('keg_notes') }}</textarea>
                        {{-- <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                        </div> --}}
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

$(document).ready(function(){

    //select picker
    // $('.selectpicker').selectpicker();

    //Clock Picker
    $('.clockpicker').clockpicker({
        autoclose: true,
        'default': '08:00',
        min: '08:00'
    });
    //end clockpicker


     $("#keg_jammulai").val('08:00');
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

   var donutData        = {
      labels: [
          'Tercapai',
          'Belum tercapai',
      ],
      datasets: [
        {
          data: [300,100],
          backgroundColor : ['#3c8dbc', '#d2d6de'],
        }
      ]
    }
    //---------------------
    //- STACKED BAR CHART -
    //---------------------
    var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
    var stackedBarChartData = $.extend(true, {}, barChartData)

    var stackedBarChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      scales: {
        xAxes: [{
          stacked: true,
        }],
        yAxes: [{
          stacked: true
        }]
      }
    }

    new Chart(stackedBarChartCanvas, {
      type: 'bar',
      data: stackedBarChartData,
      options: stackedBarChartOptions
    })


// $(function () {

//     //Date picker
//     $('#reservationdate').datetimepicker({
//         format: 'L'
//     });

// });


</script>

@endsection

