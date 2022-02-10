@extends('layouts.admin.side-menu')
 @section('content')
 
  <main id="main" class="main">

    <div class="pagetitle">
      <h1> Role Permission Management</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item active">View  Role Permission</li>
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

                  <h5 class="card-title">View Role Permission</h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Role Name</th>
                        <th scope="col">Permissions </th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($role as $item)
                        <tr>
                        <th>{{$item->id}}</th>
                            <td class="text-primary">{{$item->name}}</td>
                            <td>
                                <div class="row">
                                    @foreach ($item->permissions as $value)
                                        <div class="col-2">
                                            {{$value->name}},
                                        </div>
                                    @endforeach
                                </div>
                            </td>
                            <td class="d-flex">
                              @can('ViewRolePermission','App\Models\Role')
                                <div class="p-1">
                                    <a class=" btn btn-outline-success btn-sm" href="{{route('role-permission.edit',$item->id)}}"> <i class="bi bi-pencil-fill"></i></a>
                                </div>
                                @endcan
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