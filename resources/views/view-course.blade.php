@extends('layouts.user.header')
@section('content')
     <!-- Header-->
     <header class="bg-light">
        <div class="container px-5">
            <div class="row gx-5 align-items-center justify-content-center">
                <div class="col-lg-8 col-xl-7 col-xxl-6">
                    <div class="my-5 text-center text-xl-start">
                        @if (count($course->categories->pluck('name'))> 0)
                            @foreach ($course->categories->pluck('name') as $category)
                                <div class="badge p-2 bg-warning bg-gradient rounded-pill mb-2">
                                    {{$category}}
                                </div>
                            @endforeach
                        @endif
                        @if (count($course->technology->pluck('name'))> 0)
                            @foreach ($course->technology->pluck('name') as $technology)
                                <div class="badge p-2 bg-info bg-gradient rounded-pill mb-2">
                                    {{$technology}}
                                </div>
                            @endforeach
                        @endif
                        <div class="badge p-2 bg-danger bg-gradient rounded-pill mb-2"> {{$course->offer_percentange}}% Offer</div>
                        <h4 class="display-6 fw-bolder text-dark mb-2">{{$course->name}}</h4>
                        <p class="lead fw-normal text-dark-50 mb-4">{{$course->short_description}}</p>
                        <div class="display-6">Rs {{$course->price}} <span class="display-5 text-danger"><strong><del>Rs {{$course->actual_price}}</del></strong></span></div>
                        <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start mt-2">
                            @if ($checkEnquiry)                        
                                <a class="btn btn-info btn-lg px-4 me-sm-3" >Enquiry Submitted</a>
                            @else
                                @if (auth()->user()->role == "0")                        
                                    <a class="btn btn-info btn-lg px-4 me-sm-3" href="{{route('enquiry', $course->id)}}">Join Now</a>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center">
                    <div class="row">
                        <div class="col-md-12">
                            <img style="height: 400px;" class="img-thumbnail mt-2 " src="{{asset('assets/images/'.$course->image)}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="py-5">
        <div class="container px-5 my-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-7 col-xs-12 col-sm-12">
                    <h2 class="fw-bolder">Course Overview</h2>
                    <p class="lead fw-normal text-muted mb-5">{{$course->detailed_description}}</p>
                    <h2 class="fw-bolder">What you will learn in this course</h2>
                    <ul class="list-unstyled">
                        @foreach ($course->learning as $item)
                            <li><i class="bi bi-box-arrow-in-down-right text-warning"></i> {{$item->name}}</li>
                        @endforeach
                    </ul>
                    <h2 class="fw-bolder">Course Content</h2>
                    <div class="accordion mb-5 mt-4" id="accordionExample">
                        @foreach ($course->coursetitles as $item)
                            <div class="accordion-item">
                                <h3 class="accordion-header" id="headingOne{{$item->id}}"><button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne{{$item->id}}" aria-expanded="true" aria-controls="collapseOne{{$item->id}}">{{$item->title}}</button></h3>
                                <div class="accordion-collapse collapse" id="collapseOne{{$item->id}}" aria-labelledby="headingOne{{$item->id}}" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <ol>
                                            @foreach ($item->courseTitleDescription as $value)
                                                <li>{{$value->description}}</li>
                                            @endforeach
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
                <div class="col-lg-5 col-xs-12 col-sm-12">
                    <ul class="list-group">
                        <li class="list-group-item active"> <span class="badge bg-danger">% {{$course->offer_percentange}}</span> <span style="float: right;">Limited Offer</span></li>
                        <li class="list-group-item">Course Level<span style="float: right;">{{$course->course_level}}</span></li>
                        <li class="list-group-item">Course Duration<span style="float: right;">{{$course->course_duration}} days</span></li>
                        <li class="list-group-item">Online Class<span style="float: right;">{{$course->class_type}}</span></li>
                        <li class="list-group-item">Certificate<span style="float: right;">Yes</span></li>
                        <li class="list-group-item">Language<span style="float: right;">{{$course->language}}</span></li>
                      </ul>
                </div>
            </div>
        </div>
    </section>
@endsection