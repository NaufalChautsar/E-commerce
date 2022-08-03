<!DOCTYPE html>
<html lang="en">
<!-- Head -->
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="{{url('https://kit.fontawesome.com/64d58efce2.js')}}" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="{{asset('images/coffee-cup.png')}}">
    <link rel="stylesheet" href="{{asset('assets/login/style.css')}}"/>
    <title>Setel Ulang Kata Sandi</title>
  </head>
<!-- End -->
<!-- Body -->
    <body>
        <div class="container">
            <div class="forms-container">
                <div class="signin-signup">
                    <form action="{{ route('password.update') }}" class="sign-in-form" method="POST">
                        @csrf
                        <h2 class="title">Mereset Password Anda</h2>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>Oops.. Ada yang salah di username dan password kamu</strong>
                                </span>
                            @enderror
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>Oops.. Ada yang salah di username dan password kamu</strong>
                                </span>
                            @enderror
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="input-field">
                                <i class="fas fa-user"></i>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email',$email) }}" required autocomplete="email" autofocus>
                            </div>
                            <div class="input-field">
                                <i class="fas fa-lock"></i>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            </div>
                            <div class="input-field">
                                <i class="fas fa-lock"></i>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                            </div>
                            <div class="button">
                                <input type="submit" value="Reset Password" class="btn solid"/>
                            </div>
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