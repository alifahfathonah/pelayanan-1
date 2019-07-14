<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Verifikasi Email</title>

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
        <nav class="navbar navbar-fixed navbar-expand-md navbar-primary bg-primary">
            <a class="navbar-brand" href="#">Verifikasi EMail</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
           
        </nav>
        
       
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
            @yield('content')
        </section>
      </div>
     
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="{{asset('assets/js/jquery.min.js')}}"></script>
  <script src="{{asset('assets/js/popper.min.js')}}"></script>
  <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('assets/js/jquery.nicescroll.min.js')}}"></script>
  <script src="{{asset('assets/js/moment.min.js')}}"></script>
  <script src="{{asset('assets/js/stisla.js')}}"></script>

  <!-- JS Libraies -->

  <!-- Page Specific JS File -->

  <!-- Template JS File -->
  <script src="{{asset('assets/js/scripts.js')}}"></script>
  <script src="{{asset('assets/js/custom.js')}}"></script>
  @yield('script')
</body>
</html>
