@extends('layouts.app')

@section('content')

<style>
#chartdiv {
  width: 100%;
  height: 500px;
}

</style>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Capaian Kinerja</h1>
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
    <div class="row col-12">
    <!-- PIE CHART -->
            <div class="card card-primary col-12">
              <div class="card-header ">
                <h3 class="card-title">Kinerja Bulan ini</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <div class="card-footer text-center">
                   <h6> 300/400 </h6>
                   <h6> Silahkan Input Aktivitas Anda untuk Mencapai Target</h6>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
    <!-- /.row (main row) -->
    <div class="card">
              <div class="card-header">
                <h3 class="card-title">Kinerja Bulan Lalu</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div id="chartdiv"></div>
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

    var donutData        = {
      labels: [
          'Tercapai','Belum Tercapai',
      ],
      datasets: [
        {
          data: [300,100],
          backgroundColor : ['#3c8dbc', '#d2d6de'],
        }
      ]
    }
    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData        = donutData;
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions
    })


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


    // <!-- Chart Bar -->
am5.ready(function() {

// Create root element
// https://www.amcharts.com/docs/v5/getting-started/#Root_element
var root = am5.Root.new("chartdiv");


// Set themes
// https://www.amcharts.com/docs/v5/concepts/themes/
root.setThemes([
  am5themes_Animated.new(root)
]);


// Create chart
// https://www.amcharts.com/docs/v5/charts/xy-chart/
var chart = root.container.children.push(am5xy.XYChart.new(root, {
  panX: true,
  panY: true,
  wheelX: "panX",
  wheelY: "zoomX",
  pinchZoomX:true
}));

// Add cursor
// https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
cursor.lineY.set("visible", false);


// Create axes
// https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
var xRenderer = am5xy.AxisRendererX.new(root, { minGridDistance: 30 });
xRenderer.labels.template.setAll({
  rotation: -90,
  centerY: am5.p50,
  centerX: am5.p100,
  paddingRight: 15
});

var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
  maxDeviation: 0.3,
  categoryField: "country",
  renderer: xRenderer,
  tooltip: am5.Tooltip.new(root, {})
}));

var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
  maxDeviation: 0.3,
  renderer: am5xy.AxisRendererY.new(root, {})
}));


// Create series
// https://www.amcharts.com/docs/v5/charts/xy-chart/series/


var yAxis = chart.yAxes.push(
  am5xy.ValueAxis.new(root, {
    min: 0,
    max: 100,
    strictMinMax: true,
    renderer: am5xy.AxisRendererY.new(root, {})
  })
);

var series = chart.series.push(am5xy.ColumnSeries.new(root, {
  name: "Series 1",
  xAxis: xAxis,
  yAxis: yAxis,
  valueYField: "value",
  sequencedInterpolation: true,
  categoryXField: "country",
  tooltip: am5.Tooltip.new(root, {
    labelText:"{valueY}"
  })
}));


series.columns.template.setAll({ cornerRadiusTL: 5, cornerRadiusTR: 5 });
series.columns.template.adapters.add("fill", function(fill, target) {
  return chart.get("colors").getIndex(series.columns.indexOf(target));
});

series.columns.template.adapters.add("stroke", function(stroke, target) {
  return chart.get("colors").getIndex(series.columns.indexOf(target));
});


// Set data
var data = [{
  country: "Januari 2022",
  value: 100
}, {
  country: "Desember 2021",
  value: 90
}, {
  country: "November 2021",
  value: 0
}, {
  country: "Oktober 2021",
  value: 0
}, {
  country: "September 2021",
  value: 40
}, {
  country: "Agustus 2021",
  value: 30
}  ,{
  country: "Juli 2021",
  value: 50
}, {
  country: "Juni 2021",
  value: 0
}, {
  country: "Mei 2021",
  value: 20
}, {
  country: "April 2021",
  value: 40
}];

xAxis.data.setAll(data);
series.data.setAll(data);


// Make stuff animate on load
// https://www.amcharts.com/docs/v5/concepts/animations/
series.appear(1000);
chart.appear(1000, 100);

}); // end am5.ready()


</script>

@endsection

