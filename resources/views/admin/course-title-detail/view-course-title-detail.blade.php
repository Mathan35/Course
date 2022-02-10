@extends('layouts.admin.side-menu')
 @section('content')
 
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Course Title Details</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item active">View Course Title Details</li>
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

                  <h5 class="card-title">View Course Title Deatails</h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Course Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($courseTitleDetail as $item)
                        <tr>
                            <th>{{$item->id}}</th>
                            <td>{{$item->courseTitle->title}}</td>
                            <td>{{$item->description}}</td>
                            <td class="d-flex">
                                <div class="p-1">
                                    <a class=" btn btn-outline-success btn-sm" href="{{route('course-title-description.edit',$item->id)}}"> <i class="bi bi-pencil-fill"></i></a>
                                </div>

                                <div class="p-1">
                                <form id="delete-form" class="" method="POST" action="{{route('course-title-description.destroy', $item->id)}}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <div class="form-group">
                                        <button class="btn btn-outline-danger btn-sm " type="submit"><i class="bi bi-trash-fill"></i></button>
                                    </div>
                                </form>
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