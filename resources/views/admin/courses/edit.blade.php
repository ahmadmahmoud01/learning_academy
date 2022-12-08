@extends('admin.layout')

@section('content')


<div class="container m-5 p-5">
        <div class="d-flex jusify-content-between m-3">
            <h4>Courses / Edit / {{ $course->name }}</h4>
            <a class="btn btn-primary ml-auto" href="{{ route('admin.courses.index') }}">
               All Courses
            </a>
        </div>
        <form method="POST" action="{{ route('admin.courses.update') }}" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="id" value="{{ $course->id }}">
            <div class="mb-3">
                <label class="col-sm-2 col-form-label">name</label><br>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" value="{{ $course->name }}">
                    <div class="mt-3">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label class="col-sm-2 col-form-label">Category</label><br>
                <div class="col-sm-10">
                    <select name="category_id" class="form-control">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if($course->category_id == $category->id) selected @endif>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <div class="mt-3">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label class="col-sm-2 col-form-label">Trainer</label><br>
                <div class="col-sm-10">
                    <select name="trainer_id" class="form-control">
                        @foreach ($trainers as $trainer)
                            <option value="{{ $trainer->id }}" @if($course->trainer_id == $trainer->id) selected @endif>{{ $trainer->name }}</option>
                        @endforeach
                    </select>
                    <div class="mt-3">
                        @error('trainer_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label class="col-sm-2 col-form-label">Small Description</label><br>
                <div class="col-sm-10">
                    <input type="text" name="small_desc" class="form-control" value="{{ $course->small_desc }}">
                    <div class="mt-3">
                        @error('small_desc')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label class="col-sm-2 col-form-label">Description</label><br>
                <div class="col-sm-10">
                    <textarea name="desc" id="" cols="107" rows="10" class="form-control">{{ $course->desc }}</textarea>
                    <div class="mt-3">
                        @error('desc')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label class="col-sm-2 col-form-label">Price</label><br>
                <div class="col-sm-10">
                    <input type="number" name="price" class="form-control" value="{{ $course->price }}">
                    <div class="mt-3">
                        @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <div class="col-sm-10">
                    <input type="file" name="img" class="form-control-file">
                    <div class="mt-3">
                        @error('img')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <img src="{{ asset('uploads/courses/' . $course->img) }}" alt="" srcset="" width="100px" height="100px">
                </div>

            </div>

            <div class="mb-3">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary text-center">Update</button>
                </div>
            </div>


        </form>
</div>


@endsection
