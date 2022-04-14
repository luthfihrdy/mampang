@extends('layouts.app')

@section('content')

<style>
.disable_section {
  pointer-events: none;
  opacity: 0.4;
}
</style>


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
                <b>+</b> Tambah User
            </button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <table id="example1" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Role</th>
                        <th>Nrk</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Fasyankes</th>
                        <th>Unit</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Admin</td>
                        <td>231355</td>
                        <td>Benazheer</td>
                        <td>bena@gmail.com</td>
                        <td>PKC Mampang Prapatan</td>
                        <td>Manajemen</td>
                        <td><button type="button" class="btn btn-warning btn-sm text-white" title="Detail" data-toggle="modal" data-target="#modal-detail"><i class="fa fa-info-circle"></button></td>
                    </tr>
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
<div class="modal-dialog modal-lg" style="max-width: 90%;height:100%;">
    <div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Tambah User</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-default">
              <div class="card-body p-0">
                <div class="bs-stepper">
                  <div class="bs-stepper-header" role="tablist">
                    <!-- your steps here -->
                    <div class="step" data-target="#logins-part">
                      <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                        <span class="bs-stepper-circle">1</span>
                        <span class="bs-stepper-label">Data Diri</span>
                      </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#information-part">
                      <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                        <span class="bs-stepper-circle">2</span>
                        <span class="bs-stepper-label">Informasi Kontak</span>
                      </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#dokumen-part">
                      <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                        <span class="bs-stepper-circle">3</span>
                        <span class="bs-stepper-label">Nomor Dokumen</span>
                      </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#posisi-part">
                      <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                        <span class="bs-stepper-circle">4</span>
                        <span class="bs-stepper-label">Posisi</span>
                      </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#tiga-part">
                      <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                        <span class="bs-stepper-circle">5</span>
                        <span class="bs-stepper-label">Pendidikan</span>
                      </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#empat-part">
                      <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                        <span class="bs-stepper-circle">6</span>
                        <span class="bs-stepper-label">Medis</span>
                      </button>
                    </div>
                  </div>
                  <div class="bs-stepper-content">
                    <!-- your steps content here -->
                    <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                      <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control" placeholder="Benazheer Salsabila">
                      </div>
                      <div class="form-group">
                        <label>Nama dengan Gelar</label>
                        <input type="text" class="form-control" placeholder="Benazheer Salsabila, A.md">
                      </div>
                      <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select class="custom-select" name="jk" id="jk">
                            <option value="Laki laki">L</option>
                            <option value="Perempuan">P</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Email address</label>
                        <input type="email" class="form-control" placeholder="Enter email">
                      </div>
                      <div class="form-group">
                        <label>NRK</label>
                        <input type="text" class="form-control" placeholder="XXXXXX">
                      </div>
                      <div class="form-group">
                        <label>ID/NI/NRP</label>
                        <input type="text" class="form-control" placeholder="XXXXXXXXXXx">
                      </div>
                      <div class="form-group">
                        <label>Tempat Lahir</label>
                        <input type="text" class="form-control" placeholder="Jakarta">
                      </div>
                      <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" class="form-control">
                      </div>
                      <button class="btn btn-primary" onclick="stepper.next()">Next</button>
                    </div>
                    <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                      <div class="form-group">
                        <label>No. Telp</label>
                        <input type="number" class="form-control" placeholder="08XXXXXXXXXX">
                      </div>
                      <div class="form-group">
                        <label>Provinsi</label>
                        <input type="text" class="form-control" placeholder="Jakarta">
                      </div>
                      <div class="form-group">
                        <label>Kota</label>
                        <input type="text" class="form-control" placeholder="Jakarta">
                      </div>
                      <div class="form-group">
                        <label>Kecamatan</label>
                        <input type="text" class="form-control" placeholder="Jakarta">
                      </div>
                      <div class="form-group">
                        <label>Kelurahan</label>
                        <input type="text" class="form-control" placeholder="Jakarta">
                      </div>
                      <div class="form-group">
                        <label>Alamat</label>
                        <textarea  class="form-control" rows="2"></textarea>
                      </div>
                      <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                      <button class="btn btn-primary" onclick="stepper.next()">Next</button>
                    </div>
                    <div id="dokumen-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                      <div class="form-group">
                        <label>NIK</label>
                        <input type="text" class="form-control" placeholder="32XXXXXXXXXXXXX">
                      </div>
                      <div class="form-group">
                        <label>BPJS Kesehatan</label>
                        <input type="number" class="form-control" placeholder="123456">
                      </div>
                      <div class="form-group">
                        <label>BPJS Ketenagakerjaan</label>
                        <input type="number" class="form-control" placeholder="123456">
                      </div>
                      <div class="form-group">
                        <label>NPWP</label>
                        <input type="number" class="form-control" placeholder="123456">
                      </div>
                      <div class="form-group">
                        <label>Nomor Rekening</label>
                        <input type="number" class="form-control" placeholder="000000">
                      </div>
                      <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                      <button class="btn btn-primary" onclick="stepper.next()">Next</button>
                    </div>
                    <div id="posisi-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                      <div class="form-group">
                        <label>Jabatan</label>
                        <input type="text" class="form-control" placeholder="000000">
                      </div>
                      <div class="form-group">
                        <label>Unit Kerja</label>
                        <input type="text" class="form-control" placeholder="000000">
                      </div>
                      <div class="form-group">
                        <label>Formasi Jabatan</label>
                        <input type="text" class="form-control" placeholder="000000">
                      </div>
                      <div class="form-group">
                        <label>Jenis Jabatan</label>
                        <input type="text" class="form-control" placeholder="">
                      </div>
                      <div class="form-group">
                        <label>Status Pegawai</label>
                        <input type="text" class="form-control" placeholder="">
                      </div>
                      <div class="form-group">
                        <label>Rank</label>
                        <input type="text" class="form-control" placeholder="">
                      </div>
                      <div class="form-group">
                        <label>Group</label>
                        <input type="text" class="form-control" placeholder="">
                      </div>
                      <div class="form-group">
                        <label>TMT</label>
                        <input type="date" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>TMT Akhir</label>
                        <input type="date" class="form-control">
                      </div>
                      <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                      <button class="btn btn-primary" onclick="stepper.next()">Next</button>
                    </div>
                    <div id="tiga-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                      <div class="form-group">
                        <label>Jenjang</label>
                        <select class="custom-select" name="jenjang" id="jenjang">
                            <option value="D1">D1</option>
                            <option value="D2">D2</option>
                            <option value="D3">D3</option>
                            <option value="D4">D4</option>
                            <option value="S1">S1</option>
                            <option value="S2">S2</option>
                            <option value="S3">S3</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Pendidikan</label>
                        <input type="text" class="form-control" placeholder="Teknik Informatika">
                      </div>
                      <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                      <button class="btn btn-primary" onclick="stepper.next()">Next</button>
                    </div>
                    <div id="empat-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="medisCheck" onclick="enableMedis()">
                            <label class="form-check-label">
                                Non Medis
                            </label>
                        </div>
                        <div id="medis" class="form-group">
                            <div class="form-group">
                                <label for="strno">STR</label>
                                <input name="strno" type="number" class="form-control" placeholder="123456789123456">
                            </div>
                            <div class="form-group">
                                <label for="terbitstr">Tanggal Terbit STR</label>
                                <input name="terbitstr" type="date" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="berakhirstr">Tanggal Berakhir STR</label>
                                <input name="berakhirstr" type="date" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="sipno">SIP</label>
                                <input name="sipno" type="number" class="form-control" placeholder="123456789123456">
                            </div>
                            <div class="form-group">
                                <label for="terbitsip">Tanggal Terbit SIP</label>
                                <input name="terbitsip" type="date" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="berakhirsip">Tanggal Berakhir SIP</label>
                                <input name="berakhirsip" type="date" class="form-control">
                            </div>
                        </div>
                      {{-- <button class="btn btn-primary" onclick="stepper.next()">Next</button> --}}
                      <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                      <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body --> 
            </div>
            <!-- /.card -->
{{--    
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
    </form> --}}

    </div>
    </div>
    </div>
    <!-- /.modal-content -->
