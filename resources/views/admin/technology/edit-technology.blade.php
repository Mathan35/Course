@extends('layouts.admin.side-menu')
 @section('content')
 
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Technology</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item "><a href="{{route('technology.index')}}">View Technology</a></li>
          <li class="breadcrumb-item active">Edit Technology</li>
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
                  
                  <h5 class="card-title">Edit Technology</h5>
                    <form action="{{route('technology.update',$technology->id)}}" method="post" enctype = "multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label for="Name">Name</label>
                                <input type="text" value="{{$technology->name}}" name = "name" class="form-control" id="exampleInputEmail1" aria-describedby="Name" >
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" value="{{$technology->image}}" name = "image" class="form-control" id="exampleInputEmail1" aria-describedby="image" >
                            </div>
                            <img class="mt-3 mb-3" width="100" height="100" src="{{asset('assets/images/'.$technology->image)}}" alt="">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" name = "description"  id="exampleFormControlTextarea1" rows="3">{{$technology->description}}</textarea>
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