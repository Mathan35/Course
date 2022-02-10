@extends('layouts.admin.side-menu')
 @section('content')
 
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Course</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item"><a href="{{route('batch-users')}}">Batch Users</a></li>
          <li class="breadcrumb-item active">View Course</li>
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

                  <h5 class="card-title">View Course</h5>
                  <h2 class="h6 mt-3 text-primary"> Batch Name :- <span class="text-dark">{{$batch->name}} </span></h2>
                  <h2 class="h6 mt-3 text-primary mb-3"> Batch Timing :- <span class="text-dark">{{$batch->timing}} </span></h2>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                      <th scope="col">#</th>
                        <th scope="col">User Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Course</th>
                      
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($batch->enquiry as $value)
                        <tr>
                            <th>{{$value->enquiry_id}}</th>
                            <td>{{$value->User->name}}</td>
                            <td>{{$value->User->email}}</td>
                            <td>{{$value->Course->name}}</td>
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