<!DOCTYPE html>
<html lang="en">
<!-- Head -->
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="{{url('https://kit.fontawesome.com/64d58efce2.js')}}" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="{{asset('images/coffee-cup.png')}}">
    <link rel="stylesheet" href="{{asset('assets/login/style.css')}}"/>
    <title>Lupa Password</title>
  </head>
<!-- End -->
<!-- Body -->
    <body>
        <div class="container">
            <div class="forms-container">
                <div class="signin-signup">
                    <form method="POST" action="{{ route('password.email') }}" class="sign-in-form">
                        @csrf
                        <h2 class="title-forgot">Lupa Password</h2>
                            @if (session('status'))
                                <div class="alert" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>Oops.. Ada yang salah di email kamu</strong>
                                </span>
                            @enderror
                            <div class="input-field">
                                <i class="fas fa-user"></i>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            </div>
                            <div class="button">
                                <input type="submit" value="Kirim Tautan Atur Ulang Kata Sandi" class="btn-forgotpassword solid"/>
                            </div>
                            <a class="masukemail" href="{{ route('login') }}">Masuk</a>
                    </form>
                </div>
            </div>
            <div class="panels-container">
                <div class="panel left-panel">
                    <img src="{{asset('assets/login/images/forgotpassword.svg')}}" class="image" alt="Forgot Password"/>
                </div>
            </div>
        </div>
        <script src="{{asset('assets/login/app.js')}}"></script>
    </body>
<!-- End -->
</html>