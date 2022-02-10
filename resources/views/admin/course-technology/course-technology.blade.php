@extends('layouts.admin.side-menu')
 @section('content')
 
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Course Technology</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item active">Create Course Technology</li>
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

                  <h5 class="card-title">Create Course</h5>
                    <form action="{{route('course-technology.store')}}" method="post" >
                        @csrf
                        <label for="">Course</label>
                        <select class="form-select" name="course_id" aria-label="Default select example">
                            @foreach ($course as $item)  
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach

                        </select>
                        <label for="">Technology</label>
                        <div class = "mt-3 mb-3">
                            @foreach ($technology as $item)
                            <div class="form-check mt-3">
                                <input class="form-check-input" type="checkbox" name="technology_id[]" value="{{$item->id}}" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">{{$item->name}}</label>
                            </div>
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