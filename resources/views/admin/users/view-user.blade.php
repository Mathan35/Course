@extends('layouts.admin.side-menu')
 @section('content')
 
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Users Management </h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item"><a href="{{route('users-list')}}">Users List</a></li>
          <li class="breadcrumb-item active">View User</li>
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
                  
                  <h5 class="card-title">View Users Details</h5>

                  <h2 class="h6 mt-2 text-primary"> User Name :- <span class="text-dark">{{$user->name}} </span></h2>
                  <h2 class="h6 mt-2 text-primary"> Email :- <span class="text-dark">{{$user->email}} </span></h2>
                  <h2 class="h6 mt-2 text-primary"> Date Of Birth :- <span class="text-dark">{{$user->dob}} </span></h2>
                  <h2 class="h6 mt-2 text-primary"> Status :- <span class="text-success">{{$user->status == "0"? "In-Active":"Active"}} </span></h2>

                  <h5 class="card-title">Ug Degree Details</h5>
                  @if (@empty($user->userUgDegree->id ))
                  <p class="text-danger">data not found</p>
                  @else
                  <h2 class="h6 mt-2 text-primary"> College Name :- <span class="text-dark">{{$user->userUgDegree->college->name}} </span></h2>
                  <h2 class="h6 mt-2 text-primary"> Degree :- <span class="text-dark">{{$user->userUgDegree->degree->name}} </span></h2>
                  <h2 class="h6 mt-2 text-primary"> Specialization  :- <span class="text-dark">{{$user->userUgDegree->specialization->name}} </span></h2>
                  <h2 class="h6 mt-2 text-primary"> Studying Year  :- <span class="text-dark">{{$user->userUgDegree->studying_year}} </span></h2>
                  <h2 class="h6 mt-2 text-primary"> Passed Out  :- <span class="text-dark">{{$user->userUgDegree->passed_out}} </span></h2>
                  <h2 class="h6 mt-2 text-primary"> Specialization  :- <span class="text-dark">{{$user->userUgDegree->specialization->name}} </span></h2>
                  @endif

                  <h5 class="card-title">Pg Degree Details</h5>
                  @if (@empty($user->userPgDegree->id))
                  <p class="text-danger">data not found</p>
                  @else
                  <h2 class="h6 mt-2 text-primary"> College Name :- <span class="text-dark">{{$user->userPgDegree->college->name}} </span></h2>
                  <h2 class="h6 mt-2 text-primary"> Degree :- <span class="text-dark">{{$user->userPgDegree->degree->name}} </span></h2>
                  <h2 class="h6 mt-2 text-primary"> Specialization  :- <span class="text-dark">{{$user->userPgDegree->specialization->name}} </span></h2>
                  <h2 class="h6 mt-2 text-primary"> Studying Year  :- <span class="text-dark">{{$user->userPgDegree->studying_year}} </span></h2>
                  <h2 class="h6 mt-2 text-primary"> Passed Out  :- <span class="text-dark">{{$user->userPgDegree->passed_out}} </span></h2>
                  <h2 class="h6 mt-2 text-primary"> Specialization  :- <span class="text-dark">{{$user->userPgDegree->specialization->name}} </span></h2>
                  @endif
                 
                  <h5 class="card-title">Ug Degree Details</h5>


                  <h5 class="card-title">Enquiries :-</h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">Enquiry ID</th>
                        <th scope="col">Course</th>
                        <th scope="col">Enquiry Status</th>
                        <th scope="col">Enquiry Date & Time</th>
                      
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($user->enquiry as $item)
                      <tr>
                            <th>{{$item->enquiry_id}}</th>
                            <td>{{$item->course->name}}</td>
                            <td>

                              @if ($item->status == "1")
                               <span class="text-info">Follow Up </span>
                              @elseif ($item->status == "2")
                               <span class="text-warning">Payment Made </span>
                              @elseif ($item->status == "0")
                               <span class="text-warning">Pending </span>
                              @elseif ($item->status == "3")
                               <span class="text-success">Completed </span>
                              @endif

                            </td>
                            <td>{{$item->date}} , {{$item->time}}</td>
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