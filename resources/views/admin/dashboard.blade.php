@extends('layouts.admin.side-menu')
 @section('content')
 
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Enquiry</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$enquiryCount}}</h6>
                      <span class="text-primary small pt-1 fw-bold">Total Enquiry </span> 

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Payment </h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="ps-3">
                      <h6>${{$paymentCount}}</h6>
                      <span class="text-success small pt-1 fw-bold">Total Payment </span> 

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Users </h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$userCount}}</h6>
                      <span class="text-danger small pt-1 fw-bold">Total User </span>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales">
                <div class="card-body">
                  <h5 class="card-title">Recent Enquiries <span>| Today</span></h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">Enquiry ID</th>
                        <th scope="col">Users</th>
                        <th scope="col">Interested Course</th>
                        <th scope="col">Price</th>
                        <th scope="col">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($enquiry as $item)
               
                        <tr>
                          <th scope="row"><a href="#">{{$item->enquiry_id}}</a></th>
                          <td>{{$item->user->name}}</td>
                          <td>{{$item->course->name}}</td>
                          <td>{{$item->course->price}}</td>

                          @if ($item->status  == "0")
                          <td ><span class="text-light bg-danger rounded p-1">Pending</span></td>
                          @elseif ($item->status  == "1")
                          <td ><span class="text-light bg-info rounded p-1">Follow Up</span><td>
                          @elseif ($item->status  == "2")
                          <td ><span class="text-light bg-warning rounded p-1">Payment</span></td>
                          @elseif ($item->status  == "3")
                          <td><span  class="text-light bg-success rounded p-1">Completed</span></td>
                          @elseif ($item->status  == "4")
                          <td ><span class="text-light bg-danger rounded p-1">Rejected</span><td>      
                          @endif
                        </tr>
                               
                      @endforeach
                      
                    </tbody>
                  </table>
                </div>
              </div>
            </div><!-- End Recent Sales -->
          </div>

            <!-- Top Selling -->
            <div class="col-12">
              <div class="card top-selling">
                <div class="card-body pb-0">
                  <h5 class="card-title">Top Selling <span>| Today</span></h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">Preview</th>
                        <th scope="col">Course</th>
                        <th scope="col">Price</th>
                        <th scope="col">Sold</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($course as $item)  
                      @if($item->enquiry->count()>1)                        
                      <tr>
                        <th scope="row"><a href="#"><img src="{{asset('assets/images/'.$item->image)}}" alt=""></a></th>
                        <td><a href="#" class="text-primary fw-bold">{{$item->name}}</a></td>
                        <td>${{$item->price}}</td>
                        <td class="fw-bold">{{$item->enquiry->count()}}</td>
                      </tr>
                      @endif
                      @endforeach
                      
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Top Selling -->
        </div><!-- End Left side columns -->

         <!-- Right side columns -->
         <div class="col-lg-4">

          <!-- Recent Activity -->
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Recent Activity <span>| Today</span></h5>

              <div class="activity">
   
                @forelse ($enquiry as $item)                  
                <div class="activity-item d-flex">
                  <div class="activite-label ">{{$item->created_at->diffForHumans()}}</div>
                  <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                  <div class="activity-content">
                    {{$item->enquiry_id}} <a  class="fw-bold text-dark"> - {{$item->course->name}}</a> 
                    (
                      @if ($item->status == 0)
                      <a class="text-primary">Pending</a>
                      @elseif ($item->status == 1)
                      <a class="text-info">Follow Up</a>
                      @elseif ($item->status == 4)
                      <a class="text-warning">Rejected</a>
                      @elseif ($item->status == 2)
                      <a class="text-success">Payment</a>
                      @elseif ($item->status == 3)
                      <a class="text-secondary">Completed</a>
                      @endif
                    )
                  </div>
                </div><!-- End activity item-->
                @empty
                <p>No enquiries found</p>
                @endforelse

              </div>

            </div>
          </div><!-- End Recent Activity -->

          <!-- Website Traffic -->
          <div class="card">
            <div class="card-body pb-0">
              <h5 class="card-title">Website Traffic <span>| Today</span></h5>

              <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  echarts.init(document.querySelector("#trafficChart")).setOption({
                    tooltip: {
                      trigger: 'item'
                    },
                    legend: {
                      top: '5%',
                      left: 'center'
                    },
                    series: [{
                      name: 'Access From',
                      type: 'pie',
                      radius: ['35%', '70%'],
                      avoidLabelOverlap: false,
                      label: {
                        show: false,
                        position: 'center'
                      },
                      emphasis: {
                        label: {
                          show: true,
                          fontSize: '18',
                          fontWeight: 'bold'
                        }
                      },
                      labelLine: {
                        show: false
                      },
                      data: [{
                          value: {{$userCount}},
                          name: 'User'
                        },
                        {
                          value: {{$enquiryCount}},
                          name: 'Enquiries'
                        },
                        {
                          value: {{$paymentCount}},
                          name: 'Payment'
                        },
                        {
                          value: {{$courseCount}},
                          name: 'Courses'
                        },
                        // {
                        //   value: 500,
                        //   name: 'Video Ads'
                        // }
                      ]
                    }]
                  });
                });
              </script>

            </div>
          </div><!-- End Website Traffic -->

        </div><!-- End Right side columns -->
      </div>
    </section>

  </main><!-- End #main -->


@endsection