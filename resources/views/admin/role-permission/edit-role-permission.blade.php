@extends('layouts.admin.side-menu')
 @section('content')
 
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Role Permission </h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item"><a href="{{route('role-permission.index')}}">View Role Permission </a></li>
          <li class="breadcrumb-item active">Edit Role Permission </li>
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

                  <h5 class="card-title">Edit Role Permission</h5>
                    <form action="{{route('role-permission.update',$role->id)}}" method="post" >
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <label for="">Role Name</label>
                        <input class="form-control" type="text" value="{{$role->name}}" name="role" id="flexCheckDefault">

                        <label for="">Permission</label>
                        <div class = "mt-3 mb-3">
                            <div class="row">                                    
                                @foreach ($permissionGroup as $value)
                                    <div class="col-2  border rounded m-1">
                                      <div class="m-1"><strong class="text-primary">{{$value->name}}</strong></div>
                                      @foreach ($value->permission as $item)
                                        @if(in_array($item->id, $checkedPermission))
                                        <div class="form-check mt-3">
                                            <input class="form-check-input" type="checkbox" name="permission_id[]" value="{{$item->id}}" checked id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">{{$item->name}}</label>
                                        </div>
                                        @else
                                        <div class="form-check mt-3">
                                            <input class="form-check-input" type="checkbox" name="permission_id[]" value="{{$item->id}}"  id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">{{$item->name}}</label>
                                        </div>
                                        @endif
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
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