@extends('layouts.user.header')
@section('content')

    <!-- course section start here -->
    <div class="course-single-section padding-tb section-bg ">
        <div class="container card bg-light">
            <div class="m-5 table-responsive">
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