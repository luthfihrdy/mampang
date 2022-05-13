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
            <table id="myTable" class="table table-bordered table-hover">
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
                    {{-- <tr>
                        <td>Admin</td>
                        <td>231355</td>
                        <td>Benazheer</td>
                        <td>bena@gmail.com</td>
                        <td>PKC Mampang Prapatan</td>
                        <td>Manajemen</td>
                        <td><button type="button" class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#modal-detail"><i class="fa fa-eye"></i></button>
                      <button type="button" class="btn btn-warning btn-sm text-white"  data-toggle="modal" data-target="#modal-edit"><i class="fa fa-pen"></i></button></td>
                      </tr> --}}
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
                      <form method="POST" id="form-create">
                          @csrf
                      <div class="bs-stepper-content">
                          
                        <!-- your steps content here -->
                        <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                            
                          <div class="form-group">
                          <label>Photo</label>
                          <div class="row">
                            <div class="circle" style="border-radius: 100% !important;overflow: hidden;width: 128px;height: 128px;border: 2px solid rgba(255, 255, 255, 0.2);">
                                <img class="profile-pic" style="width: 128px;max-height: 128px;display:inline-block;" src="https://t3.ftcdn.net/jpg/03/46/83/96/360_F_346839683_6nAPzbhpSkIpb8pmAwufkC7c5eD7wYws.jpg">
                            </div>
                            <div class="p-image" style="top:167px;right:30px;color:#666666;transition: all .3s cubic-bezier(.175, .885, .32, 1.275);" >
                                <i class="fa fa-camera upload-button"  style="font-size: 1.2em;"></i>
                                  <input class="file-upload" style="display: none;" type="file" accept="image/*"/>
                            </div>
                          </div>
                          </div>
                          <div class="row">
                              <div class="col">
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" class="form-control" name="name" placeholder="Benazheer Salsabila">
                                </div>
                              </div>

                              <div class="col">
                                <div class="form-group">
                                    <label>Nama dengan Gelar</label>
                                    <input type="text" class="form-control" name="name_gelar" placeholder="Benazheer Salsabila, A.md">
                                </div>
                              </div>
                              <div class="col">
                                  <div class="form-group">
                                    <label>Role</label>
                                    <select class="form-control" name="role_id" >
                                        <option value="1">Administrator</option>
                                        <option value="2">Validator</option>
                                        <option value="3">Pegawai</option>
                                    </select>
                                    </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-3">
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select class="custom-select" name="gender" id="jk">
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                              </div>
                              <div class="col">
                                <div class="form-group">
                                    <label>Email address</label>
                                    <input type="email" class="form-control" name="email" placeholder="Enter email">
                                </div>
                              </div>
                              <div class="col">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Enter password">
                                </div>
                              </div>
                          </div>
                          
                          
                          <div class="row">
                              <div class="col">
                                <div class="form-group">
                                    <label>NRK</label>
                                    <input type="text" class="form-control" name="nrk" placeholder="XXXXXX">
                                </div>
                              </div>
                              <div class="col">
                                <div class="form-group">
                                    <label>ID/NIP/NRP</label>
                                    <input type="text" class="form-control" name="id_nip_nrp" placeholder="XXXXXXXXXXx">
                                </div>
                              </div>
                          </div>
                          
                          <div class="row">
                              <div class="col">
                                <div class="form-group">
                                    <label>Tempat Lahir</label>
                                    <input type="text" class="form-control" name="tempat_lahir" placeholder="Jakarta">
                                </div>
                              </div>
                              <div class="col">
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir" class="form-control">
                                </div>
                              </div>
                          </div>

                          <div class="row">
                              <div class="col-2">
                                <div class="form-group">
                                    <label>Status Nikah</label>
                                    <select name="status_nikah"  class="form-control">
                                        <option value="Lajang">Lajang</option>
                                        <option value="Menikah">Menikah</option>
                                    </select>
                                </div>
                              </div>
                              <div class="col-3">
                                <div class="form-group">
                                    <label>Jumlah Anak</label>
                                    <input type="number" class="form-control" name="anak" placeholder="Input Jumlah anak">
                                </div>
                              </div>
                              <div class="col">

                              </div>
                          </div>
                          
                          <span class="btn btn-primary float-right mb-3 ml-1" onclick="stepper.next()">Next</span>
                          <button type="button" class="btn btn-default float-right mb-3" data-dismiss="modal" id="close-modal">Close</button>
                        </div>
                        <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>No. Telp</label>
                                        <input type="number" class="form-control" name="no_telp" placeholder="08XXXXXXXXXX">
                                     </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Provinsi</label>
                                        <input type="text" class="form-control" name="provinsi" placeholder="Jakarta">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Kota</label>
                                        <input type="text" class="form-control" name="kota" placeholder="Jakarta">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Kecamatan</label>
                                        <input type="text" class="form-control" name="kecamatan" placeholder="Jakarta">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Kelurahan</label>
                                        <input type="text" class="form-control" name="kelurahan" placeholder="Jakarta">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea  class="form-control" name="alamat" rows="2"></textarea>
                                    </div>
                                </div>
                            </div>
                          
                          <span class="btn btn-primary float-right ml-1 mb-3" onclick="stepper.next()">Next</span>
                          <span class="btn btn-secondary float-right" onclick="stepper.previous()">Previous</span>
                          
                        </div>
                        <div id="dokumen-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>NIK</label>
                                        <input type="text" class="form-control" name="nik" placeholder="32XXXXXXXXXXXXX">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>BPJS Kesehatan</label>
                                        <input type="number" class="form-control" name="bpjs_kes" placeholder="123456">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>BPJS Ketenagakerjaan</label>
                                        <input type="number" class="form-control" name="bpjs_ket" placeholder="123456">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>NPWP</label>
                                        <input type="number" class="form-control" name="npwp" placeholder="123456">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Nomor Rekening</label>
                                        <input type="number" class="form-control" name="no_rek" placeholder="000000">
                                    </div>
                                </div>
                            </div>
                          
                          
                          <span class="btn btn-primary float-right ml-1 mb-3" onclick="stepper.next()">Next</span>
                          <span class="btn btn-secondary float-right" onclick="stepper.previous()">Previous</span>
                          
                        </div>
                        <div id="posisi-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Fasyankes</label>
                                        <input type="text" class="form-control" name="fasyankes" placeholder="Kec. Mampang Prapatan">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Jabatan</label>
                                        <input type="text" class="form-control" name="jabatan" placeholder="IT">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Unit Kerja</label>
                                        <input type="text" class="form-control" name="unit_kerja" placeholder="Management">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Formasi Jabatan</label>
                                        <input type="text" class="form-control" name="formasi_jabatan" placeholder="000000">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Jenis Jabatan</label>
                                        <input type="text" class="form-control" name="jenis_jabatan" placeholder="">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Status Pegawai</label>
                                        <input type="text" class="form-control" name="status_pegawai" placeholder="">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Rank</label>
                                        <input type="text" class="form-control" name="rank" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Group</label>
                                        <input type="text" class="form-control" name="group" placeholder="">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>TMT</label>
                                        <input type="date" class="form-control" name="tmt_awal">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>TMT Akhir</label>
                                        <input type="date" class="form-control" name="tmt_akhir">
                                    </div>
                                </div>
                            </div>                        

                          <span class="btn btn-primary float-right ml-1 mb-3" onclick="stepper.next()">Next</span>
                          <span class="btn btn-secondary float-right" onclick="stepper.previous()">Previous</span>
                          
                        </div>
                        <div id="tiga-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                          <div class="form-group">
                            <label>Jenjang</label>
                            <select class="custom-select" name="jenjang" id="jenjang">
                                <option value="SLTA/Sederajat">SLTA/Sederajat</option>
                                <option value="D1">D1</option>
                                <option value="D2">D2</option>
                                <option value="D3">D3</option>
                                <option value="D4">D4</option>
                                <option value="S1">S1</option>
                                <option value="S2">S2</option>
                                <option value="S3">S3</option>
                            </select>
                          </div>
                          <div class="row">
                              <div class="col">
                                    <div class="form-group">
                                        <label>Pendidikan</label>
                                        <input type="text" class="form-control" name="education" placeholder="Teknik Informatika">
                                    </div>
                              </div>
                              <div class="col">
                                <div class="form-group">
                                    <label>Tahun Tamat</label>
                                    <input type="number" class="form-control" name="tamat" placeholder="2021">
                                </div>
                              </div>
                          </div>
                          
                          <span class="btn btn-primary float-right ml-1 mb-3" onclick="stepper.next()">Next</span>
                          <span class="btn btn-secondary float-right" onclick="stepper.previous()">Previous</span>
                          
                        </div>
                        <div id="empat-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="medisCheck" onclick="enableMedis()">
                                <label class="form-check-label">
                                    Non Medis
                                </label>
                            </div>
                            <div id="medis" class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="strno">STR</label>
                                            <input name="str_no" type="number" class="form-control" placeholder="123456789123456">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="terbitstr">Tanggal Terbit STR</label>
                                            <input name="str_terbit" type="date" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="berakhirstr">Tanggal Berakhir STR</label>
                                            <input name="str_akhir" type="date" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="sipno">SIP</label>
                                            <input name="sip_no" type="number" class="form-control" placeholder="123456789123456">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="terbitsip">Tanggal Terbit SIP</label>
                                            <input name="sip_terbit" type="date" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="berakhirsip">Tanggal Berakhir SIP</label>
                                            <input name="sip_akhir" type="date" class="form-control">
                                        </div>
                                    </div>
                                </div>                                            
                            </div>
                          {{-- <button class="btn btn-primary" onclick="stepper.next()">Next</button> --}}
                          <button type="submit" class="btn btn-success float-right ml-1 mb-3">Submit</button>
                          <span class="btn btn-secondary float-right" onclick="stepper.previous()">Previous</span>
                        </form>
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

