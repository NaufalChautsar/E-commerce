<!DOCTYPE html>
<html lang="en">
<!-- Head -->
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="{{url('https://kit.fontawesome.com/64d58efce2.js')}}" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="{{asset('images/coffee-cup.png')}}">
    <link rel="stylesheet" href="{{asset('assets/login/style.css')}}"/>
    <title>Register</title>
  </head>
<!-- End -->
<!-- Body -->
    <body>
        <div class="container">
            <div class="forms-container">
                <div class="signin-signup">
                    <form action="{{ route('register') }}" class="sign-in-form" method="POST">
                        @csrf
                        <h2 class="title">
                            <a href="{{url('/')}}">
                                <i class="fas fa-arrow-left"></i>
                            </a>
                            Register
                        </h2>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>Panjang nama maksimal 25 karakter!</strong>
                            </span>
                            @enderror
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>Password minimal 8 karakter!</strong>
                            </span>
                            @enderror
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>Masukkan email anda dengan benar!</strong>
                            </span>
                            @enderror
                            <div class="input-field">
                                <i class="fas fa-user"></i>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Masukkan Nama Anda">
                            </div>
                            <div class="input-field">
                                <i class="fas fa-envelope"></i>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Masukkan Email Anda">
                            </div>
                            <div class="input-field">
                                <i class="fas fa-lock"></i>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Masukkan password">
                            </div>
                            <div class="input-field">
                                <i class="fas fa-lock"></i>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmasi password">
                            </div>
                            <div class="button">
                                <input type="submit" value="Register" class="btn solid"/>
                                    <a class="masuk" href="{{ route('login') }}">Masuk</a>
                            </div>
                    </form>
                </div>
            </div>
            <div class="panels-container">
                <div class="panel left-panel">
                <img src="{{asset('assets/login/images/register.svg')}}" class="image" alt="" />
                </div>
            </div>
        </div>

        <script src="{{asset('assets/login/app.js')}}"></script>
    </body>
<!-- End -->
</html>