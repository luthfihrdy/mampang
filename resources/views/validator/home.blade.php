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
          <div class="col-6">
            <!-- small card -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">input</sup></h3>

                <p>Aktivitas</p>
              </div>
              <div class="icon">
                <i class="fas fa-file"></i>
              </div>
              <a href="{{route('validator.aktivitas')}}" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-6">
            <!-- small card -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">input</sup></h3>

                <p>SKP Tahunan</p>
              </div>
              <div class="icon">
                <i class="fas fa-book"></i>
              </div>
              <a href="{{route('validator.skpvalidasi')}}" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
        </div>
        <!-- /.row -->

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

                {{ __('Logged in as Validator') }}
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
