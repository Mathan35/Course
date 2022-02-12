@extends('layouts.user.header')
@section('content')
    <!-- Header-->
    <header class="bg-light">
        <div class="container px-5">
            <div class="row gx-5 align-items-center justify-content-center">
                <div class="col-lg-8 col-xl-7 col-xxl-8">
                    <div class="my-5 text-center text-xl-start">
                        <h1 class="display-5 fw-bolder text-dark mb-2">Get Training from working professionals in tamil</h1>
                        <p class="lead fw-normal text-dark-50 mb-4">Get Trained by experts!</p>
                        <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                            <a class="btn bg-gradient text-dark btn-outline-light btn-lg px-4 me-sm-3 bg-info" href="#features">Join Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-xxl-4  d-xl-block">
                    <!-- image size is 600*400 -->
                    <!-- <img class="img-fluid rounded-3 mt-5" src="img/homepageright.png" alt="..." /> -->
                    <div class="row container mt-4 mb-4 bg-dark">
                        <div class="col-12 ">
                            
                            <div class="card h-100 shadow border-0 bg-dark ">
                                <div class="card-body p-4 mb-2">
                                    <code class="text-white">
                                        <div class="typewriter">
                                        <strong class="text-warning">//Fibonacci Series  </strong>
                                        </div> <br><br>
                                        
                                        <strong class="text-primary">const</strong> 
                                        <strong class="text-danger">number</strong> = 
                                        <strong class="text-info">
                                            parseInt(prompt('Enter the number of terms: '));
                                        </strong><br><br>
                                        <strong class="text-primary">let</strong> n1 = 0, n2 = 1, nextTerm;<br>

                                        console.<strong class="text-primary">log</strong><strong class="text-warning">('Fibonacci Series:');</strong><br><br>
                                        <strong class="text-info">for</strong> (<strong class="text-primary">let</strong> i = 1; i <= number; i++) {<br>
                                            &nbsp;&nbsp;console.<strong class="text-primary">log</strong>(n1);<br>
                                            &nbsp;&nbsp;nextTerm = n1 + n2;<br>
                                            &nbsp;&nbsp;n1 = n2;<br>
                                            &nbsp;&nbsp;n2 = nextTerm;<br>
                                        }
                                        <br>
                                    </code> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Features section-->
    <section class="py-2" id="features">
        <div class="container px-5 my-3">
            <h2 class="text-center">Popular Technologies for Learning in Tamil</h2>
            <section class="customer-logos slider mt-4">
                <div class="slide">
                    <img src="https://image.freepik.com/free-vector/blue-tech-logo_1103-822.jpg">
                </div>
                <div class="slide">
                    <img src="https://image.freepik.com/free-vector/colors-curl-logo-template_23-2147536125.jpg">
                </div>
                <div class="slide">
                    <img src="https://image.freepik.com/free-vector/abstract-cross-logo_23-2147536124.jpg">
                </div>
                <div class="slide">
                    <img src="https://image.freepik.com/free-vector/football-logo-background_1195-244.jpg">
                </div>
                <div class="slide">
                    <img src="https://image.freepik.com/free-vector/background-of-spots-halftone_1035-3847.jpg">
                </div>
                <div class="slide">
                    <img src="https://image.freepik.com/free-vector/retro-label-on-rustic-background_82147503374.jpg">
                </div>
                @foreach ($technology as $item)
                <div class="slide">
                    <img src="{{asset('assets/images/'.$item->image)}}">
                </div>
                @endforeach
            </section>
        </div>
    </section>
    
    <!-- Blog preview section-->
    <section class="py-1">
        <div class="container px-5 my-1">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-8 col-xl-6">
                    <div class="text-center">
                        <h2 class="fw-bolder">Popular Roles to Become Software Developer</h2>
                        <p class=" fw-normal text-muted mb-5">Decide roles first to become web developer or mobile developer. Ithelps to choose technologies</p>
                    </div>
                </div>
            </div>
            <div class="row gx-5">
                @forelse ($category as $item)
                <div class="col-lg-4 mb-5">
                    <div class="card h-100 shadow border-10" style="border-radius:2.25rem !important;">
                        <img style="border-radius: 2.25rem 2.25rem 0rem 0rem;" class="card-img-top" src="{{asset($item->image)}}" alt="..." />
                        <div class="card-body p-4 text-white" style="background: linear-gradient(180deg,#f44881,#ec454f);">
                            <div class="badge bg-primary bg-gradient rounded-pill mb-2">{{$item->name}}</div>
                            <a class="text-decoration-none link-dark stretched-link" href="{{route('search-category',$item->id)}}"><h5 class="card-title text-white mb-3">{{$item->name}}</h5></a>
                            <p class="card-text mb-0">{{$item->Course->count()}} Course</p>
                        </div>
                        <div class="card-footer mt-2 p-4 pt-0 bg-transparent border-top-0">
                            <div class="d-flex align-items-end justify-content-between">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d" alt="..." />
                                    <div class="small">
                                        <div class="fw-bold">Kelly Rowan</div>
                                        <div class="text-muted">March 12, 2021 &middot; 6 min read</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                    <p class="text-danger">No Categories Found</p>
                @endforelse
            </div>
            <div class="row gx-5">
                <div class="col-12 text-center">
                    <a href="{{route('all-courses')}}" class="btn btn-lg btn-info text-center"><span>Browse All Categories</span></a>
                </div>
            </div>
            <!-- Call to action-->
            <aside class="bg-subscribe  rounded-3 p-4 p-sm-5 mt-5">
                <div class="d-flex align-items-center justify-content-between flex-column flex-xl-row text-center text-xl-start">
                    <div class="mb-4 mb-xl-0">
                        <div class="fs-3 fw-bold text-white">New products, delivered to you.</div>
                        <div class="text-white-50">Sign up for our newsletter for the latest updates.</div>
                    </div>
                    <div class="ms-xl-4">
                        <div class="input-group mb-2">
                            <input class="form-control" type="text" placeholder="Email address..." aria-label="Email address..." aria-describedby="button-newsletter" />
                            <button class="btn btn-outline-light" id="button-newsletter" type="button">Sign up</button>
                        </div>
                        <div class="small text-white-50">We care about privacy, and will never share your data.</div>
                    </div>
                </div>
            </aside>
        </div>
    </section>

    <section class="py-5">
        <div class="container px-5 my-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-8 col-xl-6">
                    <div class="text-center">
                        <h2 class="fw-bolder">Our Available Personal Training Courses For you</h2>
                        <p class="lead fw-normal text-muted mb-5">Select Course and start to learn with experts</p>
                    </div>
                </div>
            </div>
            <div class="row gx-5">
                @forelse($course as $item)
                <div class="col-lg-4 mb-5">
                    <div class="card h-100 shadow border-10" style="border-radius:2.25rem !important;">
                        <img style="border-radius: 2.25rem 2.25rem 0rem 0rem;" class="card-img-top" src="{{asset('assets/images/'.$item->image)}}" alt="..." />
                        <div class="card-body p-4 text-white" style="background: linear-gradient(180deg,#f44881,#ec454f);">
                            <div class="badge bg-primary bg-gradient rounded-pill mb-2">News</div>
                            <a class="text-decoration-none link-dark stretched-link" href="{{route('view-course',$item->id)}}"><h5 class="card-title text-white mb-3">{{$item->name}}</h5></a>
                            <p class="card-text mb-0">{{$item->short_description}}</p>
                        </div>
                        <div class="card-footer mt-2 p-4 pt-0 bg-transparent border-top-0">
                            <div class="d-flex align-items-end justify-content-between">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d" alt="..." />
                                    <div class="small">
                                        <div class="fw-bold">Kelly Rowan</div>
                                        <div class="text-muted">March 12, 2021 &middot; 6 min read</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                    <p class="text-danger">No Categories Found</p>
                @endforelse
            </div>
            <div class="row gx-5">
                <div class="col-12 text-center">
                    <a href="{{route('all-courses')}}" class="btn btn-lg btn-info text-center"><span>Browse All Courses</span></a>
                </div>
            </div>
            <!-- Call to action-->
            <aside class="bg-primary bg-gradient rounded-3 p-4 p-sm-5 mt-5">
                <div class="d-flex align-items-center justify-content-between flex-column flex-xl-row text-center text-xl-start">
                    <div class="mb-4 mb-xl-0">
                        <div class="fs-3 fw-bold text-white">New products, delivered to you.</div>
                        <div class="text-white-50">Sign up for our newsletter for the latest updates.</div>
                    </div>
                    <div class="ms-xl-4">
                        <div class="input-group mb-2">
                            <input class="form-control" type="text" placeholder="Email address..." aria-label="Email address..." aria-describedby="button-newsletter" />
                            <button class="btn btn-outline-light" id="button-newsletter" type="button">Sign up</button>
                        </div>
                        <div class="small text-white-50">We care about privacy, and will never share your data.</div>
                    </div>
                </div>
            </aside>
        </div>
    </section>
    <!-- Team members section-->
    <section class="py-5 bg-light">
        <div class="container px-5 my-5">
            <div class="text-center">
                <h2 class="fw-bolder">Our team</h2>
                <p class="lead fw-normal text-muted mb-5">Dedicated to quality and your success</p>
            </div>
            <div class="row gx-5 row-cols-1 row-cols-sm-2 row-cols-xl-4 justify-content-center">
                <div class="col mb-5 mb-5 mb-xl-0">
                    <div class="text-center">
                        <img class="img-fluid rounded-circle mb-4 px-4" src="https://dummyimage.com/150x150/ced4da/6c757d" alt="..." />
                        <h5 class="fw-bolder">Ibbie Eckart</h5>
                        <div class="fst-italic text-muted">Founder &amp; CEO</div>
                    </div>
                </div>
                <div class="col mb-5 mb-5 mb-xl-0">
                    <div class="text-center">
                        <img class="img-fluid rounded-circle mb-4 px-4" src="https://dummyimage.com/150x150/ced4da/6c757d" alt="..." />
                        <h5 class="fw-bolder">Arden Vasek</h5>
                        <div class="fst-italic text-muted">CFO</div>
                    </div>
                </div>
                <div class="col mb-5 mb-5 mb-sm-0">
                    <div class="text-center">
                        <img class="img-fluid rounded-circle mb-4 px-4" src="https://dummyimage.com/150x150/ced4da/6c757d" alt="..." />
                        <h5 class="fw-bolder">Toribio Nerthus</h5>
                        <div class="fst-italic text-muted">Operations Manager</div>
                    </div>
                </div>
                <div class="col mb-5">
                    <div class="text-center">
                        <img class="img-fluid rounded-circle mb-4 px-4" src="https://dummyimage.com/150x150/ced4da/6c757d" alt="..." />
                        <h5 class="fw-bolder">Malvina Cilla</h5>
                        <div class="fst-italic text-muted">CTO</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
