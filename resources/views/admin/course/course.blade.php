@extends('layouts.admin.side-menu')
 @section('content')
 
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Course</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item active">Create Course</li>
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
                  <form action="{{route('course.store')}}" method="post" enctype = "multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="Name">Name</label>
                            <input type="text" name = "name" class="form-control" id="" aria-describedby="Name" >
                        </div>
                        <div class="form-group">
                            <label for="Name">Price</label>
                            <input type="text" name = "price" class="form-control" id="" aria-describedby="Name" >
                        </div>
                        <div class="form-group">
                          <label for="Name">Actual Price</label>
                          <input type="text" name="actual_price" class="form-control" id="" aria-describedby="Name" >
                        </div>
                        <div class="form-group">
                          <label for="Name">Offer Percentange</label>
                          <input type="text" name="offer_percentange" class="form-control" id="" aria-describedby="Name" >
                        </div>
                        <div class="form-group">
                          <label for="Name">Course Level</label>
                          <input type="text" name="course_level" class="form-control" id="" aria-describedby="Name" >
                        </div>
                        <div class="form-group">
                          <label for="Name">Course Duration</label>
                          <input type="text" name="course_duration" class="form-control" id="" aria-describedby="Name" >
                        </div>
                        <div class="form-group">
                          <label for="Name">Class Type</label>
                          <input type="text" name="class_type" class="form-control" id="" aria-describedby="Name" >
                        </div>
                        <div class="form-group">
                          <label for="Name">Language</label>
                          <input type="text" name="language" class="form-control" id="" aria-describedby="Name" >
                        </div>
                        <div class="form-group">
                            <label for="Name">Video URL</label>
                            <input type="text" name = "video_url" class="form-control" id="" aria-describedby="Name" >
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name = "image" class="form-control" id="" aria-describedby="image" >
                        </div>
                        <div class="form-group">
                            <label for="description">Short Description</label>
                            <textarea class="form-control" name = "short_description"  id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="description">Detailed Description</label>
                            <textarea class="form-control" name = "detailed_description"  id="exampleFormControlTextarea1" rows="3"></textarea>
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