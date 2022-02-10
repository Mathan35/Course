@extends('layouts.admin.side-menu')
 @section('content')
 
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Course Technology</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item active">View Category Technology</li>
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

                  <h5 class="card-title">View Category Technology</h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Technology Name</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($category as $item)
                        <tr>
                        <th>{{$item->id}}</th>
                            <td>{{$item->name}}</td>
                            <td>
                              @foreach ($item->course as $value)
                              {{$value->name}},
                              @endforeach
                            </td>
                            <td class="d-flex">
                              @can('ViewCategoryCourse','App\Models\Category')
                                <div class="p-1">
                                    <a class=" btn btn-outline-success btn-sm" href="{{route('category-course.edit',$item->id)}}"> <i class="bi bi-pencil-fill"></i></a>
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