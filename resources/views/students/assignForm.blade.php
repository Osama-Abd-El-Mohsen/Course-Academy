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
                            @if (session('error'))
                                <div class="text-left alert alert-danger" style="text-align: left">
                                    <ul>
                                        <li>{{ session('error') }}</li>
                                    </ul>
                                </div>
                            @endif
                            <div class="card-header" style="width:100%; display:flex; justify-content: center;">
                                <h3 class="card-title" style="font-weight: bold;  font-size:25px;">Register Student To Course</h3>
                            </div>

                            <!-- /.card-header -->
                            <form method="post"action="{{ route('students.assignCourse', $course) }}"style="max-width: fit-content;margin-inline: auto;">
                            @csrf
                                <div class="card-body">
                                    {{-- @dd($course,$students) --}}
                                    <label>Select student</label>
                                    <select class="form-control" name="studentId">
                                        @foreach ($students as $student)
                                            <option value={{ $student->id }}>{{ $student->Name }}</option>
                                        @endforeach
                                    </select>
                                    <br></br>
                                    <button type="submit" class="btn btn-success">Submit To Course </button>
                                    <a href={{route('courses.index')}} class="btn btn-primary">Back </a>
                                </div>
                            </form>
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
