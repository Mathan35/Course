@extends('layouts.user.dashboard-header')
@section('content')
      


    <!-- Page Header section start here -->
    <div class="pageheader-section style-2">
        <div class="container ">
            <div class="row  ">
                <div class="col-lg-12 col-12 mb-5">
                    <div class="pageheader-content mb-5">
                        <h3 class="phs-title mb-3"><a href="{{route('home')}}">Home</a> / <a href="{{route('education-detail')}}">Education Detail</a> / <span class="text-primary">Edit Ug Education Details</span> </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header section ending here -->

    <!-- course section start here -->
    <div class="course-single-section padding-tb section-bg ">
        <div class="container card bg-light">
            <div class="m-3">
              
                <!-- Messages -->
                <x-Message-component/> 

                <h1 class="h4 text-light bg-primary shadow rounded p-2">Education Details :-</h1>
                <form action="{{route('pg-degree.update',$getDegree->id)}}" method="POST" enctype = "multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <h1 class="h4">Update PG Degree :-</h1>
                    <div class="form-group">
                        <label for="">Passed Out Year</label>
                        <input type="text" name="passed_out" class="form-control" id="" value="{{$getDegree->passed_out}}" aria-describedby="" placeholder="Optional">
                    </div>
                    <div class="form-group">
                        <label for="">Studying Year</label>
                        <input type="text" name="studying_year" class="form-control" value="{{$getDegree->studying_year}}" id="" aria-describedby="" placeholder="Optional">
                    </div>

                    <div class="form-group">
                        <label for="">Degree</label>
                        <input type="text" hidden name="degree_id" class="form-control" id="" value="{{$getDegree->degree->id}}" aria-describedby="" placeholder="">
                        <input type="text" name="degree" class="form-control" id="" value="{{$getDegree->degree->name}}" aria-describedby="" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" name="degree_image"  class="form-control" id="" value="{{$getDegree->degree->image}}" aria-describedby="" placeholder="">
                    </div>
                    <img height="100" src="{{asset('assets/images/'.$getDegree->degree->image)}}" alt="">


                    <div class="form-group">
                        <label for="">Specializtion</label>
                        <input type="text" hidden name="specialization_id" class="form-control" id="" value="{{$getDegree->specialization->id}}" aria-describedby="" placeholder="">
                        <input type="text" name="specializtion" class="form-control" id="" value="{{$getDegree->specialization->name}}" aria-describedby="" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" name="specialization_image"  class="form-control" value="{{$getDegree->specialization->image}}" id="" aria-describedby="" placeholder="">
                    </div>
                    <img height="100" src="{{asset('assets/images/'.$getDegree->specialization->image)}}" alt="">


                    <div class="form-group">
                        <label for="">College</label>
                        <input type="text" hidden name="college_id" class="form-control" id="" value="{{$getDegree->college->id}}" aria-describedby="" placeholder="">
                        <input type="text" name="college" class="form-control" id="" value="{{$getDegree->college->name}}" aria-describedby="" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" name="college_image"  class="form-control" id=""  value="{{$getDegree->college->image}}" aria-describedby="" placeholder="">
                    </div>
                    <img height="100" src="{{asset('assets/images/'.$getDegree->college->image)}}" alt="">

                    <div class="form-group">
                        <label for="">Location</label>
                        <input type="text" name="location" class="form-control" id="" value="{{$getDegree->college->location}}" aria-describedby="" placeholder="">
                    </div>

                    <button type="submit" class="btn btn-primary mt-4 mb-4">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection