@extends('layouts.home')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <section class="content">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">Edit Course</h3>
                    </div>
                    <!-- form start -->
                    <form class="form-horizontal" method="post" action={{ route('courses.update',$course->id) }}>
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
                                <label for="inputEmail3" class="col-sm-2 control-label">Title</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputEmail3" placeholder="Title" name="title" value="{{old('title',$course->Name ?? '')}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 control-label">Description</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputPassword3" placeholder="Description" name="description" value="{{old('description',$course->Description ?? '')}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 control-label">Price</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputPassword3" placeholder="Price" name="price" value="{{old('price',$course->Price ?? '')}}">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label>Level</label>
                                <select class="form-control" name="level">
                                    <option value="beginner" {{ old('level', $course->Level ?? '') == 'beginner' ? 'selected' : '' }}>beginner</option>
                                    <option value="intermediate" {{ old('level', $course->Level ?? '') == 'intermediate' ? 'selected' : '' }}>intermediate</option>
                                    <option value="advanced" {{ old('level', $course->Level ?? '') == 'advanced' ? 'selected' : '' }}>advanced</option>
                                </select>
                            </div>

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-dark">Update</button>
                            <a href="{{ route('courses.index') }}" " class="btn btn-default float-right">Cancel</a>
                            </div>
                            <!-- /.card-footer -->
                        </form>
                    </div>
                </section>
            </section>
        </div>
@endsection
