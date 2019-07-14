<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Script --}}
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/boostrap/bootstrap.css')}}">
    <title>Selamat Datang</title>
</head>
<body>

    <nav class="navbar fixed-top navbar-expand-sm navbar-light bg-dark">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link text-white" href="#home">Home</a>
                <a class="nav-item nav-link text-white" href="#about">About</a>
                <a class="nav-item nav-link text-white" href="#blog">Blog</a>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="container-fluid bg-white text-dark shadow-lg rounded scrollspy-example" data-spy="scroll" data-targer="#navbarNavAltMarkup" data-offset="0" style="margin-top:70px">
            <div class="row"  style="height: 80px">  
            </div>
        </div>
    </div>
    <br>
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row scrollspy-example" data-spy="scroll" data-targer="#navbarNavAltMarkup" data-offset="0">
                <div class="col-12 col-md-9 col-lg-9">
                    <div class="card-deck" id="about">
                        <div class="card shadow-lg">
                            <img class="card-img-top" src="https://cdn.pixabay.com/photo/2019/06/22/12/53/galaxy-4291517_960_720.jpg" alt="Card image cap">
                            <div class="card-body">
                            <h5 class="card-title">About</h5>
                            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                        </div>
                        <div class="card shadow-lg">
                            <img class="card-img-top" src="https://cdn.pixabay.com/photo/2019/06/22/12/53/galaxy-4291517_960_720.jpg" alt="Card image cap">
                            <div class="card-body">
                            <h5 class="card-title">About</h5>
                            <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                        </div>
                        <div class="card shadow-lg">
                            <img class="card-img-top" src="https://cdn.pixabay.com/photo/2019/06/22/12/53/galaxy-4291517_960_720.jpg" alt="Card image cap">
                            <div class="card-body">
                            <h5 class="card-title">About</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-3 col-lg-3">
                    <div class="card-deck shadow">
                        <div class="card-body">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item col text-center">
                                    <a class="nav-link active" id="login-tab" data-toggle="pill" href="#login" role="tab" aria-controls="login" aria-selected="true">LOGIN</a>
                                </li>
                                <li class="nav-item col text-center">
                                    <a class="nav-link" id="register-tab" data-toggle="pill" href="#register" role="tab" aria-controls="register" aria-selected="false">REGISTER</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tab">
                                <div class="tab-pane fade show active" id="login" role="tablist" aria-labelledby="login-tab">
                                    <form class="form-signin" action="{{route('login')}}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label>E-mail</label>
                                            <input type="email" class="form-control" name="email" placeholder="Masukan E-mail">
                                        </div>
        
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" name="password" placeholder="Masukan Password">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-block">MASUK</button>
                                        <button type="reset" class="btn btn-warning btn-block">RESET</button>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="register" role="tablist" aria-labelledby="register-tab">
                                    <form class="form-signin" action="{{route('register')}}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Masukan Nama">
                                             @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                             @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>E-mail</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Masukan E-mail">
                                             @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                             @enderror
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>No. Hp</label>
                                            <input type="number" name="hp" class="form-control @error('hp') is-invalid @enderror">
                                            @error('hp')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                             @enderror
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror">
                                            @error('alamat')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                             @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Kelamin</label>
                                            <select name="kelamin" class="form-control @error('kelamin') is-invalid @enderror">
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
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Masukan Password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                             @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Konfirmasi Password</label>
                                            <input type="password" name="password_confirmation" class="form-control @error('name') is-invalid @enderror" placeholder="Masukan Ulang Password">
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
    </div>

    {{-- <script src="{{asset('vendor/boostrap/bootstrap.js')}}"></script>
    <script src="{{asset('vendor/jquery/jquery.js')}}"></script>
    <script src="{{asset('vendor/boostrap/popper.js')}}"></script> --}}
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>