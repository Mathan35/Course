@extends('layouts.user.header')
@section('content')
      

    <!-- sponsor section start here -->
    <div class="sponsor-section section-bg">
        <div class="container">
            <div class="section-wrapper">
                <div class="sponsor-slider">
                    <div class="swiper-wrapper">
                        @foreach ($technology as $item)
                        <div class="swiper-slide">
                            <div class="sponsor-item">
                                <div class="sponsor-thumb">
                                    <img class="technology-thumb" src="{{asset('assets/images/'.$item->image)}}" alt="technology">
                                </div>
                            </div>
                        </div>
                        @endforeach
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- sponsor section ending here -->


    <!-- category section start here -->
    <div class="category-section padding-tb">
        <div class="container">
            <div class="section-header text-center">
                <span class="subtitle">Popular Category</span>
                <h2 class="title">Popular Category For Learn</h2>
            </div>
            <div class="section-wrapper">
                <div class="row g-2 justify-content-center row-cols-xl-6 row-cols-md-3 row-cols-sm-2 row-cols-1">
                    @forelse ($category as $item)					
                    <div class="col">
                        <div class="category-item text-center">
                            <div class="category-inner">
                                {{-- <div class="category-thumb">
                                    <img src="assets/images/category/icon/01.jpg" alt="category">
                                </div> --}}
                                <div class="category-content">
                                    <a href="{{route('search-category',$item->id)}}"><h6>{{$item->name}}</h6></a>
                                    <span>{{$item->Course->count()}} Course</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <p class="text-danger">No Categories Found</p>
                    @endforelse
                </div>
                <div class="text-center mt-5">
                    <a href="{{route('all-courses')}}" class="lab-btn"><span>Browse All Categories</span></a>
                </div>
            </div>
        </div>
    </div>
    <!-- category section start here -->


    <!-- course section start here -->
    <div class="course-section padding-tb section-bg">
        <div class="container">
            <div class="section-header text-center">
                <span class="subtitle">Featured Courses</span>
                <h2 class="title">Pick A Course To Get Started</h2>
            </div>
            <div class="section-wrapper">
                <div class="row g-4 justify-content-center row-cols-xl-3 row-cols-md-2 row-cols-1">
                    @forelse($course as $item)
                    <div class="col">
                        <div class="course-item">
                            <div class="course-inner">
                                <div class="course-thumb">
                                    <img class="h-50 w-50" src="{{asset('assets/images/'.$item->image)}}" alt="course">
                                </div>
                                <div class="course-content">
                                    <div class="course-price">{{$item->price}}$</div>
                                    <a ><h5>{{$item->name}}</h5></a>
                                    <div class="course-details">
                                        <div class="couse-count"><i class="icofont-video-alt"></i> {{$item->short_description}}</div>
                                        <div class="couse-topic"><i class="icofont-signal"></i> Online Class</div>
                                    </div>
                                    <div class="course-footer">
                                        <div class="course-btn ">
                                            <a href="{{route('view-course',$item->id)}}" class="lab-btn-text text-center">Read More <i class="icofont-external-link"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                        <p class="text-danger text-center">No Courses Found...!</p>
                    @endforelse 	
                </div>
            </div>
        </div>
    </div>


    <!-- Achievement section start here -->
    <div class="achievement-section padding-tb">
        <div class="container">
            <div class="section-header text-center">
                <span class="subtitle">START TO SUCCESS</span>
                <h2 class="title">Achieve Your Goals With Course</h2>
            </div>
            <div class="section-wrapper">
                <div class="counter-part mb-4">
                    <div class="row g-4 row-cols-lg-4 row-cols-sm-2 row-cols-1 justify-content-center">
                        <div class="col">
                            <div class="count-item">
                                <div class="count-inner">
                                    <div class="count-content">
                                        <h2><span class="count" data-to="{{$course->count()}}" data-speed="1500"></span><span>+</span></h2>
                                        <p>Top Courses </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="count-item">
                                <div class="count-inner">
                                    <div class="count-content">
                                        <h2><span class="count" data-to="{{$technology->count()}}" data-speed="1500"></span><span>+</span></h2>
                                        <p>Top Most Technologies</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="count-item">
                                <div class="count-inner">
                                    <div class="count-content">
                                        <h2><span class="count" data-to="{{$category->count()}}" data-speed="1500"></span><span>+</span></h2>
                                        <p>Popular Categories</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Achievement section ending here -->
       
@endsection
