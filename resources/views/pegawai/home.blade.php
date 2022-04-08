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
      <div class="row">
        <div class="col-sm-12">
          <div class="card bg-info rounded">
              <div class="row card-body ">
                 <div class="col-sm-6">
                    <h5 class="card-title"><input type="date" class="form-control bg-white" style="opacity: 0.5"></h5>
                    <br/><br/><br/><br/><br/><br/>
                    <p class="card-text"><h2>Good Day,   
                    {{-- Ambil nama depan --}}
                    @php
                    $name = Auth::user()->name;
                    $name = explode(" ", $name);
                    @endphp {{ $name[0] }} </h2></p>
                    <p class="card-text">Have a nice day!</p>
                    
                  </div>
                  <div class="col-sm-6">
                    <lottie-player src="https://assets3.lottiefiles.com/packages/lf20_pzprncar.json"  background="transparent"  speed="1" loop  autoplay style="height:400px;"></lottie-player>
                    {{-- <img src="{{asset('img/hello.png')}}" alt="doctor" height="250"/> --}}
                  </div>
              </div>
          </div>
        </div>
      </div><!-- end row -->

      <!--row -->
      <div class="row">
        <div class="col-md-4 mb-3">
          <div class="card bg-info rounded h-100">
            <div class="row card-body">
              <div class="col-6 col-sm-6">
                <h5 class="card-title">
                  <lottie-player src="https://assets2.lottiefiles.com/packages/lf20_fgltupfx.json"  background="transparent"  speed="1"  style="width: 150px; height: 150px;"  loop  autoplay></lottie-player>
                </h5>
              </div>
              <div class="col-6 col-sm-6">
                <h2 class="py-3">Birthday Today!</h2>
              </div>
              
            </div>
            
            <div class="card-body">
              None.
            </div>
          </div>
        </div>

        <div class="col-md-4 mb-3">
          <div class="card bg-info rounded h-100">
            <div class="row card-body">
              <div class="col-6 col-sm-6">
                <h5 class="card-title">
                  <lottie-player src="https://assets10.lottiefiles.com/packages/lf20_x9h8ar8l.json"  background="transparent"  speed="1"  style="width: 130px; height: 130px;"  loop autoplay></lottie-player>
                </h5>
              </div>
              <div class="col-6 col-sm-6">
                <h2 class="py-3">Cuti</h2>
              </div>
              
            </div>
            
            <div class="card-body">
              None.
            </div>
          </div>
        </div>

        <div class="col-md-4 mb-3">
          <div class="card bg-info rounded h-100">
            <div class="row card-body">
              <div class="col-6 col-sm-6">
                <h5 class="card-title">
                  <lottie-player src="https://assets8.lottiefiles.com/private_files/lf30_zzItmF.json"  background="transparent"  speed="1"  style="width: 170px; height: 170px;"  loop  autoplay></lottie-player>
                </h5>
              </div>
              <div class="col-6 col-sm-6">
                <h2 class="py-3">Sakit / Ijin</h2>
              </div>
              
            </div>
            
            <div class="card-body">
              None.
            </div>
          </div>
        </div>
      </div><!--end row-->
      {{-- skp --}}
      <div class="row">
        <div class="col-sm-12">
          <div class="card bg-info rounded">
              <div class="row card-body ">
                 <div class="col-sm-4">
                    <h5 class="card-title"></h5>
                    <lottie-player src="https://assets6.lottiefiles.com/packages/lf20_nm1huacl.json"  background="transparent"  speed="1"  style="width: 200px; height: 200px;"  loop  autoplay></lottie-player>
                  </div>
                  <div class="col-sm-4">
                    <p class="card-text"><h3>STR </p>
                  </div>
                  <div class="col-sm-4">
                    <p class="card-text"><h3>SIP </p>
                  </div>
              </div>
          </div>
        </div>
      </div>
      {{-- end row --}}
      
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
            <div class="card-header">{{ __('Dashboard') }}</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                {{ __('Logged in as Pegawai') }}
            </div>
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
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
@endsection