</div>
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

    <!-- Modal Detail -->
    <div class="modal fade bd-example-modal-lg" id="modal-detail" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <!-- Main row -->
        <div class="mx-5 my-5">
            <div class="row">
                <div class="col-md-3">
                <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                src="{{asset('img/logo.png')}}"
                                alt="User profile picture">
                            </div>
                            <h3 class="profile-username text-center">
                            {{Auth::user()->name}}</h3>
                            <p class="text-muted text-center">Software Engineer</p>
                        </div>
                    <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <!-- Box Informasi Kontak -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Informasi Kontak</h3>
                        </div>
                    <!-- /.card-header -->
                        <div class="card-body">
                            <strong><i class="fas fa-user"></i> Nama Lengkap</strong>
                            <p class="text-muted">  
                                {{-- Ambil nama --}}
                                {{Auth::user()->name}}</p>
                            <hr>
                            {{-- Email --}}
                            <strong><i class="fas fa-at"></i> Email</strong>
                            <p class="text-muted">bena@gmail.com</p>
                            <hr>
                            {{-- No Hp --}}
                            <strong><i class="fas fa-phone mr-1"></i> No. Telp</strong>
                            <p class="text-muted">08455156565</p>
                            <hr>
                            {{-- Alamat --}}
                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>
                            <p class="text-muted">Alamat</p>
                            <p class="text-muted">Kelurahan</p>
                            <p class="text-muted">Kecamatan</p>
                            <p class="text-muted">Kota</p>
                            <p class="text-muted">Provinsi</p>
                            <hr>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Data Diri</a></li>
                            <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Edit Data</a></li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="activity">
                            {{-- Data Diti --}}
                            <fieldset disabled>
                                <div class= "col-bg-12">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="disabledTextInput" class="form-label">Nama Lengkap Dengan Gelar</label>
                                            <input type="text" id="disabledTextInput" class="form-control" placeholder="
                                            {{Auth::user()->name}}">
                                        </div>
                                        <div class="mb-3 col-sm-6">
                                            <label for="disabledTextInput" class="form-label">NIK</label>
                                            <input type="text" id="disabledTextInput" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class= "col-bg-12">
                                        <div class="row">
                                            <div class="mb-3 col-sm-6">
                                                <label for="disabledTextInput" class="form-label">NRK</label>
                                                <input type="text" id="disabledTextInput" class="form-control" placeholder="">
                                            </div>
                                            <div class="mb-3 col-sm-6">
                                                <label for="disabledTextInput" class="form-label">ID/NIP/NRP</label>
                                                <input type="text" id="disabledTextInput" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                </div>
                        {{-- Medis --}}
                                <div class="row">
                                    <div class="col-6">
                                    <label class="form-label">Medis</label>
                                        <div class="list-group" id="list-tab" role="tablist">
                                        <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">STR</a>
                                        <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">SIP</a>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                    <label class="form-label"></label>
                                        <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">no str : 82392749237492847924 <br> terbit : 22/02/20 <br> berakhir : 22/02/20</div>
                                        <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">no sip : 82392749237492847924 <br> terbit : 22/02/20 <br> berakhir : 22/02/20</div>
                                        </div>
                                    </div>
                                    </div>
                                {{-- akhir medis --}}
                                    <div class= "col-bg-12">
                                            <div class="row">
                                                <div class="mb-3 col-sm-6">
                                                    <label for="disabledTextInput" class="form-label">Tempat Lahir</label>
                                                    <input type="text" id="disabledTextInput" class="form-control" placeholder="">
                                                </div>
                                                <div class="mb-3 col-sm-6">
                                                    <label for="disabledTextInput" class="form-label">Tanggal Lahir</label>
                                                    <input type="text" id="disabledTextInput" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                    </div>
                                    <div class= "col-bg-12">
                                            <div class="row">
                                                <div class="mb-3 col-sm-6">
                                                    <label for="disabledTextInput" class="form-label">Jenis Kelamin</label>
                                                    <input type="text" id="disabledTextInput" class="form-control" placeholder="">
                                                </div>
                                                <div class="mb-3 col-sm-6">
                                                    <label for="disabledTextInput" class="form-label">Pangkat</label>
                                                    <input type="text" id="disabledTextInput" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                    </div>
                                    <div class= "col-bg-12">
                                            <div class="row">
                                                <div class="mb-3 col-sm-6">
                                                    <label for="disabledTextInput" class="form-label">Jabatan</label>
                                                    <input type="text" id="disabledTextInput" class="form-control" placeholder="">
                                                </div>
                                                <div class="mb-3 col-sm-6">
                                                    <label for="disabledTextInput" class="form-label">Jenis Jabatan</label>
                                                    <input type="text" id="disabledTextInput" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                    </div>
                                    <div class= "col-bg-12">
                                            <div class="row">
                                                <div class="mb-3 col-sm-6">
                                                    <label for="disabledTextInput" class="form-label">Unit Kerja</label>
                                                    <input type="text" id="disabledTextInput" class="form-control" placeholder="">
                                                </div>
                                                <div class="mb-3 col-sm-6">
                                                    <label for="disabledTextInput" class="form-label">Jenis Unit</label>
                                                    <input type="text" id="disabledTextInput" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                    </div>
                                    <div class= "col-bg-12">
                                            <div class="row">
                                                <div class="mb-3 col-sm-6">
                                                    <label for="disabledTextInput" class="form-label">Nama Fasyankes</label>
                                                    <input type="text" id="disabledTextInput" class="form-control" placeholder="">
                                                </div>
                                                <div class="mb-3 col-sm-6">
                                                    <label for="disabledTextInput" class="form-label">Formasi Jabatan</label>
                                                    <input type="text" id="disabledTextInput" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                    </div>
                                    <div class= "col-bg-12">
                                            <div class="row">
                                                <div class="mb-3 col-sm-6">
                                                    <label for="disabledTextInput" class="form-label">Status Pegawai</label>
                                                    <input type="text" id="disabledTextInput" class="form-control" placeholder="">
                                                </div>
                                                <div class="mb-3 col-sm-6">
                                                    <label for="disabledTextInput" class="form-label">Golongan</label>
                                                    <input type="text" id="disabledTextInput" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                    </div>
                                    <div class= "col-bg-12">
                                            <div class="row">
                                                <div class="mb-3 col-sm-6">
                                                    <label for="disabledTextInput" class="form-label">TMT</label>
                                                    <input type="text" id="disabledTextInput" class="form-control" placeholder="">
                                                </div>
                                                <div class="mb-3 col-sm-6">
                                                    <label for="disabledTextInput" class="form-label">TMT Berakhir</label>
                                                    <input type="text" id="disabledTextInput" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                    </div>
                            </fieldset>
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                    </div><!-- /.card -->
                </div><!-- /.col -->
                </div><!-- /.row -->
                </div>
            </div>
        </div>
    </div>


@endsection

@section('script')

<!-- BS-Stepper -->
<script src="{{asset('plugins/bs-stepper/js/bs-stepper.min.js')}}"></script>
<script>
    //disable non medis
    function enableMedis() {
        if (document.getElementById("medisCheck").checked) {
            document.getElementById("medis").classList.add('disable_section')
        } else {
            document.getElementById("medis").classList.remove('disable_section')
  }
    }

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

    $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "dom": 'Bfrtip',
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });

  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })
    
</script>
@endsection
