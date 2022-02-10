@extends('layouts.admin.side-menu')
 @section('content')
 
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Role Permission Management</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item active">Create Role Permission</li>
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

                    <h5 class="card-title">Create Role Permissions</h5>
                    <form action="{{route('role-permission.store')}}" method="post" >
                        @csrf
                        <label for="">Role Name</label>
                        <input class="form-control" type="text" name="role" id="flexCheckDefault">

                        <label class="mt-3 text-primary" for="">Select Permissions</label>
                        <div class = "mt-3 mb-3">
                            <div class="row">
                                                             
                              @foreach ($permissionGroup as $item)
                                <div class="col-2 border rounded m-1">
                                  <div class="m-1"><strong class="text-primary">{{$item->name}}</strong></div>
                                   @foreach ($item->permission as $value)   
                                      <div class="form-check m-1">
                                          <input class="form-check-input" type="checkbox" name="permission_id[]" value="{{$value->id}}" id="flexCheckDefault">
                                          <label class="form-check-label" for="flexCheckDefault">{{$value->name}}</label>
                                      </div>
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