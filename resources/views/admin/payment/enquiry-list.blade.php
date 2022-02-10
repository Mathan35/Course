@extends('layouts.admin.side-menu')
 @section('content')
 
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Enquiry Management </h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item active">Enquiry List</li>
        </ol>
      </nav>

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
                  <x-Message-component/><br>

                  <div class="d-inline">
                    <a data-toggle="tooltip" data-placement="top" title="All status"  class="{{ (request()->is('enquiry-list/0')) ? 'btn btn-outline-primary' : 'btn btn-primary' }} text-decoration-none ml-3   p-1 rounded " href="{{route('enquiry-list',['status' => "0"])}}">All</a> 
                    <a data-toggle="tooltip" data-placement="top" title="Follow up"  class=" {{ (request()->is('enquiry-list/1')) ? 'btn btn-outline-primary' : 'btn btn-primary' }} text-decoration-none ml-3   p-1 rounded " href="{{route('enquiry-list',['status' => "1"])}}">Follow Up</a> 
                    <a data-toggle="tooltip" data-placement="top" title="Status rejected"  class="{{ (request()->is('enquiry-list/4')) ? 'btn btn-outline-primary' : 'btn btn-primary' }} text-decoration-none ml-3   p-1 rounded " href="{{route('enquiry-list',['status' => "4"])}}">Rejected</a>
                    <a data-toggle="tooltip" data-placement="top" title="Payment initiated or completed"  class="{{ (request()->is('enquiry-list/2')) ? 'btn btn-outline-primary' : 'btn btn-primary' }} text-decoration-none ml-3   p-1 rounded " href="{{route('enquiry-list',['status' => "2"])}}">Payment</a>
                    <a data-toggle="tooltip" data-placement="top" title="When payment completed"  class="{{ (request()->is('enquiry-list/3')) ? 'btn btn-outline-primary' : 'btn btn-primary' }} text-decoration-none ml-3   p-1 rounded " href="{{route('enquiry-list',['status' => "3"])}}">Completed</a>
                  </div>
                  
                  <h5 class="card-title">Enquiry List</h5>
                        <div class="card rounded">
                            <div class="m-3">
                  
                              <table class="table table-bordered datatable mt-2">
                                <thead>
                                  <tr>
                                    <th scope="col">Enquiry ID</th>
                                    <th scope="col">User Name</th>
                                    <th scope="col">Course Name</th>
                                    <th scope="col">Enquiry Date & Time</th>
                                    <th scope="col">Action</th>
                                  
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach ($enquiry as $item)
                    
                                  <tr>
                                    <th scope="row">{{$item->enquiry_id}}</th>
                                    <td scope="row">{{$item->user->name}}</td>
                                    <td>{{$item->course->name}}</td>
                                    <td>{{$item->date}} , {{$item->time}}</td>
                                    <td>
                                      @can('ChangeEnquiryStatus','App\Models\Enquiry')
                                      @if($item->status == "3")
                                        <button type="button" class="btn bg-success text-light rounded" data-bs-toggle="tooltip" data-bs-placement="top" title="Completed">C</button>
                                      @else
                                          @if ($item->status != "2")
                                            <a href="{{route('enquiry-status',['id'=>$item->id,'status'=>"1"])}}">
                                                <button type="button" class="btn {{$item->status == "1" ? "bg-info text-light":"btn-outline-info"}} rounded" data-bs-toggle="tooltip" data-bs-placement="top" title="Follow Up">F</button>
                                            </a>

                                            <a href="{{route('enquiry-status',['id'=>$item->id,'status'=>"4"])}}">
                                                <button type="button" class="btn {{$item->status == "4" ? "bg-danger text-light":"btn-outline-danger"}} rounded" data-bs-toggle="tooltip" data-bs-placement="top" title="Reject">R</button>
                                            </a>
                                          @endif
                                          <button type="button" class="btn {{$item->status == "2" ? "bg-warning text-light":"btn-outline-warning"}} rounded" data-bs-toggle="tooltip" data-bs-placement="top" title="Reject">P</button>

                                          <a href="{{route('enquiry-status',['id'=>$item->id,'status'=>"3"])}}">
                                            <button type="button" class="btn {{$item->status == "3" ? "bg-success text-light":"btn-outline-success"}} rounded" data-bs-toggle="tooltip" data-bs-placement="top" title="Completed">C</button>
                                          </a>
                                        @endif
                                      @endcan

                                    </td>
                                  </tr>

                                @endforeach

                                </tbody>
                              </table>

                                </div>
                            </div>

                        </div>

                </div>

              </div>
            </div><!-- End Recent Sales -->

          </div>
        </div><!-- End Left side columns -->

      </div>
    </section>

  </main><!-- End #main -->


@endsection