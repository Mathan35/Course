@extends('layouts.admin.side-menu')
 @section('content')
 
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Payment Management </h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item"><a href="{{route('payment-view')}}">View Payments</a></li>
          <li class="breadcrumb-item active">Update Payment</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-10">
          <div class="row">
            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales">
                <div class="card-body">

                  <!-- Messages -->
                  <x-Message-component/>
                  <x-Fail-component/>
                  
                  <h5 class="card-title">Update payment Details</h5>

                  <h5>Course Name :- <span class="text-primary">{{$enquiry->course->name}}</span></h5>
                  <h5>Course Name :- <span class="text-primary">{{$enquiry->course->price}}</span></h5>
                  <h5>Paid Amount :- <span class="text-success">{{$enquiry->payment->sum('amount')}}</span></h5>
                  <h5>Remaining Amount :- <span class="text-danger">{{$enquiry->course->price - $enquiry->payment->sum('amount')}}</span></h5>
                  

               
                  <form action="{{route('store-payment',)}}" method="post">
                    @csrf
                    <input type="hidden" value="{{$enquiry->id}}" name="enquiry_id">
                    @if ($enquiry->batch_id == null)           
                      <label for="payment" class="mt-2">Batch</label>
                      <select class="form-select" name="batch_id" aria-label="Default select example">
                        @foreach ($Batch as $item)
                          <option value="{{$item->id}}">{{$item->name}} ({{$item->timing}})</option>
                        @endforeach
                      </select>
                    @endif


                    <label for="payment" class="mt-2">Payment Method</label>
                    <select class="form-select" name="payment_method" aria-label="Default select example">
                      <option value="Cash">Cash</option>
                      <option value="Google Pay">Google Pay</option>
                      <option value="Bank Transfer">Bank Transfer</option>
                    </select>

                    <label for="mode" class="mt-2">Payment Mode</label>
                    <select class="form-select" name="payment_mode" aria-label="Default select example">
                      @if(!in_array("Advance",$PaymentModes))
                        <option value="Advance">Advance</option>
                      @endif
                      @if(!in_array("EMI 1",$PaymentModes))
                        <option value="EMI 1">EMI 1</option>
                      @endif
                      @if(!in_array("EMI 2",$PaymentModes))
                        <option value="EMI 2">EMI 2</option>
                      @endif
                      @if(!in_array("Full Payment",$PaymentModes))
                        <option value="Full Payment">Full Payment</option>
                      @endif
                    </select>

                    <div class="form-group mt-2">
                      <label for="amount">Amount</label>
                      <input type="text" name="amount" class="form-control" id="" aria-describedby="" placeholder="Enter Amount">
                    </div>
                    <div class="form-group mt-2">
                      <label for="amount">Reference Number</label>
                      <input type="text" name="reference_number" class="form-control" id="" aria-describedby="" placeholder="Enter Reference Number">
                    </div>

                    <button type="submit" class="btn btn-outline-primary rounded mt-4">Update</button>

                  </form>

                </div>

              </div>
            </div><!-- End Recent Sales -->

          </div>
        </div><!-- End Left side columns -->

      </div>
    </section>

  </main><!-- End #main -->


@endsection