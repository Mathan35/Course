@extends('layouts.admin.side-menu')
 @section('content')
 
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Course Learnings</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item"><a href="{{route('learning.index')}}">View Learnings</a></li>
          <li class="breadcrumb-item active">Edit Learning</li>
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

                  <h5 class="card-title">Edit Course</h5>

                    <form action="{{route('learning.update', $learning->id)}}" method="post" enctype = "multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <label for="Name">Course</label>
                        <select class="form-select" name="course_id" aria-label="Default select example">
                            @foreach ($course as $item)
                            <option {{$item->id == $learning->course->id? 'selected':''}} value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                        <div class="form-group">
                            <label for="Name">Name</label>
                            <input type="text" name = "name" value="{{$learning->name}}" class="form-control" id="" aria-describedby="Name" >
                        </div>
                    
                        <button class="btn btn-primary mt-4 mb-3 text-dark " type="submit">Submit</button>
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