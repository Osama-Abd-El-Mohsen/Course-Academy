@extends('layouts.home')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <section class="content">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">Edit Student</h3>
                    </div>
                    <!-- form start -->
                    <form class="form-horizontal" method="post" action={{ route('students.update',$student->id) }}>
                        @csrf
                        @method('put')
                        @if ($errors->any())
                            <div class="text-left alert alert-danger" style="text-align: left">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputEmail3" placeholder="Title" name="Name" value="{{old('Name',$student->Name ?? '')}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 control-label">Phone</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputPassword3" placeholder="Phone" name="Phone" value="{{old('Phone',$student->Phone ?? '')}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputPassword3" placeholder="Email" name="Email" value="{{old('Email',$student->Email ?? '')}}">
                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-dark">Update</button>
                            <a href="{{ route('students.index') }}" " class="btn btn-default float-right">Cancel</a>
                            </div>
                            <!-- /.card-footer -->
                        </form>
                    </div>
                </section>
            </section>
        </div>
@endsection
