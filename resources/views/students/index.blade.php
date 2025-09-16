@extends('layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content-header">
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="card" sty >
                            <div class="card-header" style="width:100%; display:flex; justify-content: center;">
                                <h2 class="card-title" style="font-weight: bold;  font-size:25px;">Students Content</h2>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Purchased Courses</th>
                                            <th>Control</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($students as $student)
                                            <tr>
                                                <td>{{ $student->Name }}</td>
                                                <td>{{ $student->Phone }}</td>
                                                <td>
                                                    @foreach ($student->registrations as $registration)
                                                        {{$registration->course->Name }}
                                                        {{" , "}}
                                                    @endforeach
                                                </td>
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

