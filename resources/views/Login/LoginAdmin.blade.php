<!DOCTYPE html>
<html lang="en">
<!-- Head -->
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="{{url('https://kit.fontawesome.com/64d58efce2.js')}}" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="{{asset('images/coffee-cup.png')}}">
    <link rel="stylesheet" href="{{asset('assets/login/style.css')}}"/>
    <title>Login</title>
  </head>
<!-- End -->
<!-- Body -->
    <body>
        <div class="container">
            <div class="forms-container">
                <div class="signin-signup">
                    <form action="" class="sign-in-form" method="POST">
                        @csrf
                        <h2 class="title">
                            <a href="{{url('/')}}">
                                <i class="fas fa-arrow-left"></i>
                            </a>
                            Masuk
                        </h2>
                            @if (session('success'))
                                <span class="session-feedback" role="alert">
                                    {{session('success')}}
                                </span>
                            @endif
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>Ada yang salah di username dan password kamu</strong>
                            </span>
                            @enderror
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>Ada yang salah di username dan password kamu</strong>
                                </span>
                            @enderror
                            <div class="input-field">
                                <i class="fas fa-user"></i>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror ber" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                            </div>
                            <div class="input-field">
                                <i class="fas fa-lock"></i>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                            </div>
                            <div class="button">
                                <input type="submit" value="Masuk" class="btn solid"/>
                            </div>
                            <div class="forgotregister">
                                @if (Route::has('password.request'))
                                    <a class="forgotpassword" href="{{ route('password.request') }}">Lupa password</a>
                                @endif
                            </div>
                    </form>
                </div>
            </div>
            <div class="panels-container">
                <div class="panel left-panel">
                <img src="{{asset('assets/login/images/login.svg')}}" class="image" alt="" />
                </div>
            </div>
        </div>

        <script src="{{asset('assets/login/app.js')}}"></script>
    </body>
<!-- End -->
</html>