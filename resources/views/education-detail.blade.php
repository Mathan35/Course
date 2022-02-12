@extends('layouts.user.header')
@section('content')
    <!-- course section start here -->
    <div class="course-single-section padding-tb section-bg ">
        <div class="container card bg-light">
            <div class="m-3">
                <!-- Messages -->
                <x-Message-component/>

                <h1 class="h4 text-light bg-primary shadow rounded p-2">Education Details :-</h1>
                @if ($getEducation == null)
                    <form action="{{route('ug-degree.store')}}" method="post" enctype = "multipart/form-data">
                        @csrf
                        <h1 class="h4">UG Degree <span>(Mandatory)</span> :-</h1>
                        <x-degree-form-component/>
                    </form>
                @else
                    <div class="card mb-5">
                        <div class="m-3">
                            <a href="{{route('ug-degree.edit',$getEducation['id'])}}">
                                <h1 class="position-relative btn btn-outline-primary shadow-sm">Edit</h1>
                            </a>
                            <h1 class="h4">UG Degree :-</h1>

                            <h1 class="h5 text-primary mt-3">Passed Out Year :- <span class="text-dark">{{$getEducation['passed_out']}}</span></h1>
                            <h1 class="h5 text-primary mt-3">Studying Year :- <span class="text-dark">{{$getEducation ['studying_year']}}</span></h1>
                            <h1 class="h5 text-primary mt-3">Degree :- <span class="text-dark">{{$getEducation->degree->name}}</span></h1>
                            <h1 class="h5 text-primary mt-3">Specialization :- <span class="text-dark">{{$getEducation->specialization->name}}</span></h1>
                            <h1 class="h5 text-primary mt-3">College :- <span class="text-dark">{{$getEducation->college->name}}</span></h1>
                            <h1 class="h5 text-primary mt-3">Location :- <span class="text-dark">{{$getEducation->college->location}}</span></h1>
                        </div>
                    </div>
                @endif

                @if ($getPgEducation == null)
                    
                    <form action="{{route('pg-degree.store')}}" method="POST" enctype = "multipart/form-data">
                        @csrf
                        <h1 class="h4">PG Degree <span>(Optional)</span> :-</h1>
                        <x-degree-form-component/>
                    </form>
                @else
                    <div class="card mb-5">
                        <div class="m-3">
                            <a href="{{route('pg-degree.edit',$getPgEducation['id'])}}">
                                <h1 class="position-relative btn btn-outline-primary shadow-sm">Edit</h1>
                            </a>
                            <h1 class="h4">Pg Degree :-</h1>
                            <h1 class="h5 text-primary mt-3">Passed Out Year :- <span class="text-dark">{{$getPgEducation['passed_out']}}</span></h1>
                            <h1 class="h5 text-primary mt-3">Studying Year :- <span class="text-dark">{{$getPgEducation ['studying_year']}}</span></h1>
                            <h1 class="h5 text-primary mt-3">Degree :- <span class="text-dark">{{$getPgEducation->degree->name}}</span></h1>
                            <h1 class="h5 text-primary mt-3">Specialization :- <span class="text-dark">{{$getPgEducation->specialization->name}}</span></h1>
                            <h1 class="h5 text-primary mt-3">College :- <span class="text-dark">{{$getPgEducation->college->name}}</span></h1>
                            <h1 class="h5 text-primary mt-3">Location :- <span class="text-dark">{{$getPgEducation->college->location}}</span></h1>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection