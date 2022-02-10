@extends('layouts.user.header')
@section('content')
      

    <!-- course section start here -->
    <div class="course-section padding-tb section-bg">
        <div class="container">
            <div class="section-header text-center">
                <span class="subtitle">{{$courseCategory->name}} Courses</span>
            </div>
            <div class="section-wrapper">
                <div class="row g-4 justify-content-center row-cols-xl-3 row-cols-md-2 row-cols-1">
                    @forelse($courseCategory->course as $item)
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


       
@endsection
