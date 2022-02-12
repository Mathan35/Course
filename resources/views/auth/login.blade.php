<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{asset('own/css/styles.css')}}" rel="stylesheet" />

</head>
<style>
    body {
    background: #007bff;
    background: linear-gradient(to right, #0062E6, #33AEFF);
    }

    .btn-login {
    font-size: 0.9rem;
    letter-spacing: 0.05rem;
    padding: 0.75rem 1rem;
    }

    .btn-google {
    color: white !important;
    background-color: #ea4335;
    }

    .btn-facebook {
    color: white !important;
    background-color: #3b5998;
    }
</style>
<body>
    <div class="container">
      <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
          <div class="card border-0 shadow rounded-3 my-5">
            <div class="card-body p-4 p-sm-5">
                <h5 class="card-title text-center mb-5 fw-light fs-5">Sign In</h5>
                <x-jet-validation-errors class="mb-4 text-danger bg-light border rounded" />
                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif
              <form method="POST" action="{{ route('auth-login') }}" class="signin-form">
                @csrf 
                <div class="form-floating mb-3">
                  <input type="email" class="form-control" :value="old('email')" required autofocus id="email"  name="email">
                  <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="password" class="form-control" autocomplete="current-password"  name="password">
                  <label for="floatingPassword">Password</label>
                </div>
  
                <div class="form-check mb-3">
                  <input class="form-check-input text-left" name="remember" id="remember" type="checkbox" value="" id="rememberPasswordCheck">
                  <label class="form-check-label" for="rememberPasswordCheck">
                    Remember password
                  </label>
                    @if (Route::has('password.request'))
                        <br>
                        <a class="text-right" href="{{ route('password.request') }}" >Forgot Password?</a>
                    @endif
                </div>
                <div class="d-grid">
                  <button type="submit" class="btn btn-primary btn-login text-uppercase fw-bold" type="submit">Sign
                    in</button>
                  <a class="mt-3 text-center" href="{{route('user-register')}}">New User? click here</a>

                </div>
                <hr class="my-4">
                <div class="d-grid mb-2">
                  <button class="btn btn-google btn-login text-uppercase fw-bold" type="submit">
                    <i class="fab fa-google me-2"></i> Sign in with Google
                  </button>
                </div>
                <div class="d-grid">
                  <button class="btn btn-facebook btn-login text-uppercase fw-bold" type="submit">
                    <i class="fab fa-facebook-f me-2"></i> Sign in with Facebook
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>