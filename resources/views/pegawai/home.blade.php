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
        <div class="col-lg-12">
          <div class="card bg-info rounded">
              <div class="row card-body">
                 <div class="col-sm-8">
                    <h5 class="card-title"><input type="date" class="form-control bg-white" style="opacity: 0.5"></h5>
                    <br/><br/><br/><br/><br/><br/>
                    <p class="card-text"><h2>Good Day Mr. blalblalb</h2></p>
                    <p class="card-text">Have a nice day!</p>
                  </div>
                  <div class="col-sm-4">
                    <img src="{{asset('img/hello.png')}}" alt="doctor" height="250"/>
                  </div>
                  
              </div>

          </div>
      </div>
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
