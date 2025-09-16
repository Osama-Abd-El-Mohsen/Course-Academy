@extends('layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content-header">
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header" style="width:100%; display:flex; justify-content: center;">
                                <h3 class="card-title" style="font-weight: bold;  font-size:25px;">Courses Registers Content</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Course Name</th>
                                            <th>Course Description</th>
                                            <th>Student Name & Phone</th>
                                            <th>Course Price</th>
                                            <th>Course Level</th>
                                            <th>Control</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($uniqueCoursesId as $CoursesId)
                                            <tr>
                                                <td>{{$courses_registers[$CoursesId]->course->Name}}</td>
                                                <td>{{$courses_registers[$CoursesId]->course->Description}}</td>
                                                <td>
                                                    @foreach ($courses_registers as $course_register )
                                                    @if ($CoursesId == $course_register->Course_id)
                                                    {{"["}}
                                                    {{$course_register->student->Name . " -> "}}
                                                    {{$course_register->student->Phone }}
                                                    {{"]"}}
                                                    @endif
                                                    @endforeach
                                                </td>
                                                <td>{{$courses_registers[$CoursesId]->course->Price}}</td>
                                                <td>{{$courses_registers[$CoursesId]->course->Level}}</td>
                                                </td>
                                                <td>
                                                    <div class="btn-group">
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

