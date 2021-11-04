<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('backend/css/sb-admin-2.min.css')}}" rel="stylesheet" />
    <link
      href="{{asset('backend/vendor/fontawesome-free/css/all.min.css')}}"
      rel="stylesheet"
      type="text/css"
    />
    <link href="{{asset('backend/css/custom.css')}}" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LOGIN</title>
    {{-- favicon --}}
    <link href="{{ asset('frontend/img/logo-imigrasi.png') }}" rel="icon">
    <link href="{{ asset('frontend/img/logo-imigrasi.png') }}" rel="apple-touch-icon">
</head>
<body class="bg-light">
    <div class="container container-login">
        <div class="row justify-content-center">
            <div class="col-md-10" id="body_form" style="overflow:auto">
                <div class="box-login">
                    <div class="left">
                        <img src="{{asset('frontend/img/logo-imigrasi.png')}}" width="60px" alt="">
                        <div class="form mt-3">
                            <form id="FormLogin" method="post" class="" action="{{ route('login') }}">
                                @csrf
        
                                    <label for="">NIP</label>
                                    <div class="form-underline">
                                        <input type="nip" name="nip" placeholder="Masukkan NIP" class="@error('nip') is-invalid @enderror" value="{{ old('nip') }}" required autocomplete="nip" autofocus>
                                        <span class="fa fa-user"></span>
                                    </div>
                                    @error('nip')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <br>
                                    <label for="">Password</label>
                                    <div class="form-underline">
                                        <input type="password" name="password" class="@error('password') is-invalid @enderror" placeholder="Masukkan Password" autocomplete="current-password" required>
                                        <span class="fa fa-lock"></span>
                                    </div>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <br>
                                    <div class="form-underline">
                                    {{-- <input style="width:auto" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        
                                    <label style="font-size:12px" class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label> --}}
        
                                    </div>
                                    <button type="sumit" class="btn btn-primary px-5 font-weight-bold ls-1">Login</button>
                                </form>
                        </div>
                    </div>
                    <div class="right">
                        <div class="text">
                            <h5>PAPALASAK</h5>
                            <p class="font-weight-light">Penggantian Paspor Hilang dan Rusak</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright mt-4">
        Copyright 2021 - <a href="#" target="_blank">PAPALASAK</a>
    </div>
</body>
</html>
