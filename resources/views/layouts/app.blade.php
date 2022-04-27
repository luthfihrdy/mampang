<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PKC Mampang Prapatan</title>

  <!-- Bar -->
  <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
  <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
  <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

  <!-- Pie chart -->
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

  <!-- icon -->
  <link rel="icon" href="{{asset('img/logo.png')}}">

    <!-- BS Stepper -->
  <link rel="stylesheet" href="{{asset('plugins/bs-stepper/css/bs-stepper.min.css')}}">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('fontawesome-free/css/all.min.css')}}">
  
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('css/OverlayScrollbars.min.css')}}">
  <!-- summernote -->
  {{-- <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css"> --}}
  <!-- Sweet Alert -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.min.css">

  <!-- Datatables -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.5/datatables.min.css"/> 
  <link rel="stylesheet" href="http://cdn.datatables.net/responsive/1.0.2/css/dataTables.responsive.css"/>
  <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

  <!-- Select with search -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
 

  <!-- Tempus Dominus clock -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.css" crossorigin="anonymous" />

  <!-- Clock Picker -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/clockpicker/0.0.7/bootstrap-clockpicker.min.css">

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{asset('img/logo.png')}}" alt="Mampang" height="100" width="100">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-cog mr-2"></i> Settings
          </a>
          <div class="dropdown-divider"></div>
          <a href="{{route('profile')}}" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> Profile
          </a>
          <!-- <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a> -->
          <div class="dropdown-divider"></div>
          <a href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();" class="dropdown-item dropdown-footer"> <i class="fas fa-sign-out-alt mr-2"></i> Log Out</a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/')}}" class="brand-link 
            @if(Request::is('admin')) active
            @elseif(Request::is('validator')) active
            @elseif(Request::is('pegawai')) active
            @endif
            ">
      <img src="{{asset('img/logo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Sigara PKC Mampang</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        {{-- <div class="image">
          <img src="{{asset('img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div> --}}
        <div class="info">
          <a href="{{route('profile')}}" class="d-block">
            {{-- Ambil nama depan --}}
            @php
            $name = Auth::user()->name;
            $name = explode(" ", $name);
            @endphp

            @if(Auth::user()->role_id == 1)
            Admin | {{ $name[0] }}
            @elseif(Auth::user()->role_id == 2)
            Validator | {{ $name[0] }}
            @elseif(Auth::user()->role_id == 3)
            Pegawai | {{ $name[0] }}
            @endif
          </a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <li class="nav-item">
            <a href="{{url('/')}}" class="nav-link 
            @if(Request::is('admin')) active
            @elseif(Request::is('validator')) active
            @elseif(Request::is('pegawai')) active
            @endif">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>
          @if (Auth::user()->role_id == 1)
          <li class="nav-item">
            <a href="{{route('admin.user')}}" class="nav-link {{ Request::is('admin/user') ? 'active' : ''}}">
              <i class="nav-icon fas fa-user"></i>
              <p>
                User
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.report')}}" class="nav-link {{ Request::is('admin/report') ? 'active' : ''}}">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Report
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.harikerja')}}" class="nav-link {{ Request::is('admin/harikerja') ? 'active' : ''}}">
              <i class="nav-icon fas fa-calendar"></i>
              <p>
                Hari Kerja
              </p>
            </a>
          </li>
          @endif

          @if (Auth::user()->role_id == 3)
          <li class="nav-item menu-close">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-briefcase"></i>
              <p>
                Kinerja
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('aktivitas.dash')}}" class="nav-link {{ Request::is('aktivitas') ? 'active' : ''}}">
                  <i class="nav-icon fa fa-laptop"></i>
                  <p>Aktivitas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('pegawai.skp')}}" class="nav-link {{ Request::is('pegawai/skp') ? 'active' : ''}}">
                  <i class="nav-icon fas fa-scroll"></i>
                  <p>SKP Tahunan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('pegawai.kegutama')}}" class="nav-link {{ Request::is('pegawai/kegiatan/utama') ? 'active' : ''}}">
                  <i class="nav-icon fas fa-book"></i>
                  <p>Kegiatan Utama</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('pegawai.kegiatan')}}" class="nav-link {{ Request::is('pegawai/kegiatan/umum') ? 'active' : ''}}">
                  <i class="fa fa-file nav-icon"></i>
                  <p>Kegiatan Umum</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('pegawai.ckinerja')}}" class="nav-link {{ Request::is('pegawai/kinerja') ? 'active' : ''}}">
                  <i class="nav-icon fa fa-chart-pie"></i>
                  <p>Capaian Kinerja</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-close">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-business-time"></i>
              <p>
                Ijin dan Cuti
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('pegawai.cuti')}}" class="nav-link {{ Request::is('pegawai/cuti') ? 'active' : ''}}">
                  <i class="nav-icon fas fa-plane"></i>
                    <p>Cuti</p>
                  </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('pegawai.sakit')}}" class="nav-link {{ Request::is('pegawai/sakit') ? 'active' : ''}}">
                  <i class="nav-icon fas fa-syringe"></i>
                    <p>Ijin/Sakit</p>
                  </a>
              </li>
            </ul>
          </li>
          
          @endif

          @if (Auth::user()->role_id == 2)
          <li class="nav-item">
            <a href="{{route('validator.aktivitas')}}" class="nav-link {{ Request::is('validator/aktivitas') ? 'active' : ''}}">
              <i class="nav-icon fas fa-clipboard-list"></i>
              <p>
                Aktivitas
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('validator.skpvalidasi')}}" class="nav-link {{ Request::is('validator/skpvalidasi') ? 'active' : ''}}">
              <i class="nav-icon fas fa-clipboard-list"></i>
              <p>
                SKP
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>
          @endif
          {{-- <li class="nav-item menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                User
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v3</p>
                </a>
              </li>
            </ul>
          </li> --}}
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2022 Benazheer Salsabila</strong> | 
    Activity Report Apps for PKC Mampang Prapatan
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('jquery/jquery.min.js')}}"></script>

