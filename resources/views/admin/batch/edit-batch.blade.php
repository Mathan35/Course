@extends('layouts.admin.side-menu')
 @section('content')
 
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Batch Management</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item"><a href="{{route('batch.index')}}">View Batch</a></li>
          <li class="breadcrumb-item active">Update Batch</li>
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

                  <h5 class="card-title">Update Batch</h5>
                  <form action="{{route('batch.update', $batch->id)}}" method="post" enctype = "multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <label for="Name">Batch Name</label>
                            <input type="text" value="{{$batch->name}}" name = "name" class="form-control" id="" aria-describedby="Name" >
                        </div>
                        <div class="form-group">
                            <label for="Name">Batch Timing</label>
                            <input type="text" value="{{$batch->timing}}" name = "timing" class="form-control" id="" aria-describedby="Name" >
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