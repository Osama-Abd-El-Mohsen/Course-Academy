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
                                <table id="example2" class="table table-bordered ">
                                    <thead>
                                        <tr>
                                            <th style="width:30%">Title</th>
                                            <th style="width:30%">Description</th>
                                            <th style="width:10%">Level</th>
                                            <th style="width:10%">($) Price </th>
                                            <th style="width:100%">Control</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($courses as $course)
                                        <tr>
                                            <td>{{ $course->Name }}</td>
                                            <td>{{ $course->Description }}</td>
                                            <td>
                                                @if ($course->Level == 'advanced')
                                                    <span class="badge badge-danger" >{{ $course->Level }}</span>
                                                @elseif ($course->Level == 'beginner')
                                                    <span class="badge badge-success" >{{ $course->Level }}</span>
                                                @else
                                                    <span class="badge badge-warning" >{{ $course->Level }}</span>
                                                @endif
                                            </td>
                                            <td> {{ $course->Price }}</td>
                                            <td>
                                                    <form method="post" action={{route("courses.destroy",$course->id)}}>
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="btn-group" action="{{route("courses.destroy",$course->id)}}">
                                                            @csrf
                                                            @method('delete')
                                                            <a href="{{route("courses.students",$course->id)}}" type="button" class="btn btn-success">Students Rolled </a>
                                                            <a href="{{route("courses.edit",$course->id)}}" type="button" class="btn btn-info">Edit</a>
                                                            <button  type="submit" class="btn btn-danger">Delete</button>
                                                        </div>
                                                    </form>
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
