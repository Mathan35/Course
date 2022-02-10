@extends('layouts.admin.side-menu')
 @section('content')
 
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Payment Management </h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item"><a href="{{route('payment-details')}}">Payment Details</a></li>
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

                  <h5 class="card-title">View payment History</h5>
            
                  <table class="table table-bordered datatable mt-2">
                    <thead>
                      <tr>
                        <th scope="col">Enquiry ID</th>
                        <th scope="col">Payment Method</th>
                        <th scope="col">Payment Mode</th>
                        <th scope="col">Reference Number</th>
                        <th scope="col">Tax Number</th>
                        <th scope="col">Paid Amount</th>
                        <th scope="col">Date & Time</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($payment as $item)
        
                      <tr>
                        <th scope="row">{{$item->enquiry_id}}</th>
                        <td scope="row">{{$item->payment_method}}</td>
                        <td>{{$item->payment_mode}}</td>
                        <td>{{$item->reference_number}}</td>
                        <td>{{$item->tax_number}}</td>
                        <td>{{$item->amount}}</td>
                        <td>{{$item->created_at->format('M '.' d '.' Y '. ', H:m')}}</td>
                      </tr>

                    @endforeach

                    </tbody>
                  </table>
                </div>

              </div>
            </div><!-- End Recent Sales -->

          </div>
        </div><!-- End Left side columns -->

      </div>
    </section>

  </main><!-- End #main -->


@endsection