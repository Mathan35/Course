@extends('layouts.auth')
@section('content')
      
      <!-- Page Header section start here -->
    <div class="pageheader-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="pageheader-content text-center">
                        <h2>Register Page</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Register</li>
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
        <div class="text-center mx-5">
            <x-jet-validation-errors class="mb-4 text-danger bg-light border rounded" />
            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif
        </div>
        <div class="container">
            <div class="account-wrapper">
                <h3 class="title">Register</h3>

                <form method="POST" action="{{ route('register') }}" class="signin-form">
                    @csrf                 
                    <div class="form-group mt-4">
                        <input type="name" placeholder="Name" :value="old('name')" required autofocus id="name"  name="name">
                    </div>
                    <div class="form-group mt-4">
                        <input type="email" placeholder="email" :value="old('email')" required autofocus id="email"  name="email">
                    </div>
                    <div class="form-group mt-4">
                        <input type="text" placeholder="phone" :value="old('phone')" required autofocus id="phone"  name="phone">
                    </div>
                    <div class="form-group mt-4">
                        <input type="date" placeholder="dob" :value="old('dob')" required autofocus id="dob"  name="dob">
                    </div>

                    <div class="form-group mt-4">
                        <select class="form-control text-dark" aria-label=" w-full" name="country_id">
                            @foreach ($country as $item)
                            <option class="text-dark" value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mt-4">
                        <input type="password" id="password" name="password"  autocomplete="new-password" placeholder="Password" required>
                    </div>
                    <div class="form-group mt-4">
                        <input type="password"  id="password_confirmation" name="password_confirmation" autocomplete="new-password" placeholder="Confirm Password" required>
                    </div>
                    
                    <div class="form-group mt-4">
                        <button type="submit" class="form-control btn btn-primary submit px-3">Sign Up</button>
                    </div>

                    
                </form>
                <div class="account-bottom mt-3">
                    <span class="d-block cate pt-10">Already Registered ? <a href="{{route('login')}}">Login</a></span>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Section Section Ends Here -->
@endsection