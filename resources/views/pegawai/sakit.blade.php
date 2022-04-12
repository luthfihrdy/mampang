@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Ijin / Sakit</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
            <li class="breadcrumb-item active">Sakit</li>
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
                <b>+</b> Tambah Ijin / Sakit
            </button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <table id="myTable" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Tanggal Awal Ijin</th>
                        <th>Tanggal Awal Ijin</th>
                        <th>Waktu Cuti</th>
                        <th>Jenis Ijin</th>
                        <th>Alasan</th>
                        <th>Aksi</th>
                    </tr>
                    <tr>
                        <td>12/02/2022</td>
                        <td>14/02/2022</td>
                        <td>2 Hari</td>
                        <td>Ijin Tidak Masuk Bekerja</td>
                        <td>Acara Penting</td>
                        <td><button type="button" data-toggle="modal" data-target="#modal-detail" class="btn btn-warning text-white btn-sm" title="detail"><i class="fa fa-info-circle"></i></button>
                        <button type="button" class="btn btn-danger btn-sm" title="delete"><i class="fa fa-trash"></i></button></td>
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
/
<!-- Modal Insert -->
<div class="modal fade" id="modal-lg">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Ajukan Ijin / Sakit</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form method="POST" action="" id="form-create">
            @csrf
            <div class="form-group">
                    <label>Tanggal Mulai</label>
                    <div class="input-group mb-3">
                        <input id="mulai" type="date" class="form-control" name="cuti_mulai" value="{{ old('cuti_mulai') }}" required autocomplete="name" autofocus>
                    </div>
            </div>
            <div class="form-group">
                    <label>Tanggal Akhir</label>
                    <div class="input-group mb-3">
                        <input id="selesai" type="date" class="form-control" name="cuti_selesai" value="{{ old('cuti_selesai') }}" required autocomplete="name" autofocus>
                    </div>
            </div>
            <div class="form-group">
                <label> Jumlah Hari</label>
                <div class="input-group-mb3">
                    <input id="jumlah" class="form-control" type="text"  readonly>
                </div>
            </div>
            <div class="form-group">
                <label>Jenis Pengajuan</label>
                <div class="input-group mb-3">
                    <select class="custom-select" name="jcuti" id="jcuti">
                        <option value="1">Pengajuan Ijin Tidak Masuk Bekerja</option>
                        <option value="2">Pengajuan Ijin Sakit</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label> Alasan Ijin </label>
                <div class="input-group-mb3">
                    <textarea name="cuti_alasan" id="" class="form-control" rows="3">{{ old('cuti_alasan') }}</textarea>
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

<!-- Modal Detail-->
<div class="modal fade" id="modal-detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Detail Ijin / Sakit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <!-- /.col -->
          <div class="col-12">
            <div class="info-box bg-gradient-danger">
              <span class="info-box-icon"><i class="fas fa-ban"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Kasatpel/ Kapuskes</span>
                <span class="info-box-number">Data ditolak</span>
            </div>
            <!-- /.info-box -->
          </div>
          </div>
          <!-- /.col -->
          <div class="col-12">
            <div class="info-box bg-gradient-warning text-white">
              <span class="info-box-icon"><i class="fas fa-hourglass-half"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Kasubag</span>
                <span class="info-box-number">Data belum diverifikasi</span>
            </div>
            <!-- /.info-box -->
          </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection


@section('script')
<!--calendar Java script -->
<script type="text/javascript">              
 $(document).ready(function(){  

     $('#mulai').datepicker({
       format: "yyyy-mm-dd",
       onSelect: function(){
         cal()
       } 
     });   

     $('#selesai').datepicker({
       format: "yyyy-mm-dd",
       onSelect: function(){
         cal()
       } 
     });   

});   

function GetDays(){
    var dropdt = new Date(document.getElementById("selesai").value);
    var pickdt = new Date(document.getElementById("mulai").value);
    return parseInt((dropdt -(pickdt)) / (24 * 3600 * 1000))+1|| parseInt(1);                
}

function cal(){
    if(document.getElementById("mulai")){
        document.getElementById("jumlah").value=GetDays();
    }  

</script> 
@endsection
