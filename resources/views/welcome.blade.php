<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Script --}}
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">
    <title>Selamat Datang</title>
    <style type="text/css">
    .judul_frontpage{
                font-size: 15pt;
                line-height: 24px;
                margin-top: 30px;
                color: white;
                padding-top: 50px;
                text-shadow: 1px 1px 4px black;
            }
    </style>
</head>
<body>

    <nav class="navbar fixed-top navbar-expand-sm navbar-light bg-dark">
        <a class="navbar-brand text-white" href="{{url('/')}}">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        {{-- <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link text-white" href="#home"></a>
                <a class="nav-item nav-link text-white" href="#about">About</a>
                <a class="nav-item nav-link text-white" href="#blog">Blog</a>
            </div>
        </div> --}}
    </nav>

    <div class="fixed shadow-lg" style="background-size: cover; background-repeat: no-repeat; background-position: center; background-image: url('/data_file/img.jpg'); height: 150px;">
        <div style="background-color: rgba(0,0,0,0.5); height: 150px;">
            <div class="container pt-7">
                <div class="fg-white judul_frontpage" style="font-weight:bold">
                    SILAYON DIKTI <br>
                    Sistem Layanan Online Pendidikan Tinggi
                </div>
            </div>
        </div>
    </div>
    <br>
        <div class="container scrollspy-example" data-spy="scroll" data-offset="0">
            <div class="row text-left" data-spy="scroll" data-offset="0">
                
                <div class="col-12 col-md-8 col-lg-8">
                    <div class="bg-white text-dark shadow-lg rounded scrollspy-example" data-spy="scroll" data-offset="0">
                        <div style="height: 38px; margin-top:2px;">
                            <form>
                                <div class="row">
                                    <div class="col-2">
                                        
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        @foreach ($produk as $item)
                        <div class="col-auto mb-1 mt-1">
                            <div class="card shadow-lg" style="width:21.8rem; height:17rem">
                                <div class="card-body">
                                    <h6>{{$item->nama}}</h6>
                                    <img class="card-img-top" src="{{asset('data_file/'.$item->img)}}" height="170" alt="Card image cap">
                                    <div class="card-footer">
                                        <small class="text-muted">{{$item->kategori}}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-12 col-md-4 col-lg-4">
                    <div class="card shadow-lg">
                            <h5 class="card-header shadow-sm mb-3 bg-primary" style="color:white">LOGIN</h5>
                        <div class="card-body">
                            <div class="tab-content" id="pills-tab">
                                <div class="tab-pane fade show active" id="login" role="tablist" aria-labelledby="login-tab">
                                    <form class="form-signin" action="{{route('login')}}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label>E-mail</label>
                                            <input type="email" class="form-control" name="email" placeholder="Masukan E-mail" required>
                                        </div>
        
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" name="password" placeholder="Masukan Password" required>
                                        </div>
                                        <button type="submit" class="btn btn-success btn-block">MASUK</button>
                                        <button type="reset" class="btn btn-warning btn-block">RESET</button>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="register" role="tablist" aria-labelledby="register-tab">
                                    <form class="form-signin" action="{{route('register')}}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Masukan Nama" required>
                                             @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                             @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>E-mail</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Masukan E-mail" required>
                                             @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                             @enderror
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>No. Hp</label>
                                            <input type="number" name="hp" class="form-control @error('hp') is-invalid @enderror" placeholder="Masukan Nomor HP" required>
                                            @error('hp')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                             @enderror
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" placeholder="Masukan Alamat" required>
                                            @error('alamat')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                             @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Kelamin</label>
                                            <select name="kelamin" class="form-control @error('kelamin') is-invalid @enderror" required>
                                                <option value="">Pilih Kelamin</option>
                                                <option value="L">Laki-laki</option>
                                                <option value="P">Perempuan</option>
                                            </select>
                                            @error('kelamin')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                             @enderror
                                        </div>

                                        <input type="hidden" name="auth" value="Customer">

                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Masukan Password" required>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                             @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Konfirmasi Password</label>
                                            <input type="password" name="password_confirmation" class="form-control @error('name') is-invalid @enderror" placeholder="Masukan Ulang Password" required>
                                            @error('password_confirmation')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                             @enderror
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-block">REGISTER</button>
                                        <button type="reset" class="btn btn-warning btn-block">RESET</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



<script type="text/javascript" src="{{asset('assets/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/bootstrap.min.js')}}"></script>

<script type="text/javascript">
    $("#filter").click(function(){
        var kategori  = $("#kategori").val();
        $.get('filter-produk',{'_token': $('meta[name=csrf-token]').attr('content'),kategori:kategori}, function(resp){
        $("#refresh").html(resp); 
        });
    });
</script>
</body>
</html>