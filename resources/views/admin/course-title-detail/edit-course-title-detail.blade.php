@extends('layouts.admin.side-menu')
 @section('content')
 
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Course Title Details</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item"><a href="{{route('course-title-description.index')}}">View Course Title Details</a></li>
          <li class="breadcrumb-item active">Create Course Title Details</li>
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

                  <h5 class="card-title">Edit Course Title Details</h5>

                    <form action="{{route('course-title-description.update', $courseTitleDetail->id)}}" method="post" enctype = "multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">

                      <select class="form-select" name="course_title_id" aria-label="Default select example">
                          @foreach ($courseTitle as $item)                        
                          <option {{$courseTitleDetail->course_title_id == $item->id? 'selected':''}} value="{{$item->id}}">{{$item->title}}</option>
                          @endforeach
                      </select>
                  
                      <div class="form-group">
                          <label for="description">Description</label>
                          <textarea class="form-control" name = "description"  id="exampleFormControlTextarea1" rows="3">{{$courseTitleDetail->description}}</textarea>
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