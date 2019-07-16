<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title')</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/font.css')}}">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/components.css')}}">
  {{-- Sweetalert --}}
  <link href="{{asset('assets/sweetalert/sweetalert.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('assets/datatables/jquery.dataTables.min.css')}}">
</head>

<body class="layout-3">
  <div id="app">
    <div class="main-wrapper container">
      <div class="navbar-bg"></div>
     <nav class="navbar navbar-expand-lg main-navbar">
        <a href="index.html" class="navbar-brand sidebar-gone-hide">Stisla</a>
        <div class="navbar-nav">
          <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
        </div>
        <div class="nav-collapse">
          <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
            <i class="fas fa-ellipsis-v"></i>
          </a>
         
        </div>
        <form class="form-inline ml-auto">
          <ul class="navbar-nav">
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
        
        </form>
        <ul class="navbar-nav navbar-right">
          
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="{{asset('/assets/img/avatar/avatar-1.png')}}" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, {{Auth::user()->name}}</div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="features-profile.html" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
             
              <div class="dropdown-divider"></div>
              <a class="dropdown-item has-icon text-danger" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
              </form>
            </div>
          </li>
        </ul>
      </nav>

      <nav class="navbar navbar-secondary navbar-expand-lg">
        <div class="container">
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a href="{{route('home')}}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>

             <li class="nav-item dropdown">
              <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="fa fa-clone"></i><span>Costumer</span></a>
            </li>

            <li class="nav-item dropdown">
              <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="fa fa-list"></i><span>Kategori</span></a>
               <ul class="dropdown-menu">
                <li class="nav-item"><a href="{{route('kategori.index')}}" class="nav-link">Manage Kategori Produk</a></li>
                <li class="nav-item"><a href="{{route('kategori.create')}}" class="nav-link">Tambah Kategori Produk</a></li>
              </ul>
            </li>
                         
            <li class="nav-item dropdown">
              <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="far fa-clone"></i><span>Produk</span></a>
               <ul class="dropdown-menu">
                <li class="nav-item"><a href="{{route('produk.index')}}" class="nav-link">Manage Produk</a></li>
                <li class="nav-item"><a href="{{route('produk.create')}}" class="nav-link">Tambah Produk</a></li>
              </ul>
            </li>

              <li class="nav-item dropdown">
                <a href="#" data-toggle="dropdown" class="nav-link has-dropdown" ><i class="fas fa-user-secret"></i> <span>Pengaduan</span></a>
                <ul class="dropdown-menu">
                  <li class="nav-item"><a href="{{route('ticket.index')}}"  class="nav-link">Pengaduan</a></li>
                </ul>
              </li>

          </ul>
        </div>
      </nav>


      <!-- Main Content -->
      <div class="main-content">
        <section class="section">            
          @yield('content')
        </section>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2019 <div class="bullet"></div> Develop By PT. Solusi Aplikasi Interaktif
        </div>
        <div class="footer-right">
          1.0.0
        </div>
      </footer>
    </div>
  </div>
  <!-- General JS Scripts -->
  {{-- <script src="{{asset('assets/js/jquery.min.js')}}"></script> --}}
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="{{asset('assets/js/popper.min.js')}}"></script>
  <script src="{{asset('assets/js/jquery.nicescroll.min.js')}}"></script>
  <script src="{{asset('assets/js/moment.min.js')}}"></script>
  <script src="{{asset('assets/js/stisla.js')}}"></script>
  <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>

  <!-- Page Specific JS File -->

  <!-- Template JS File -->
  <script src="{{asset('assets/js/scripts.js')}}"></script>
  <script src="{{asset('assets/js/custom.js')}}"></script>

  <!-- ChartJS -->
<script src="{{asset('assets/highchart/js/highcharts.js')}}"></script>
<script src="{{asset('assets/highchart/js/modules/exporting.js')}}"></script>

 <!--morris JavaScript -->
 <script src="{{asset('assets/raphael/raphael-min.js')}}"></script>
 <script src="{{asset('assets/morrisjs/morris.min.js')}}"></script>
  @yield('script')
</body>
</html>
