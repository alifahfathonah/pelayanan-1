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

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
          <form class="form-inline mr-auto">
              <ul class="navbar-nav mr-3">
                <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
              </ul>
             
              <span style="color:white; font-size:25px; font-weight:bold"></span>
          </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown dropdown-list-toggle">
           
              <a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle beep"><i class="far fa-envelope"></i></a>
           
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
              <div class="dropdown-header">Ticket Masuk
                <div class="float-right">
                  <a href="#">Mark All As Read</a>
                </div>
              </div>
        
              <div class="dropdown-list-content dropdown-list-message">
                  <a href="" class="dropdown-item">
                    <div class="dropdown-item-avatar">
                      <img alt="image" src="{{asset('assets/img/avatar/avatar-5.png')}}" class="rounded-circle">
                    </div>
                    <div class="dropdown-item-desc">
                      <div class="time">Yesterday</div>
                    </div>
                  </a>
                
              </div>
            </div>
          </li>
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
              <div class="dropdown-header">Notifications
                <div class="float-right">
                  <a href="#">Mark All As Read</a>
                </div>
              </div>
              
              <div class="dropdown-list-content dropdown-list-icons">
            
                  <a href="#" class="dropdown-item">
                    <div class="dropdown-item-icon bg-danger text-white">
                      <i class="fas fa-user-plus"></i>
                    </div>
                    <div class="dropdown-item-desc">
                     <span style="font-style:italic">Tenant Baru</span>
                      <div class="time"></div>
                    </div>
                  </a>
                
              </div>
            </div>
          </li>
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            {{-- <img alt="image" src="{{asset('assets/img/avatar/avatar-1.png')}}" class="rounded-circle mr-1"> --}}
            <div class="d-sm-none d-lg-inline-block">Hi, {{Auth::user()->name}}</div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title">Logged in 5 min ago</div>
              <a href="features-profile.html" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <a href="features-activities.html" class="dropdown-item has-icon">
                <i class="fas fa-bolt"></i> Activities
              </a>
              <a href="features-settings.html" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Settings
              </a>
              <div class="dropdown-divider"></div>
              {{-- <a href="#" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a> --}}
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
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="{{route('home')}}" class="text-black">Layanan</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{route('home')}}" class="text-black">Layanan</a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header" style="color:black">Dashboard</li>
              <li><a class="nav-link" href="{{url('home')}}" style="color:black"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
              
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" style="color:black"><i class="fas fa-user-secret"></i> <span>Produk</span></a>
                <ul class="dropdown-menu">
                  <li><a href="{{route('produk.index')}}" style="color:black">Manage Produk</a></li>
                  <li><a href="{{route('produk.create')}}" style="color:black">Tambah Produk</a></li>
                </ul>
              </li>

              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" style="color:black"><i class="fas fa-user-secret"></i> <span>Pengaduan</span></a>
                <ul class="dropdown-menu">
                  <li><a href="" style="color:black">Pengaduan</a></li>
                </ul>
              </li>

            </ul>
        </aside>
      </div>

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
  <script src="{{asset('assets/js/jquery.min.js')}}"></script>
  <script src="{{asset('assets/js/popper.min.js')}}"></script>
  <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('assets/js/jquery.nicescroll.min.js')}}"></script>
  <script src="{{asset('assets/js/moment.min.js')}}"></script>
  <script src="{{asset('assets/js/stisla.js')}}"></script>

  <!-- Sweetalert -->
  <script src="{{asset('assets/sweetalert/sweetalert.min.js')}}"></script>

<!-- ChartJS -->
<script src="{{asset('assets/highchart/js/highcharts.js')}}"></script>
<script src="{{asset('assets/highchart/js/modules/exporting.js')}}"></script>

 <!--morris JavaScript -->
 <script src="{{asset('assets/raphael/raphael-min.js')}}"></script>
 <script src="{{asset('assets/morrisjs/morris.min.js')}}"></script>

  <!-- Template JS File -->
  <script src="{{asset('assets/js/scripts.js')}}"></script>
  <script src="{{asset('assets/js/custom.js')}}"></script>
  <!-- Page Specific JS File -->
  <script src="{{asset('assets/js/page/bootstrap-modal.js')}}"></script>
  <script src="{{asset('assets/datatables/jquery.dataTables.min.js')}}"></script>
  <script type="text/javascript">
     $(document).on('click','#klik_baca', function () {
      var id_ticket = $(this).attr('data-id-notif');
          $.get(' {{Url("baca-notif")}}', {'_token' : $('meta[name=csrf-token]').attr('content'),id_ticket:id_ticket}, function(resp){
              swal({
                  html : "Status Akun Berhasil Diubah",
                  showConfirmButton : true,
                  type : "success",
                  timer : 1000
              });
              location.reload();
          });
      });
  </script>
  @yield('scripts')
</body>
</html>
