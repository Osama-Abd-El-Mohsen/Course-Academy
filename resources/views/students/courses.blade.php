@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <form class="form-horizontal" method="post" action={{ route('students.unrollStudent', $student->id) }}>
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
                            <h3 class="card-title" style="font-weight: bold;  font-size:25px;">Student Details</h3>
                        </div>
                        <!-- form start -->
                        <div class="form-horizontal">
                            {{-- Course Info table --}}
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                        <tr>
                                            <th style="width: 20%">Student Name</th>
                                            <td>{{ $student->Name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Student Email</th>
                                            <td>{{ $student->Email }}</td>
                                        </tr>
                                        <tr>
                                            <th>Student Phone</th>
                                            <td>{{ $student->Phone }}</td>
                                        </tr>
                                </thead>

                            </table>
                        </div>
                    </form>

                    <div class="card card-info d-flex justify-content-center align-items-center" style="padding: 20px;">
                        <div class="d-flex gap-2" style="gap: 5px;">
                            <a href="{{ route('students.index') }}" class="btn btn-dark">Back</a>
                        </div>
                    </div>

                    <div class="card card-info">
                        <div class="card-header" style="width:100%; display:flex; justify-content: center;">
                            <h3 class="card-title" style="font-weight: bold;  font-size:25px;">Courses Details</h3>
                        </div>
                        <!-- form start -->
                        <div class="form-horizontal" >
                            {{-- Students Info table --}}
                            @if (count($student->courses) > 0)
                                <table id="example2" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Level</th>
                                            <th>Control</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($student->courses as $course)
                                            <tr>
                                                <td>{{ $course->Name }}</td>
                                                <td >{{ $course->Description }}</td>
                                                <td>
                                                    @if ($course->Level == 'advanced')
                                                        <span class="badge badge-danger d-block text-center py-2">{{ $course->Level }}</span>
                                                    @elseif ($course->Level == 'beginner')
                                                        <span class="badge badge-success d-block text-center py-2">{{ $course->Level }}</span>
                                                    @else
                                                        <span class="badge badge-warning d-block text-center py-2">{{ $course->Level }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <button name="courseId" value={{ $course->id }}  type="submit" class="btn btn-danger">UnRoll</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                </table>
                                @else <div  style="max-width: fit-content;margin-inline: auto; font-size:25px;font-weight:bold;color:rgb(228, 26, 26) ;padding:10px"> No Courses Rolled In</div>
                            @endif
                        </div>
                    </div>
                </section>
            </form>
        </section>
    </div>
@endsection
