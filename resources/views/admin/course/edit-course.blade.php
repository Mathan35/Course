@extends('layouts.admin.side-menu')
 @section('content')
 
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Course</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item"><a href="{{route('course.index')}}">View Course</a></li>
          <li class="breadcrumb-item active">Edit Course</li>
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

                    <form action="{{route('course.update',$course->id)}}" method="post" enctype = "multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <label for="Name">Name</label>
                            <input type="text" value="{{$course->name}}" name = "name" class="form-control" id="" aria-describedby="Name" >
                        </div>
                        <div class="form-group">
                            <label for="Name">Price</label>
                            <input type="text" value="{{$course->price}}" name = "price" class="form-control" id="" aria-describedby="Name" >
                        </div>
                        <div class="form-group">
                          <label for="Name">Actual Price</label>
                          <input type="text" value="{{$course->actual_price}}" name = "actual_price" class="form-control" id="" aria-describedby="Name" >
                        </div>
                        <div class="form-group">
                            <label for="Name">Video URL</label>
                            <input type="text" value="{{$course->video_url}}" name = "video_url" class="form-control" id="" aria-describedby="Name" >
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" value="{{$course->image}}" name = "image" class="form-control" id="" aria-describedby="image" >
                        </div>
                        <img class="mt-3 mb-3" width="100" height="100" src="{{asset('assets/images/'.$course->image)}}" alt="">
                        <div class="form-group">
                            <label for="description">Short Description</label>
                            <textarea class="form-control" name = "short_description"  id="exampleFormControlTextarea1" rows="3">{{$course->short_description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="description">Detailed Description</label>
                            <textarea class="form-control" name = "detailed_description"  id="exampleFormControlTextarea1" rows="3">{{$course->detailed_description}}</textarea>
                        </div>
                        <button class="btn btn-primary mt-4 mb-3 text-dark " type="submit">Update</button>
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