@extends('layouts.admin.side-menu')
 @section('content')
 
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Users Management </h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          {{-- <li class="breadcrumb-item"><a href="{{route('enquiry-list')}}">Users List</a></li> --}}
          <li class="breadcrumb-item active">Users List</li>
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

                  <h5 class="card-title">Users List</h5>

                  <table class="table table-bordered datatable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">User Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Status</th>
                        <th scope="col">Last Login Time</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($user as $item)
        
                      <tr>
                        <th scope="row">{{$item->id}}</th>
                        <td scope="row">{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>
                          @can('ChangeUserStatus','App\Models\User')

                            <a href="{{route('user-status',['id'=>$item->id,'status'=>"1"])}}">
                                <button type="button" class="btn {{$item->status == "1"? "bg-success text-light":"btn-outline-success "}}  h6 rounded" data-bs-toggle="tooltip" data-bs-placement="top" title="click to Acitve">Active</button>
                            </a>
                            <a href="{{route('user-status',['id'=>$item->id,'status'=>"0"])}}">
                            <button type="button" class="btn {{$item->status == "0"? "bg-danger text-light":"btn-outline-danger "}} h6 rounded" data-bs-toggle="tooltip" data-bs-placement="top" title="click In-Acitve">In-Active</button>
                            </a>
                          @else
                          <p class="text-danger">-</p>
                          @endcan
                           
                        </td>
                        <td>{{$item->last_login}}</td>
                        <td><a href="{{route('view-user',$item->id)}}">View</a></td>
                      </tr>
                                  
                      @empty
                        <p class="text-danger">No Payment Made by this user</p>
                      @endforelse

                    </tbody>
                  </table>


                </div>

              </div>
            </div><!-- End Recent Sales -->

          </div>
        </div><!-- End Left side columns -->

      </div>
    </section>

  </main><!-- End #main -->


@endsection