<!-- Modal Edit -->
<div class="modal fade" id="modal-edit">
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
                                <div class="bs-stepper" id="bs-stepper-2">
                                    <div class="bs-stepper-header" role="tablist">
                                        <!-- your steps here -->
                                        <div class="step" data-target="#data-part">
                                            <button type="button" class="step-trigger" role="tab" aria-controls="data-part" id="data-part-trigger">
                                                <span class="bs-stepper-circle">1</span>
                                                <span class="bs-stepper-label">Data Diri</span>
                                            </button>
                                        </div>
                                        <div class="line"></div>
                                        <div class="step" data-target="#informasi-part">
                                            <button type="button" class="step-trigger" role="tab" aria-controls="informasi-part" id="informasi-part-trigger">
                                                <span class="bs-stepper-circle">2</span>
                                                <span class="bs-stepper-label">Informasi Kontak</span>
                                            </button>
                                        </div>
                                        <div class="line"></div>
                                        <div class="step" data-target="#nodokumen-part">
                                            <button type="button" class="step-trigger" role="tab" aria-controls="nodokumen-part" id="nodokumen-part-trigger">
                                                <span class="bs-stepper-circle">3</span>
                                                <span class="bs-stepper-label">Nomor Dokumen</span>
                                            </button>
                                        </div>
                                        <div class="line"></div>
                                        <div class="step" data-target="#posisikerja-part">
                                            <button type="button" class="step-trigger" role="tab" aria-controls="posisikerja-part" id="posisikerja-part-trigger">
                                                <span class="bs-stepper-circle">4</span>
                                                <span class="bs-stepper-label">Posisi</span>
                                            </button>
                                        </div>
                                        <div class="line"></div>
                                        <div class="step" data-target="#pendidikan-part">
                                            <button type="button" class="step-trigger" role="tab" aria-controls="pendidikan-part" id="pendidikan-part-trigger">
                                                <span class="bs-stepper-circle">5</span>
                                                <span class="bs-stepper-label">Pendidikan</span>
                                            </button>
                                        </div>
                                        <div class="line"></div>
                                        <div class="step" data-target="#medis-part">
                                            <button type="button" class="step-trigger" role="tab" aria-controls="medis-part" id="medis-part-trigger">
                                                <span class="bs-stepper-circle">6</span>
                                                <span class="bs-stepper-label">Medis</span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="bs-stepper-content">
                                        <div id="data-part" class="content" role="tabpanel" aria-labelledby="data-part-trigger">
                                            
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
                                        <div id="informasi-part" class="content" role="tabpanel" aria-labelledby="informasi-part-trigger">
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
                                            <button class="btn btn-secondary" onclick="stepper.previous()">Previous</button>
                                            <button class="btn btn-primary" onclick="stepper.next()">Next</button>
                                        </div>
                                        <div id="nodokumen-part" class="content" role="tabpanel" aria-labelledby="nodokumen-part-trigger">
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
                                            <button class="btn btn-secondary" onclick="stepper.previous()">Previous</button>
                                            <button class="btn btn-primary" onclick="stepper.next()">Next</button>
                                        </div>
                                        <div id="posisijabatan-part" class="content" role="tabpanel" aria-labelledby="posisijabatan-part-trigger">
                                            <div class="form-group">
                                                <label>Jabatan</label>
                                                <input type="text" class="form-control" placeholder="IT">
                                            </div>
                                            <div class="form-group">
                                                <label>Unit Kerja</label>
                                                <input type="text" class="form-control" placeholder="Management">
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
                                            <button class="btn btn-secondary" onclick="stepper.previous()">Previous</button>
                                            <button class="btn btn-primary" onclick="stepper.next()">Next</button>
                                        </div>
                                        <div id="pendidikan-part" class="content" role="tabpanel" aria-labelledby="pendidikan-part-trigger">
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
                                            <button class="btn btn-secondary" onclick="stepper.previous()">Previous</button>
                                            <button class="btn btn-primary" onclick="stepper.next()">Next</button>
                                        </div>
                                        <div id="medis-part" class="content" role="tabpanel" aria-labelledby="medis-part-trigger">
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
                                        <button class="btn btn-secondary" onclick="stepper.previous()">Previous</button>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- /.modal edit -->

    <!-- Modal Detail -->
    <div class="modal fade bd-example-modal-lg" id="modal-detail" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Detail User</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <!-- Main row -->
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
                            <h3 class="profile-username text-center">{{Auth::user()->name}}</h3>
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
                            <p class="text-muted">value Alamat</p>
                            <p class="text-muted">value Kelurahan</p>
                            <p class="text-muted">value Kecamatan</p>
                            <p class="text-muted">value Kota</p>
                            <p class="text-muted">value Provinsi</p>
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
                                            <label class="form-label">Nama Lengkap Dengan Gelar</label>
                                            <input type="text"  class="form-control"  placeholder="{{Auth::user()->name}}">
                                        </div>
                                        <div class="mb-3 col-sm-6">
                                            <label  class="form-label">NIK</label>
                                            <input type="text" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class= "col-bg-12">
                                        <div class="row">
                                            <div class="mb-3 col-sm-6">
                                                <label  class="form-label">NRK</label>
                                                <input type="text" class="form-control" placeholder="">
                                            </div>
                                            <div class="mb-3 col-sm-6">
                                                <label class="form-label">ID/NIP/NRP</label>
                                                <input type="text" class="form-control" placeholder="">
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
                                                    <label  class="form-label">Tempat Lahir</label>
                                                    <input type="text" class="form-control" placeholder="">
                                                </div>
                                                <div class="mb-3 col-sm-6">
                                                    <label class="form-label">Tanggal Lahir</label>
                                                    <input type="text" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                    </div>
                                    <div class= "col-bg-12">
                                            <div class="row">
                                                <div class="mb-3 col-sm-6">
                                                    <label class="form-label">Jenis Kelamin</label>
                                                    <input type="text" class="form-control" placeholder="">
                                                </div>
                                                <div class="mb-3 col-sm-6">
                                                    <label class="form-label">Pangkat</label>
                                                    <input type="text" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                    </div>
                                    <div class= "col-bg-12">
                                            <div class="row">
                                                <div class="mb-3 col-sm-6">
                                                    <label class="form-label">Jabatan</label>
                                                    <input type="text" class="form-control" placeholder="">
                                                </div>
                                                <div class="mb-3 col-sm-6">
                                                    <label class="form-label">Jenis Jabatan</label>
                                                    <input type="text" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                    </div>
                                    <div class= "col-bg-12">
                                            <div class="row">
                                                <div class="mb-3 col-sm-6">
                                                    <label class="form-label">Unit Kerja</label>
                                                    <input type="text" class="form-control" placeholder="">
                                                </div>
                                                <div class="mb-3 col-sm-6">
                                                    <label class="form-label">Jenis Unit</label>
                                                    <input type="text" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                    </div>
                                    <div class= "col-bg-12">
                                            <div class="row">
                                                <div class="mb-3 col-sm-6">
                                                    <label class="form-label">Nama Fasyankes</label>
                                                    <input type="text" class="form-control" placeholder="">
                                                </div>
                                                <div class="mb-3 col-sm-6">
                                                    <label class="form-label">Formasi Jabatan</label>
                                                    <input type="text" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                    </div>
                                    <div class= "col-bg-12">
                                            <div class="row">
                                                <div class="mb-3 col-sm-6">
                                                    <label class="form-label">Status Pegawai</label>
                                                    <input type="text" class="form-control" placeholder="">
                                                </div>
                                                <div class="mb-3 col-sm-6">
                                                    <label class="form-label">Golongan</label>
                                                    <input type="text" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                    </div>
                                    <div class= "col-bg-12">
                                            <div class="row">
                                                <div class="mb-3 col-sm-6">
                                                    <label class="form-label">TMT</label>
                                                    <input type="text" class="form-control" placeholder="">
                                                </div>
                                                <div class="mb-3 col-sm-6">
                                                    <label class="form-label">TMT Berakhir</label>
                                                    <input type="text" class="form-control" placeholder="">
                                                </div>
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

    //profile pic
    // $(document).ready(function() {
    
    // });

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
            lengthChange: false, 
            autoWidth: false,
            dom: 'Bfrtip',
            buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
            columns: [
                // { data: 'IdType', name: 'IdType' },
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
                {
                    data: 'nrk',
                    name: 'nrk'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'fasyankes',
                    render: function(data, type, row) {
                        if(data == null) {
                            return '-';
                        }else {
                            return data;
                        }
                    }
                },
                {
                    data: 'unit_kerja',
                    render: function(data, type, row) {
                        if(data == null) {
                            return '-';
                        }else {
                            return data;
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
                        '<a href="#" class="text-primary" data-toggle="modal" data-target="#modal-edit" onclick="buttonEdit(\'' + data + '\');"><i class="fas fa-edit"></i></a>';
                            // '<button type="button" class="btn btn-success btn-rounded btn-icon" data-toggle="modal" data-placement="buttom" data-custom-class="tooltip-success" title="EDIT" data-target="#showModalUpdateLocation" style="margin-right:5px;" onclick="buttonEdit(\'' + data + '\');"><i style="font-size:1.5rem; margin-left:-7px;" class="ti-pencil-alt"></i></button>';
                        let buttonDelete = '<a href="#" class="text-danger ml-2" onclick="buttonDelete(\'' + data + '\')"><i class="fas fa-trash"></i></a>';
                        return buttonEdit + buttonDelete;
                    }
                }
            ],
            
        }).buttons().container().appendTo('#myTable_wrapper .col-md-6:eq(0)');

        var readURL = function(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('.profile-pic').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    
            $(".file-upload").on('change', function(){
                readURL(this);
            });
        
            $(".upload-button").on('click', function() {
            $(".file-upload").click();
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
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response.message,
                        showConfirmButton: false,
                        timer: 1500,
                        // footer: '<a href="">Why do I have this issue?</a>'
                    })
                    $('#close-modal').click();
                    setTimeout(function () {
                        location.reload()
                    }, 1500);
                    //dTable.ajax.reload();
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
            },
            error: function(data){
                var errors = data.responseJSON;
                console.log(errors);
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
                            setTimeout(function () {
                                location.reload()
                            }, 1500);
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

//     $(function () {
//     $("#example1").DataTable({
//       "responsive": true, "lengthChange": false, "autoWidth": false,
//       "dom": 'Bfrtip',
//       "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
//     }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
//   });

  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'));
    // window.stepper = new Stepper(document.querySelector('#bs-stepper-2'))
  })

  
  
    
</script>
@endsection
