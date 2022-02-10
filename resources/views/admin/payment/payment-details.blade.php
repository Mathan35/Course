@extends('layouts.admin.side-menu')
 @section('content')
 
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Payment Management </h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item active">Payment Details</li>
        </ol>
      </nav>

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
                  
                  <h5 class="card-title">Payment Details</h5>
                        <div class="card rounded">
                            <div class="m-3">
                  
                              <table class="table table-bordered datatable mt-2">
                                <thead>
                                  <tr>
                                    <th scope="col">Enquiry ID</th>
                                    <th scope="col">User Name</th>
                                    <th scope="col">Course Name</th>
                                    <th scope="col">View</th>
                                  
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach ($enquiry as $item)
                    
                                  <tr>
                                    <th scope="row">{{$item->enquiry_id}}</th>
                                    <td scope="row">{{$item->User->name}}</td>
                                    <td>{{$item->course->name}}</td>
                                    <td><a class="btn btn-outline-info " href="{{route('view-payment',$item->enquiry_id)}}"> <i class="bi bi-eye-fill"></i></a></td>
                                  </tr>

                                @endforeach

                                </tbody>
                              </table>

                                </div>
                            </div>

                        </div>

                </div>

              </div>
            </div><!-- End Recent Sales -->

          </div>
        </div><!-- End Left side columns -->

      </div>
    </section>

  </main><!-- End #main -->


@endsection