@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Profile</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
            <li class="breadcrumb-item active">Profile</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
      <!--end row-->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
<div class="container-fluid">
    <!-- /.row -->
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
                    <p class="text-muted">{{Auth::user()->name}}</p>
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
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">File Kepegawaian</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
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
                                <input type="text" id="disabledTextInput" class="form-control" placeholder="{{Auth::user()->name}}">
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
                  <!-- /.tab-pane -->
                <div class="tab-pane" id="timeline">
                    <div class="col-bg-12">
                    <label >KTP</label>
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="validatedCustomFile" required>
                                    <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                    <div class="invalid-feedback">Example invalid custom file feedback
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <button class="btn btn-primary" type="submit"> Submit</button>
                            </div>
                            <div class="col-sm-2">
                                <button class="btn btn-primary fa fa-eye" type="submit"> View</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-bg-12">
                    <label class="form-label" >STR</label>
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="validatedCustomFile" required>
                                    <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                    <div class="invalid-feedback">Example invalid custom file feedback
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <button class="btn btn-primary" type="submit"> Submit</button>
                            </div>
                            <div class="col-sm-2">
                                <button class="btn btn-primary  fa fa-eye" type="submit"> View</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-bg-12">
                    <label class="form-label" >SIP</label>
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="validatedCustomFile" required>
                                    <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                    <div class="invalid-feedback">Example invalid custom file feedback
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <button class="btn btn-primary" type="submit"> Submit</button>
                            </div>
                            <div class="col-sm-2">
                                <button class="btn btn-primary  fa fa-eye" type="submit"> View</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-bg-12">
                    <label class="form-label" >Ijazah</label>
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="validatedCustomFile" required>
                                    <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                    <div class="invalid-feedback">Example invalid custom file feedback
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <button class="btn btn-primary" type="submit"> Submit</button>
                            </div>
                            <div class="col-sm-2">
                                <button class="btn btn-primary  fa fa-eye" type="submit"> View</button>
                            </div>
                        </div>
                  </div>
                  <div class="col-bg-12">
                  <label class="form-label" >KK</label>
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="validatedCustomFile" required>
                                    <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                    <div class="invalid-feedback">Example invalid custom file feedback
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <button class="btn btn-primary" type="submit"> Submit</button>
                            </div>
                            <div class="col-sm-2">
                                <button class="btn btn-primary  fa fa-eye" type="submit"> View</button>
                            </div>
                        </div>
                    </div>
                </div>
                  <!-- /.tab-pane -->
                <div class="tab-pane" id="settings">
                    <form class="form-horizontal">
                    <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputName" placeholder="Name">
                            </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                            </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputName2" placeholder="Name">
                            </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                            </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                            </div>
                    </div>
                    <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                            <div class="checkbox">
                            <label>
                                <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                            </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                    </div>
                    </form>
                </div>
                <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div><!-- /.card -->
          </div><!-- /.col -->
        </div><!-- /.row -->


    <!-- /.row (main row) -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
@section('script')
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
@endsection
