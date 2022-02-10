@extends('layouts.admin.side-menu')
 @section('content')
 
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>System Settings</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item active">System Settings</li>
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

                  <h5 class="card-title">Update System Settings</h5>
                    <form action="{{route('update-settings')}}" method="post" enctype = "multipart/form-data" >
                        @csrf
                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">System Name</label>
                                <div class="col-sm-10">
                                    <input value="{{$settings == null? " ":$settings->name}}" name="name" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="logo" class="col-sm-2 col-form-label">Logo</label>
                                <div class="col-sm-10">
                                <input name="logo"  value="{{$settings == null? " ":$settings->logo}}" class="form-control" type="file" id="formFile">
                                </div>
                                @if ($settings->logo != null)
                                <img class="m-3 admin-image" src="{{asset('assets/images/'.$settings->logo)}}" alt="">
                                @endif
                            </div>

                            <div class="row mb-3">
                                <label for="logo" class="col-sm-2 col-form-label">Home Background Image</label>
                                <div class="col-sm-10">
                                <input name="background_image"  value="{{$settings == null? " ":$settings->background_image}}" class="form-control" type="file" id="formFile">
                                </div>
                                @if ($settings != null)
                                @if ($settings->background_image != null)                                
                                <img class="m-3 admin-image" src="{{asset('assets/images/'.$settings->background_image)}}" alt="">
                                @endif
                                @endif
                            </div>

                            <div class="row mb-3">
                              <label for="logo" class="col-sm-2 col-form-label">Home Background Centered Image</label>
                              <div class="col-sm-10">
                              <input name="background_centered_image"  value="{{$settings == null? " ":$settings->background_centered_image}}" class="form-control" type="file" id="formFile">
                              </div>
                              @if ($settings != null)
                              @if ($settings->background_centered_image != null)                                
                              <img class="m-3 admin-image" src="{{asset('assets/images/'.$settings->background_centered_image)}}" alt="">
                              @endif
                              @endif
                          </div>

                            <div class="row mb-3">
                              <label for="logo" class="col-sm-2 col-form-label">Login & Registration Background Image</label>
                              <div class="col-sm-10">
                              <input name="login_background_image"  value="{{$settings == null? " ":$settings->login_background_image}}" class="form-control" type="file" id="formFile">
                              </div>
                              @if ($settings != null)
                              @if ($settings->login_background_image != null)                                
                              <img class="m-3 admin-image" src="{{asset('assets/images/'.$settings->login_background_image)}}" alt="">
                              @endif
                             @endif
                            </div>
                            <div class="row mb-3">
                              <label for="background_title" class="col-sm-2 col-form-label">Home Background Header</label>
                              <div class="col-sm-10">
                                  <input value="{{$settings == null? " ":$settings->background_header}}" name="background_header" type="text" class="form-control">
                              </div>
                            </div>
                            <div class="row mb-3">
                                <label for="background_title" class="col-sm-2 col-form-label">Home Background Title</label>
                                <div class="col-sm-10">
                                    <input value="{{$settings == null? " ":$settings->background_title}}" name="background_title" type="text" class="form-control">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="background_description" class="col-sm-2 col-form-label"> Home Background description</label>
                                <div class="col-sm-10">
                                  <textarea name="background_description" class="form-control" style="height: 100px">{{$settings == null? " ":$settings->background_description}}</textarea>
                                </div>
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