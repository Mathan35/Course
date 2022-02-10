<div>
   
    <!-- group select section start here -->
    <div class="group-select-section">
        <div class="container">
            <div class="section-wrapper">
                <div class="row align-items-center g-4">
                    <div class="col-md-1">
                        <div class="group-select-left">
                            <i class="icofont-abacus-alt"></i>
                            <span>Filters</span>
                        </div>
                    </div>
                    <div class="col-md-11">
                        <div class="group-select-right">
                            <div class="row g-2 row-cols-lg-3 row-cols-sm-2 row-cols-1 getvalue">
                                <div class="col">
                                    <div class="select-item" >
                                        <select id="category"  wire:model = "getCategory" name="category">
                                            <option selected value="0">All Categories</option>
                                            @foreach ($category as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                        <div class="select-icon">
                                            <i class="icofont-rounded-down"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="select-item">
                                        <select id="technology"  wire:model = "getTechnology" name="technology">
                                            <option selected value="0">All Technology</option>
                                            @foreach ($technology as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                        <div class="select-icon">
                                            <i class="icofont-rounded-down"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="select-item">
                                        <select id="price" name="price"  wire:model = "getPrice">
                                            <option selected value="0">All Prices</option>
                                            @foreach ($coursePrice as $item)
                                            <option value="{{$item->id}}">{{$item->price}}</option>
                                            @endforeach
                                        </select>
                                        <div class="select-icon">
                                            <i class="icofont-rounded-down"></i>
                                        </div>
                                    </div>
                                </div>
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- group select section ending here -->

    <!-- course section start here -->
    <div class="course-section padding-tb section-bg">
        <div class="container">
            <div class="section-header text-center ">
                <span class="subtitle">All Courses</span>
            </div>
            <div class="section-wrapper">
                <div class="row g-4 justify-content-center row-cols-xl-3 row-cols-md-2 row-cols-1">
                    @forelse($course as $item)
                    <div class="col">
                        <div class="course-item">
                            <div class="course-inner">
                                <div class="course-thumb">
                                    <img class="h-50 w-50" src="{{asset('assets/images/'.$item->image)}}" alt="course">
                                </div>
                                <div class="course-content">
                                    <div class="course-price">{{$item->price}}$</div>
                                    <a ><h5>{{$item->name}}</h5></a>
                                    <div class="course-details">
                                        <div class="couse-count"><i class="icofont-video-alt"></i> {{$item->short_description}}</div>
                                        <div class="couse-topic"><i class="icofont-signal"></i> Online Class</div>
                                    </div>
                                    <div class="course-footer">
                                        <div class="course-btn ">
                                            <a href="{{route('view-course',$item->id)}}" class="lab-btn-text text-center">Read More <i class="icofont-external-link"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                        <p class="text-danger text-center">No Courses Found...!</p>
                    @endforelse 	
                </div>
            </div>
        </div>
    </div>
</div>
