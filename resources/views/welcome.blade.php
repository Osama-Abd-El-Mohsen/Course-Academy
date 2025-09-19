@extends('layouts.home')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        {{-- @dd($courses) --}}
        <!-- Content Header (Page header) -->
        <div class="content-header">

        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">

            <div class="container-fluid">
                <div class="row">
                    @foreach ($courses as $course)
                        <div class="col-md-3">
                            <div
                                @if($course->Level == "beginner")  class="card card-success card-outline"
                                @elseif ($course->Level == "intermediate") class="card card-warning card-outline"
                                @else class="card card-danger card-outline" @endif >
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        {{-- <img class="profile-user-img img-fluid img-circle" alt="User profile picture"> --}}
                                    </div>
                                    <h3 class="profile-username text-center">{{ $course->Name }}</h3>
                                    <p class="text-muted text-center">{{ $course->Description }}</p>
                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item">
                                            <b>Level</b> <a class="float-right">{{ $course->Level }}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Price</b> <a class="float-right">{{ $course->Price."$" }}</a>
                                        </li>
                                    </ul>
                                    <a href=@guest{{ '/login' }}@endguest @auth {{"#"}} @endauth

                                        @if($course->Level == "beginner")  class="btn btn-success btn-block"
                                        @elseif ($course->Level == "intermediate") class="btn btn-warning btn-block"
                                        @else class="btn btn-danger btn-block" @endif
                                        ><b>
                                            @auth
                                                @if(Auth::user()->courses()->where('courses.id', $course->id)->count()>0)
                                                    Rolled
                                                @else  Roll Now
                                                @endif
                                            @endauth
                                            @guest
                                                Roll In Now
                                            @endguest
                                        </b></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
