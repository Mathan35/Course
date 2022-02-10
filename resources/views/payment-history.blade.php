@extends('layouts.user.dashboard-header')
@section('content')
      


    <!-- Page Header section start here -->
    <div class="pageheader-section style-2">
        <div class="container ">
            <div class="row  ">
                <div class="col-lg-12 col-12 mb-5">
                    <div class="pageheader-content mb-5">
                        <h3 class="phs-title mb-3"><a href="{{route('home')}}">Home</a> / <span class="text-primary"> Payment History</span> </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header section ending here -->

    <!-- course section start here -->
    <div class="course-single-section padding-tb section-bg ">
        <div class="container card bg-light">
            <div class="m-5">
                <!-- Messages -->
                <x-Message-component/> 
                <h4 class="">Payment History</h4>

                <table class="table table-bordered mt-3">
                    <thead>
                      <tr>
                        <th scope="col">Enquiry ID</th>
                        <th scope="col">Course Name </th>
                        <th scope="col">Payment Method</th>
                        <th scope="col">Payment Mode</th>
                        <th scope="col">Reference Number</th>
                        <th scope="col">Tax Number</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Enquired Date and Time</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($enquiry as $value)   
                            @foreach ($value->Payment as $item)        
                                <tr>
                                    <th scope="row">{{$item->enquiry_id}}</th>
                                    <td scope="row">{{$value->course->name}}</td>
                                    <td scope="row">{{$item->payment_method}}</td>
                                    <td scope="row">{{$item->payment_mode}}</td>
                                    <td scope="row">{{$item->reference_number}}</td>
                                    <td scope="row">{{$item->tax_number}}</td>
                                    <td scope="row">{{$item->amount}}</td>
                                    <td scope="row">{{$item->created_at->format('d,'.' F'.' y'.', H:m')}}</td>
                                </tr>
                            @endforeach
                      @empty
                        <p class="text-danger">No Payment Made</p>
                      @endforelse

                    </tbody>
                  </table>




            </div>
        </div>
    </div>
@endsection