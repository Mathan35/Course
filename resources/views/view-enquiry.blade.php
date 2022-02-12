@extends('layouts.user.header')
@section('content')
    <!-- course section start here -->
    <div class="course-single-section padding-tb section-bg ">
        <div class="container card bg-light">
            <div class="m-3">
                <!-- Messages -->
                <x-Message-component/> 
            
                <h4 class="text-center mt-4">Enquiry Details</h4>
                @forelse ($enquiryCourses as $item)    
                    <div class="row card m-4 mt-5">
                        <div class="col-md-12 m-2">
                            @if ($item->status == "0")
                            <h1 class="h6 ">Status :- <span class="text-danger">Pending</span> </h1>

                            @elseif ($item->status == "1")
                            <h1 class="h6">Status :- <span class=" text-primary">Follow Up</span></h1>

                            @elseif ($item->status == "2")
                            <h1 class="h6 ">Status :- <span class="text-warning">Payment Made</span></h1>

                            @elseif ($item->status == "3")
                            <h1 class="h6 ">Status :- <span class="text-warning">Completed</span></h1>

                            @elseif ($item->status == "4")
                            <h1 class="h6 ">Status :- <span class="text-danger">Rejected</span></h1>

                            @endif
                            <h1 class="h5 text-primary">Enquiry ID :- <span class="text-dark">{{$item->enquiry_id}}</span> </h1>
                            <h1 class="h5 text-primary">Course  :- <span class="text-dark">{{$item->Course->name}}</span></h1>
                            <p class="h6 text-primary">Enquired Date and Time  :- <span class="text-dark">{{$item->created_at->format('d,'.' F'.' y'.', H:m')}}</span></p>
                        </div>
                    </div>
                @empty
                    <p class="text-danger text-center h5 mt-5">No Enquiries Found</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection