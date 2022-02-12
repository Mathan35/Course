@extends('layouts.auth')
@section('content')
      
      <!-- Page Header section start here -->

            @if (App\Models\Setting::find(1)->login_background_image != null)
                <div class="pageheader-section" style="background-image: url({{asset('assets/images/'. App\Models\Setting::find(1)->login_background_image)}});">
            @else
                <div class="pageheader-section"  style="background-image: url('{{asset('assets/images/01.jpg')}}');">
            @endif
          <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="pageheader-content text-center">
                        <h2>Login Page</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Login</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header section ending here -->


    <!-- Login Section Section Starts Here -->
    <div class="login-section padding-tb section-bg">
        <div class="container">
            <div class="account-wrapper">
                <h3 class="title">Login</h3>
                <div class="text-center mx-5">
                    <x-jet-validation-errors class="mb-4 text-danger bg-light border rounded" />
                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                <form method="POST" action="{{ route('auth-login') }}" class="signin-form">
                    @csrf                 
                    <div class="form-group">
                        <input type="email" placeholder="User Email" :value="old('email')" required autofocus id="email"  name="email">
                    </div>
                    <div class="form-group mt-4">
                        <input type="password" placeholder="Password" autocomplete="current-password"  name="password">
                        <span toggle="#password-field" class=" field-icon toggle-password"></span>
                    </div>
                    <div class="form-group">
                        <div class="d-flex justify-content-between flex-wrap pt-sm-2">
                            <div class="checkgroup d-flex">
                                    <input type="checkbox" class="float-left" name="remember" id="remember">
                                    <label for="remember">Remind Me</label>
                            </div>
                                            
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" >Forgot Password?</a>
                            @endif

                        </div>
                    </div>
                        <button type="submit" class="btn btn-warning btn-lg btn-block">Login</button>
                    
                </form>
                <div class="account-bottom mt-3">
                    <span class="d-block cate pt-10">Don’t Have any Account?  <a href="{{route('user-register')}}">Sign Up</a></span>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Section Section Ends Here -->
@endsection