{{-- <!-- jQuery UI 1.11.4 -->
<script src="{{asset('jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
<!-- <script>
  $.widget.bridge('uibutton', $.ui.button)
</script> -->
<!-- Bootstrap 4 -->
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<!-- <script src="plugins/chart.js/Chart.min.js"></script> -->
<!-- Summernote -->
{{-- <script src="plugins/summernote/summernote-bs4.min.js"></script> --}}
<!-- overlayScrollbars -->
<script src="{{asset('js/OverlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('js/adminlte.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.all.min.js"></script>
 
<!-- datatable -->
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.11.5/datatables.min.js"></script>
{{-- <script src="{{asset('js/datatables/dataTables.bootstrap4.min.js')}}"></script> --}}
{{-- <script src="{{asset('datatables/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('datatables/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('datatables/dataTables.buttons.js')}}"></script>
<script src="{{asset('datatables/buttons.bootstrap4.min.js')}}"></script> --}}

<!-- DataTables  & Plugins -->
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/djs/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatabljs/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatabljs/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatabljs/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('plugins/datatabljs/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('plugins/datatabljs/buttons.html5.min.js')}}"></script>
<script src="{{asset('plugins/datatabljs/buttons.print.min.js')}}"></script>
<script src="{{asset('plugins/datatabljs/buttons.colVis.min.js')}}"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- tempus dominus clock -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/js/tempusdominus-bootstrap-4.min.js" crossorigin="anonymous"></script>

<!-- select with search-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<!-- Clock Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/clockpicker/0.0.7/bootstrap-clockpicker.min.js"></script>

<!-- ChartJS -->
<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>

<!-- Sparkline -->
<script src="{{asset('plugins/sparklines/sparkline.js')}}"></script>

<script>
  // $(document).ready( function () {
  //   $('#myTable').DataTable();
  // } );
</script>
@yield('script')
</body>
</html>
