@extends('layouts.admin.side-menu')
 @section('content')
 
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Course</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
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

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                      <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Timing</th>
                        <th scope="col">Users Count</th>
                      
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($batch as $item)
                        <tr>
                            <th>{{$item->id}}</th>
                            <td>{{$item->name}}</td>
                            <td>{{$item->timing}}</td>
                            <td>{{$item->Enquiry->count('User')}}</td>
                            <td class="d-flex">
                                <div class="p-1">
                                    <a class=" btn btn-outline-primary btn-sm" href="{{route('view-batch-users',$item->id)}}"> <i class="bi bi-eye-fill"></i></a>
                                </div>
                            </td>
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