@extends('layouts.app')

@section('content')

<!-- Content Header (Page header) -->
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
                <b>+</b> Tambah SKP
            </button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="table-responsive">
                    <table id="myTable" class="table table-bordered table-hover" width="100%">
                    <thead>
                        <tr>
                            <th>Tahun</th>
                            <th>Aktivitas</th>
                            <th>Jumlah target</th>
                            <th>Hasil target</th>
                            <th>Status</th>
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
            <h4 class="modal-title">Tambah SKP</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="" id="form-create">
                {{-- <input type="hidden" value="{{ csrf_token() }}" name="_token" /> --}}
                @csrf
                <div class="form-group">
                    <label>Tahun SKP</label>
                    <div class="input-group mb-3 ">
                        <select class="custom-select form-control" id="date-dropdown">
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label>Aktivitas</label>
                    <div class="input-group mb-3" >
                        <select class="form-control"  data-live-search="true" data-size="5" id="aktivitas" onchange="dataEfektif(this.value)" title="== Pilih Aktivitas ==">

                        {{-- @forelse($aktivitas as $data)
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
                        @endforelse --}}
                            
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label>Jumlah Target</label>
                    <div class="input-group mb-3">
                        <input type="number" class="form-control" >
                    </div>
                </div>
                <div class ="form-group">
                    <label>Hasil Target</label>
                    <div class="input-group mb-3" >
                        <select class="form-control selectpicker"  data-live-search="true" data-size="5" >
                        <option style= "width: 100px; white-space: wrap;" >Pilih Kegiatan</option>
                        </select>
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

