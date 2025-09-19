@extends('layouts.home')
@section('content')
    <!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper">

        <section class="content-header">
            <br></br>
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            @if (session('error'))
                                <div class="text-left alert alert-danger" style="text-align: left">
                                    <ul>
                                        <li>{{ session('error') }}</li>
                                    </ul>
                                </div>
                            @elseif (session('success'))
                                <div class="text-left alert alert-success" style="text-align: left">
                                    <ul>
                                        <li>{{ session('success') }}</li>
                                    </ul>
                                </div>
                            @endif
                            <div class="card-header" style="width:100%; display:flex; justify-content: center;">
                                <h3 class="card-title" style="font-weight: bold;  font-size:25px;">Students</h3>
                            </div>
                            <div class="card-header" style="width:100%; display:flex; justify-content: center;">
                                <a href="{{route("students.create")}}" style="width:10%; display:flex; justify-content: center;" type="button" class="btn btn-success">Add</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered ">
                                    <thead>
                                        <tr>
                                            <th style="width">Name</th>
                                            <th style="width">Phone</th>
                                            <th style="width">Email</th>
                                            <th style="width">Enrolled Courses</th>
                                            <th style="width">Control</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($students as $student)
                                        <tr>
                                            <td>{{ $student->name }}</td>
                                            <td>{{ $student->phone }}</td>
                                            <td>
                                                {{ $student->email }}
                                            </td>
                                            <td>
                                                @foreach ($student->courses as $course)
                                                    {{$course->Name }}
                                                    [{{$course->Level }}]
                                                    {{" , "}}
                                                @endforeach
                                            </td>
                                            <td>
                                                    <form method="post" action={{route("students.destroy",$student->id)}}>
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="btn-group w-100" role="group" style="border-radius:5px; overflow:hidden;">
                                                            <a href="{{route("students.courses",$student->id)}}" type="button" class="btn btn-success">Show Rolled Courses </a>
                                                            <a href="{{route("students.edit",$student->id)}}" type="button" class="btn btn-info">Edit</a>
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
