@extends('layouts.home')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <form class="form-horizontal" method="post" action={{ route('students.unrollCourse', $course->id) }}>
                @csrf
                @method('delete')
                <section class="content">
                    @if (session('success'))
                        <div class="text-left alert alert-success" style="text-align: left">
                            <ul>
                                <li>{{ session('success') }}</li>
                            </ul>
                        </div>
                    @endif
                    <div class="card card-dark">
                        <div class="card-header" style="width:100%; display:flex; justify-content: center;">
                            <h3 class="card-title" style="font-weight: bold;  font-size:25px;">Course Details</h3>
                        </div>
                        <!-- form start -->
                        <div class="form-horizontal">
                            {{-- Course Info table --}}
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                        <tr>
                                            <th style="width: 20%">Course Title</th>
                                            <td>{{ $course->Name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Course Description</th>
                                            <td>{{ $course->Description }}</td>
                                        </tr>
                                        <tr>
                                            <th>Course Level</th>
                                            <td>
                                                @if ($course->Level == 'advanced')
                                                    <span class="badge badge-danger">{{ $course->Level }}</span>
                                                @elseif ($course->Level == 'beginner')
                                                    <span class="badge badge-success">{{ $course->Level }}</span>
                                                @else
                                                    <span class="badge badge-warning">{{ $course->Level }}</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Course Price</th>
                                            <td> {{ $course->Price ."$"}}</td>
                                        </tr>
                                </thead>

                            </table>
                        </div>
                    </form>

                    <div class="card card-info d-flex justify-content-center align-items-center" style="padding: 20px;">
                        <div class="d-flex gap-2" style="gap: 5px;">
                            <a href="{{ route('students.assignForm', $course->id) }}" class="btn btn-success">Add Students</a>
                            <a href="{{ route('courses.index') }}" class="btn btn-dark">Back</a>
                        </div>
                    </div>

                    <div class="card card-info">
                        <div class="card-header" style="width:100%; display:flex; justify-content: center;">
                            <h3 class="card-title" style="font-weight: bold;  font-size:25px;">Students Details</h3>
                        </div>
                        <!-- form start -->
                        <div class="form-horizontal" >
                            {{-- Students Info table --}}
                            @if (count($course->students) > 0)
                                <table id="example2" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Control</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($course->students as $student)
                                            <tr>
                                                <td>{{ $student->name }}</td>
                                                <td >{{ $student->email }}</td>
                                                <td>{{ $student->phone }}</td>
                                                <td>
                                                    <button name="studentId" value={{ $student->id }}  type="submit" class="btn btn-danger">UnRoll</button>
                                                </td>

                                            </tr>
                                        @endforeach
                                </table>
                                @else <div  style="max-width: fit-content;margin-inline: auto; font-size:25px;font-weight:bold;color:rgb(228, 26, 26) ;padding:10px"> No Students Rolled In</div>
                            @endif
                        </div>
                    </div>
                </section>
            </form>
        </section>
    </div>
@endsection
