@extends('layouts.admin.side-menu')
 @section('content')
 
    <main id="main" class="main">

        <div class="pagetitle">
        <h1>Admin User Management</h1>
            <nav>
            <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('admin-user.index')}}">Admin Users</a></li>
                    <li class="breadcrumb-item active">Edit Admin User</li>
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

                    <h5 class="card-title">Edit Admin User</h5>
                        <form action="{{route('admin-user.update',$user->id)}}" method="post" enctype = "multipart/form-data">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label for="Name">User Name</label>
                                <input type="text" value="{{$user->name}}" name = "name" class="form-control" id="" aria-describedby="Name" >
                            </div>
                            <div class="form-group">
                                <label for="Name">Email</label>
                                <input type="email"  value="{{$user->email}}" name = "email" class="form-control" id="" aria-describedby="email" >
                            </div>
                            <div class="form-group">
                                <label for="Name">Password</label>
                                <input type="password"  value="{{Hash::make($user->password)}}" name = "password" class="form-control" id="" aria-describedby="password" >
                            </div>
                            <label for="Name">Select Role</label>
                            <select class="form-select" name="role" aria-label="Default select example">
                                @foreach ($role as $item)                                
                                <option value="{{$item->id}}" {{$user->Role->name == $item->name? "selected":" "}}>{{$item->name}}</option>
                                @endforeach
                            </select>
                            
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