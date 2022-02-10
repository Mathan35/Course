@extends('layouts.admin.side-menu')
 @section('content')
 
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Payment Management </h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item active"> Payment Pending</li>
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

                  <h5 class="card-title">View payment Pending</h5>
            
                  <table class="table table-bordered datatable mt-2">
                    <thead>
                      <tr>
                        <th scope="col">Enquiry ID</th>
                        <th scope="col">User Name </th>
                        <th scope="col">Course</th>
                        <th scope="col">Course Price</th>
                        <th scope="col">Paid Amount</th>
                        <th scope="col">Pending Amount</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($getEnquiry as $item)
                        
                      <tr>
                        <th scope="row">{{$item->enquiry_id}}</th>
                        <td scope="row">{{$item->user->name}}</td>
                        <td>{{$item->course->name}}</td>
                        <td>{{$item->course->price}}</td>
                        <td class="text-success">{{$item->payment->sum('amount')}}</td>
                        <td class="text-danger">{{$item->course->price - $item->payment->sum('amount')}}</td>
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