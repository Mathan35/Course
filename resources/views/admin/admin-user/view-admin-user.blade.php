@extends('layouts.admin.side-menu')
 @section('content')
 
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Admin User</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item active">View Admin User</li>
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

                  <h5 class="card-title">View Admin User</h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                      <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $item)
                        <tr>
                            <th>{{$item->id}}</th>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->role->name}}</td>     
                            <td>
                              <div class="d-flex">
                                @can('EditAdminUser','App\Models\User')
                                <div class="p-1">
                                  <a class=" btn btn-outline-success btn-sm" href="{{route('admin-user.edit',$item->id)}}"> <i class="bi bi-pencil-fill"></i></a>
                                </div>
                                @endcan
                                @can('DeleteAdminUser','App\Models\User')
                                <div class="p-1">
                                  <form id="delete-form" class="" method="POST" action="{{route('admin-user.destroy', $item->id)}}">
                                      {{ csrf_field() }}
                                      {{ method_field('DELETE') }}

                                      <div class="form-group">
                                          <button class="btn btn-outline-danger btn-sm " type="submit"><i class="bi bi-trash-fill"></i></button>
                                      </div>
                                  </form>
                                </div>
                                @endcan
                              </div>
                            </td>                       
                        </tr>
                      @endforeach
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