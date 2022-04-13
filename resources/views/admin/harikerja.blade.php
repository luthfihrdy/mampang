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
                    <tr>
                        <td>1.</td>
                        <td>2022</td>
                        <td>Februari</td>
                        <td>26</td>
                        <td><button type="button" data-toggle="modal" data-target="#modal-edit" class="btn btn-warning text-white btn-sm" title="edit"><i class="fa fa-pen"></i></button>
                        <button type="button" class="btn btn-danger btn-sm" title="delete"><i class="fa fa-trash"></i></button></td>
                    </tr>
                </thead>
                <tbody>
                  
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
                        <div class="input-group mb-1 ">
                            <select class="custom-select form-control" id="date-dropdown">
                            </select>
                        </div>
                    </div>
                    <div class="input-group mb-1">
                        <label>Bulan</label>
                        <div class="input-group mb-1">
                            <select class="custom-select form-control" placeholder="Bulan">
                                <option name="Januari" value="Jan">Januari</option>
                                <option name="Februari" value="Feb">Februari</option>
                                <option name="Maret" value="Mar">Maret</option>
                                <option name="April" value="Apr">April</option>
                                <option name="Mei" value="Mei">Mei</option>
                                <option name="Juni" value="Jun">Juni</option>
                                <option name="Juli" value="Jul">Juli</option>
                                <option name="Agustus" value="Agu">Agustus</option>
                                <option name="September" value="Sep">September</option>
                                <option name="Oktober" value="Okt">Oktober</option>
                                <option name="November" value="Nov">November</option>
                                <option name="Desember" value="Des">Desember</option>
                            </select>
                        </div>
                    </div>
                    <div class="input-group mb-1">
                        <label>Jumlah Hari</label>
                        <div class="input-group mb-1">
                            <input type="number" class="form-control @error('jmlhari') is-invalid @enderror" name="jmlhari" value="{{ old('jmlhari') }}" required autocomplete="jmlhari" autofocus placeholder="Jumlah Hari" id="jmlhari">
                        </div>
                    </div>
                </form>
            </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal" id="close-modal">Close</button>
                    <button type="submit" class="btn btn-primary" ><span class="fas fa-save"></span> Simpan</button>
                </div>
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
                <form method="POST" action="" id="form-create">
                @csrf
                    <div class="input-group mb-1">
                        <label>Tahun</label>
                        <div class="input-group mb-1 ">
                            <select class="custom-select form-control" id="date-dropdown" value="{{ old('tahun')}}">
                            </select>
                        </div>
                    </div>
                    <div class="input-group mb-1">
                        <label>Bulan</label>
                        <div class="input-group mb-1">
                            <select class="custom-select form-control" value="{{ old('bulan')}}" placeholder="Bulan">
                                <option name="Januari" value="Jan">Januari</option>
                                <option name="Februari" value="Feb">Februari</option>
                                <option name="Maret" value="Mar">Maret</option>
                                <option name="April" value="Apr">April</option>
                                <option name="Mei" value="Mei">Mei</option>
                                <option name="Juni" value="Jun">Juni</option>
                                <option name="Juli" value="Jul">Juli</option>
                                <option name="Agustus" value="Agu">Agustus</option>
                                <option name="September" value="Sep">September</option>
                                <option name="Oktober" value="Okt">Oktober</option>
                                <option name="November" value="Nov">November</option>
                                <option name="Desember" value="Des">Desember</option>
                            </select>
                        </div>
                    </div>
                    <div class="input-group mb-1">
                        <label>Jumlah Hari</label>
                        <div class="input-group mb-1">
                            <input type="number" value="{{ old('jmlhari')}}" class="form-control @error('jmlhari') is-invalid @enderror" name="jmlhari" value="{{ old('jmlhari') }}" required autocomplete="jmlhari" autofocus placeholder="Jumlah Hari" id="jmlhari">
                        </div>
                    </div>
                </form>
            </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal" id="close-modal">Close</button>
                    <button type="submit" class="btn btn-primary" ><span class="fas fa-save"></span> Simpan</button>
                </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


@endsection


@section('script')
<script>
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
