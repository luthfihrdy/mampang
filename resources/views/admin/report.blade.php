@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Report</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
            <li class="breadcrumb-item active">Report</li>
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
                <form action="#" id="filterasset">
                <div class="row">
                    
                    <div class="col-3">
                        <select class="custom-select" name="user_id" id="selectPegawai" onchange="table_reload()">
                            <option value="0">Pilih Pegawai</option>
                        </select>
                    </div>
                    <div class="col-3">
                        <select class="custom-select" id="selectTime" onchange="setTime()">
                            <option>Pilih Waktu</option>
                            <option value="week">1 Minggu Terakhir</option>
                            <option value="month">1 Bulan Terakhir</option>
                        </select>
                    </div>
                    <div class="col-3">
                        <input type="date" class="form-control" name="awal" id="tgl_awal" onchange="table_reload()">
                        {{-- <select class="custom-select" name="time" onchange="table_reload()">
                            <option>Pilih Waktu</option>
                            <option value="weeks">7 Hari Terakhir</option>
                            <option value="month">1 Bulan Terakhir</option>
                        </select> --}}
                    </div>
                    <div class="col-3">
                        <div class="row">
                            <div class="col-2 align-center"><span>To : </span></div>
                            <div class="col"><input type="date" class="form-control" name="akhir" id="tgl_akhir" onchange="table_reload()"> </div>
                            
                        </div>
                        
                    </div>
                    
                </div>
                </form>
                
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
                        {{-- <th>Aksi</th> --}}
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
@endsection

@section('script')

<script>
    $(document).ready(function(){
    dataUser(); //manggil method datauser()
    //setTime();
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
    ajax: "{{ route('admin.report_get')}}",
    columns: [
        // { data: 'IdType', name: 'IdType' },
        {
            data: 'name',
            name: 'name'
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
        // {
        //     data: 'id',
        //     //name: 'id'
        //     render: function (data, type, row) {
        //         if(row.status == 'Approved' || row.status == 'Rejected') {
        //             let buttonApprove = '<button type="button" class="ml-2 btn btn-success btn-sm disabled" onclick="buttonApprove(\'' + data + '\')"><i class="fas fa-check"></i></button>'
        //             let buttonReject = '<button type="button" class="ml-2 btn btn-danger btn-sm disabled" onclick="buttonReject(\'' + data + '\')"><i class="fa fa-times"></i></button>'
        //             return buttonApprove + buttonReject;
        //         }
        //         if(row.status == 'Waiting') {
        //             let buttonApprove = '<button type="button" class="ml-2 btn btn-success btn-sm" onclick="buttonApprove(\'' + data + '\')"><i class="fas fa-check"></i></button>'
        //             let buttonReject = '<button type="button" class="ml-2 btn btn-danger btn-sm" onclick="buttonReject(\'' + data + '\')"><i class="fa fa-times"></i></button>'
        //             return buttonApprove + buttonReject;
        //         }//let buttonApprove = '<button href="#" class="text-success ml-2 disabled" onclick="buttonApprove(\'' + data + '\')"><i class="fas fa-check"></i></button>';
        //         //return buttonApprove + buttonReject;
        //     }
        // }
        ]
});

});

function table_reload(){
    // console.log('here');
    var filter_asset = $('#filterasset').serialize();
    dTable.ajax.url("{{ url('/') }}/admin/report/filter?"+filter_asset).load();
    console.log(filter_asset);
}

function dataUser() {
    $.ajax({
            type: "GET",
            url: "{{route('admin.get_user')}}",
            success: function (data) {
                $.each(data, function (index, value) {
                    $('#selectPegawai').append('<option id=' + value.id + ' value=' + value.id +
                        '>' + value.name + '</option>')
                });
               
            }
        });
}

function setTime() {
    let now = new Date();
    let waktu = document.getElementById("selectTime").value;
    //alert(waktu)
    
    if(waktu == 'week') {
        let lastweek = new Date(now.getTime() - 7 * 24 * 60 * 60 * 1000);
        let convert1 = lastweek.toISOString().split('T')[0]
        let convert2 = now.toISOString().split('T')[0]
        document.getElementById("tgl_awal").value = convert1;
        document.getElementById("tgl_akhir").value = convert2;

    }else if(waktu == 'month') {
        let lastmonth = new Date(now.getTime() - 30 * 24 * 60 * 60 * 1000);
        let convert1 = lastmonth.toISOString().split('T')[0]
        let convert2 = now.toISOString().split('T')[0]
        document.getElementById("tgl_awal").value = convert1;
        document.getElementById("tgl_akhir").value = convert2;
    }
    
    table_reload();
    
    // let convert2 = now.toISOString().split('T')[0]
    // document.getElementById("tgl_awal").value = convert1;
    // document.getElementById("tgl_akhir").value = convert2;
}
</script>

@endsection