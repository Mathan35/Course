@extends('layouts.user.header')
@section('content')
    <!-- course section start here -->
    <div class="course-single-section padding-tb section-bg ">
        <div class="container">
            <div class="row mt-4 mb-4">
                <div class="col-lg-4 mb-5 text-center">
                    <div class="card h-100 shadow border-10" style="border-radius:2.25rem !important;">
                        <img style="border-radius: 2.25rem 2.25rem 0rem 0rem;" class="card-img-top" src="https://dummyimage.com/600x350/ced4da/6c757d" alt="..." />
                        <div class="card-body p-4 text-white" style="background: linear-gradient(180deg,#f44881,#ec454f);">
                            <a class="text-white" href="{{route('education-detail')}}"><strong>Manage Education Details</strong></a>
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-4 mb-5 text-center">
                    <div class="card h-100 shadow border-10" style="border-radius:2.25rem !important;">
                        <img style="border-radius: 2.25rem 2.25rem 0rem 0rem;" class="card-img-top" src="https://dummyimage.com/600x350/ced4da/6c757d" alt="..." />
                        <div class="card-body p-4 text-white" style="background: linear-gradient(180deg,#f44881,#ec454f);">
                            <a class="text-white" href="{{route('view-enquiry')}}"><strong>View Enquiry</strong></a>
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-4 mb-5 text-center">
                    <div class="card h-100 shadow border-10" style="border-radius:2.25rem !important;">
                        <img style="border-radius: 2.25rem 2.25rem 0rem 0rem;" class="card-img-top" src="https://dummyimage.com/600x350/ced4da/6c757d" alt="..." />
                        <div class="card-body p-4 text-white" style="background: linear-gradient(180deg,#f44881,#ec454f);">
                            <a class="text-white" href="{{route('view-payment-history')}}"><strong>Payment History</strong></a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- course section ending here -->
    @endsection