@extends('layouts.admin.side-menu')
 @section('content')
 
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Category Course </h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item"><a href="{{route('category-course.index')}}">View Category Course </a></li>
          <li class="breadcrumb-item active">Edit Category Course </li>
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

                  <h5 class="card-title">Edit Category Course</h5>
                    <form action="{{route('category-course.update',$category->id)}}" method="post" >
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <label for="">Category Name</label>
                        <input class="form-control" type="text" value="{{$category->name}}" name="name" id="flexCheckDefault">

                        <label for="">Technology</label>
                        <div class = "mt-3 mb-3">
                            @foreach ($course as $value)
                            @if(in_array($value->id, $checkedCourse))
                            <div class="form-check mt-3">
                                <input class="form-check-input" type="checkbox" name="course_id[]" value="{{$value->id}}" checked id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">{{$value->name}}</label>
                            </div>
                            @else
                            <div class="form-check mt-3">
                                <input class="form-check-input" type="checkbox" name="course_id[]" value="{{$value->id}}"  id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">{{$value->name}}</label>
                            </div>
                            @endif
                            @endforeach
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