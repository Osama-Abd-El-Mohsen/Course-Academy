@extends('layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content-header">
            <br></br>
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header" style="width:100%; display:flex; justify-content: center;">
                                <h3 class="card-title" style="font-weight: bold;  font-size:25px;">Courses Content</h3>
                            </div>
                            <div class="card-header" style="width:100%; display:flex; justify-content: center;">
                                <a href="{{route("courses.create")}}" style="width:10%; display:flex; justify-content: center;" type="button" class="btn btn-success">Add</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Level</th>
                                            <th>Price</th>
                                            <th>Control</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($courses as $course)
                                            <tr>
                                                <td>{{ $course->Name }}</td>
                                                <td>{{ $course->Description }}</td>
                                                <td>{{ $course->Level }}</td>
                                                <td> {{ $course->Price }}</td>
                                                <td>
                                                    <div class="btn-group" style="width:20px">
                                                        <button type="button" class="btn btn-success">Show</button>
                                                        <button type="button" class="btn btn-info">Edit</button>
                                                        <button type="button" class="btn btn-danger">Delete</button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->


                    </div>
                    <!-- /.col -->
                </div>
            </section>
        </section>
        <!-- Content Header (Page header) -->
    </div>
@endsection
