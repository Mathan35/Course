<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Online Course learn in tamil</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{asset('own/assets/favicon.ico')}}" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('own/css/styles.css')}}" rel="stylesheet" />
        <link href="{{asset('own/css/typewrite.css')}}" rel="stylesheet" />
        <link href="{{asset('own/css/slider.css')}}" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{asset('own/js/scripts.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <script src="{{asset('own/js/slider.js')}}"></script>
    </head>
    <style>
        header {
            background-image: url("own/img/wave.svg");
            background-repeat: no-repeat;
        }
    </style>
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
            
            <!-- Navigation-->
            <nav class="navbar navbar-expand-lg text-dark navbar-light">
                <div class="container-lg px-5">
                    <a class="navbar-brand my-2 text-dark" href="{{url('/')}}">
                        @if (App\Models\Setting::find(1)->logo == null)
                            <a href="{{route('home')}}"><img src="{{asset('assets/img/logo.png')}}" alt="logo"></a>
                        @else
                            <a href="{{route('home')}}"><img class="w-25 h-25" src="{{asset('assets/images/'. App\Models\Setting::find(1)->logo)}}" alt="logo"></a>
                        @endif
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link text-dark" href="{{route('home')}}">Home</a></li>
                            <li class="nav-item"><a class="nav-link text-dark" href="{{route('view-enquiry')}}">Enquiries</a></li>
                            @auth
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-dark bg-info" id="navbarDropdownBlog" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Menu's</a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownBlog">
                                    <li><a class="dropdown-item text-dark" href="{{ route('dashboard') }}">Dashboard</a></li>
                                    <li><a class="dropdown-item text-dark" href="{{ route('profile.show') }}">Profile</a></li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="btn border-none bg-none text-dark" > {{ __('Log Out') }} </button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            @endauth
                            @if (Route::has('login'))
                            @auth
                            <li class="nav-item"><a href="{{ route('dashboard')}}" class="nav-link text-dark"><i class="icofont-user"></i> {{auth()->user()->name}} </a></li>
                            @else
                                @if (Route::has('register'))
                                <li class="nav-item"><a href="{{ route('user-register')}}" class="nav-link text-dark">Register </a></li>
                                @endif
                                <li class="nav-item"><a href="{{ route('login')}}" class="nav-link text-dark">Login </a></li>
                            @endauth
                        @endif
                        </ul>
                    </div>
                </div>
            </nav>
            {{-- @if (App\Models\Setting::find(1)->background_image != null)
                <section class="banner-section style-1" style="background-image: url({{asset('assets/images/'. App\Models\Setting::find(1)->background_image)}});">
            @else
                <section class="banner-section style-1" style="background-image: url('{{asset('assets/images/bg-image.jpg')}}');">
            @endif --}}
            @yield('content')
            
        </main>
        <!-- Footer-->
        <footer class="bg-dark py-4 mt-auto">
            <div class="container px-5">
                <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                    <div class="col-auto"><div class="small m-0 text-white">Copyright &copy; This Website {{date('Y')}}</div></div>
                    <div class="col-auto">
                        <a class="link-light small" href="#!">Privacy</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="#!">Terms</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="#!">Contact</a>
                    </div>
                </div>
            </div>
        </footer>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
        
        <!-- Bootstrap core JS-->
        
    </body>
</html>
