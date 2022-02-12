<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
    <link rel="shortcut icon" href="assets/images/x-icon.png" type="image/x-icon">

    <link rel="stylesheet" href="{{asset('assets2/css/animate.css')}}">
	<link rel="stylesheet" href="{{asset('assets2/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets2/css/icofont.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets2/css/swiper.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets2/css/lightcase.css')}}">
	<link rel="stylesheet" href="{{asset('assets2/css/style.css')}}">

</head>
<body>

    <!-- preloader start here -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- preloader ending here -->


    <!-- scrollToTop start here -->
    <a href="#" class="scrollToTop"><i class="icofont-rounded-up"></i></a>
    <!-- scrollToTop ending here -->


    <!-- header section start here -->
    <header class="header-section">
        <div class="header-bottom mt-5">
            <div class="container">
                <div class="header-wrapper">
                    <div class="logo">

                        @if (App\Models\Setting::find(1)->logo == null)
                            <a href="{{route('home')}}"><img src="{{asset('assets/img/logo.png')}}" alt="logo"></a>
                        @else
                            <a href="{{route('home')}}"><img class="w-25 h-25" src="{{asset('assets/images/'. App\Models\Setting::find(1)->logo)}}" alt="logo"></a>
                        @endif
                    </div>
                    <div class="menu-area">
                        <div class="menu">
                            <ul class="lab-ul">
                                <li>
                                    <a class="text-dark text-decoration-none" href="{{route('home')}}">Home</a>
                                </li>
                                <li>
                                    <a class="text-dark text-decoration-none" href="{{route('view-enquiry')}}">Enquiries</a>
                                </li>
                                @auth
                                <li>
                                    <a href="#0" class="text-dark">Menu</a>
                                    <ul class="lab-ul">
                                        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                        <li><a href="{{ route('profile.show') }}">Profile</a></li>
                                        <li class=" h6 bold ml-5 ">
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="btn border-none bg-none text-dark" > {{ __('Log Out') }} </button>
                                          </form>
                                       </li>
                                    </ul>
                                </li>
                                @endauth
                            </ul>
                        </div>
                        

                        @if (Route::has('login'))
                            @auth
                                <a href="{{ route('dashboard')}}" class="signup"><i class="icofont-user"></i> <span>{{auth()->user()->name}}</span> </a>
                            @else
                                @if (Route::has('register'))
                                <a href="{{ route('user-register')}}" class="signup"><i class="icofont-users"></i> <span>SIGN UP</span> </a>
                                @endif
                                <a href="{{ route('login') }}" class="login"><i class="icofont-user"></i> <span>LOG IN</span> </a>

                            @endauth
                        @endif

                        <!-- toggle icons -->
                        <div class="header-bar d-lg-none">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div class="ellepsis-bar d-lg-none">
                            <i class="icofont-info-square"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header section ending here -->

    <!-- banner section start here -->

        @if (App\Models\Setting::find(1)->background_image != null)
            <section class="banner-section style-1" style="background-image: url({{asset('assets/images/'. App\Models\Setting::find(1)->background_image)}});">
        @else
            <section class="banner-section style-1" style="background-image: url('{{asset('assets/images/bg-image.jpg')}}');">
        @endif

        <div class="container">
            <div class="section-wrapper">
                <div class="row align-items-center">
                    <div class="col-xxl-5 col-xl-6 col-lg-10">
                        <div class="banner-content">
                            <h6 class="subtitle text-uppercase fw-medium">{{App\Models\Setting::find(1)->background_header == null? 'Online Education':App\Models\Setting::find(1)->background_header}}</h6>
                            <h2 class="title text-dark"> {{App\Models\Setting::find(1)->background_title == null? 'Learn The Skills You Need To Succeed':App\Models\Setting::find(1)->background_title}}</h2>
                            <p class="desc">{{App\Models\Setting::find(1)->background_description == null? "Free online courses from the world’s Leading experts. join 18+ million Learners today.":App\Models\Setting::find(1)->background_description}}</p>
                            <form action = "{{route('search-result')}}" method = "GET">
                                <div class="banner-icon">
                                    <i class="icofont-search"></i>
                                </div>
                                <input name="course_name" id="course"  type="text" placeholder="Keywords of your course" autocomplete="off">
                                <button type="submit">Search Course</button>
                            </form>
							<div id="course_list"></div>                    
                        </div>
                    </div>
                    <div class="col-xxl-7 col-xl-6">
                        <div class="banner-thumb">
                            <!-- Hero section -->
                            @if (App\Models\Setting::find(1)->background_centered_image == null)
                                <img src="{{asset('assets/images/bg-center.png')}}" alt="img">
                            @else
                                <img src="{{asset('assets/images/'. App\Models\Setting::find(1)->background_centered_image)}}" alt="img">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="all-shapes"></div>
        <div class="cbs-content-list d-none">
            <ul class="lab-ul">
                @if ($course->count() != 0)
                <li class="ccl-shape shape-1"><a>{{$course->count() == 0? "":$course->count().' Courses'}} </a></li>
                @endif
                @if ($technology->count() != 0)
                <li class="ccl-shape shape-2"><a>{{$technology->count() == 0? "":$technology->count().' Technologies'}} </a></li>
                @endif
                @if ($user != 0)
                <li class="ccl-shape shape-3"><a>{{$user == 0? "":$user.' Successful Students'}} </a></li>
                @endif
                @if ($enquiry != 0)
                <li class="ccl-shape shape-4"><a>{{$enquiry == 0? "":$enquiry.' Entrolls'}} </a></li>
                @endif
                @if ($category->count() != 0)
                <li class="ccl-shape shape-5"><a>{{$category->count() ==0? "":$category->count().' Categories'}} </a></li>
                @endif
            </ul>
        </div>
    </section>
    <!-- banner section ending here -->



    @yield('content')
   

	{{-- autocomplete search for courses --}}
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

	<script type="text/javascript">
		$(document).ready(function () {
		 
			$('#course').on('keyup',function() {
				var query = $(this).val(); 
				$.ajax({
				   
					url:"{{ route('search-course') }}",
			  
					type:"GET",
				   
					data:{'course':query},
				   
					success:function (data) {
					  
						$('#course_list').html(data);
					}
				})
				// end of ajax call
			});

			
			$(document).on('click', 'li', function(){
			  
				var value = $(this).text();
				$('#course').val(value);
				$('#course_list').html("");
			});
		});
	</script>
 
    <!-- footer -->
    <div class="news-footer-wrap">

        <!-- Newsletter Section Start Here -->
      
        <!-- Footer Section Start Here -->
        <footer>
            <div class="footer-bottom style-2">
                <div class="container">
                    <div class="section-wrapper">
                        <p>&copy; 2022 <a href="index.html">Course</a>  </p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer Section Ending Here -->
    </div>
    <!-- footer -->

    <script src="{{asset('assets2/js/jquery.js')}}"></script>
    <script src="{{asset('assets2/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets2/js/swiper.min.js')}}"></script>
    <script src="{{asset('assets2/js/progress.js')}}"></script>
    <script src="{{asset('assets2/js/lightcase.js')}}"></script>
    <script src="{{asset('assets2/js/counter-up.js')}}"></script>
    <script src="{{asset('assets2/js/isotope.pkgd.js')}}"></script>
    <script src="{{asset('assets2/js/functions.js')}}"></script>

</body>
</html>

</html>