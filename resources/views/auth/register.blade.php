<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register </title>
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
                <h5 class="card-title text-center mb-5 fw-light fs-5">Sign Up</h5>
                <x-jet-validation-errors class="mb-4 text-danger bg-light border rounded" />
                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif
              <form method="POST" action="{{ route('register') }}" class="signin-form">
                @csrf 
                <div class="form-floating mb-3">
                  <input type="name" class="form-control" value="{{old('name')}}" required autofocus id="name"  name="name">
                  <label for="floatingInput">Name</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="email" class="form-control" value="{{old('email')}}"  name="email">
                  <label for="floatingPassword">Email</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" value="{{old('phone')}}" name="phone">
                    <label for="floatingPassword">Mobile Number</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="date" class="form-control" value="{{old('dob')}}"  name="dob">
                    <label for="floatingPassword">DOB</label>
                </div>
                <div class="form-floating mb-3">
                    <select value="{{old('country_id')}}" class="form-control " aria-label=" w-full" name="country_id">
                        <option value="">SELECT COUNTRY</option>
                        @foreach ($country as $item)
                        <option class="text-dark" value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                    <label for="floatingPassword">SELECT COUNTRY</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control"  name="password" placeholder="Password" required>
                    <label for="floatingPassword">Password</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control"  name="password_confirmation" placeholder="Confirm Password" required>
                    <label for="floatingPassword">Confirm Password</label>
                </div>
                <div class="d-grid">
                  <button type="submit" class="btn btn-primary btn-login text-uppercase fw-bold" type="submit">Sign
                    Up</button>
                  <a class="mt-3 text-center" href="{{route('login')}}">Already Registered? click here to login</a>

                </div>
                <hr class="my-4">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>