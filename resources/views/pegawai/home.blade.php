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
                 <div class="col-sm-8">
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
                  <div class="col-sm-4">
                    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                    <lottie-player src="https://assets3.lottiefiles.com/packages/lf20_pzprncar.json"  background="transparent"  speed="1" loop  autoplay style="height:350px;"></lottie-player>
                    {{-- <img src="{{asset('img/hello.png')}}" alt="doctor" height="250"/> --}}
                  </div>
              </div>
          </div>
        </div>
      </div><!-- end row -->
      <!-- row -->
      <div class="row">
        <div class="col-md-4">
          <div class="card bg-info rounded">
              <div class="row card-body">
                 <div class="col-sm-8">
                    <h5 class="card-title">
                    {{-- <input type="date" class="form-control bg-white" style="opacity: 0.5"></h5> --}}
                    <br/><br/><br/><br/><br/><br/>
                    <p class="card-text"><h2>Birthday Today! </h2></p>
                    <p class="card-text">Have a nice day!</p>
                  </div>
                  <div class="col-sm-4">
                    <img class="img-fluid" src="{{asset('img/hello.png')}}" alt="doctor" height="50"/>
                  </div>
              </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card bg-info rounded">
              <div class="row card-body">
                 <div class="col-sm-12">
                    <h5 class="card-title">
                    {{-- <input type="date" class="form-control bg-white" style="opacity: 0.5"></h5> --}}
                    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                    <lottie-player src="https://assets8.lottiefiles.com/private_files/lf30_zzItmF.json"  background="transparent"  speed="1"  style="width: 180px; height: 180px;"  loop  autoplay></lottie-player>
                    <br/><br/><br/>
                    <p class="card-text"><h2>Cuti </h2></p><br/>
                    <p class="card-text">None.</p>
                    </div>
              </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card bg-info rounded">
              <div class="row card-body">
                 <div class="col-sm-8">
                    <h5 class="card-title">
                    {{-- <input type="date" class="form-control bg-white" style="opacity: 0.5"></h5> --}}
                    <br/><br/><br/><br/><br/><br/>
                    <p class="card-text"><h2>Sakit / Izin</h2></p>
                    <p class="card-text">Have a nice day!</p>
                  </div>
                  <div class="col-sm-4">
                    <img class="img-fluid" src="{{asset('img/hello.png')}}" alt="doctor" height="50"/>
                  </div>
              </div>
          </div>
        </div>
        
      </div><!-- end row -->
      
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
