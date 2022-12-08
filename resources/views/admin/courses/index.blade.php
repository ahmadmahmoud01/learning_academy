@extends('admin.layout')

@section('content')


<div class="container p-5 m-5">
    <div class="d-flex jusify-content-between m-3">
        <h4>All Courses</h4>
        <a class="btn btn-primary ml-auto" href="{{ route('admin.courses.create') }}">
            Add New
        </a>
    </div>


<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Img</th>
        <th scope="col">Name</th>
        <th scope="col">Price</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($courses as $course)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>
                    <img src="{{ asset('uploads/courses/' . $course->img) }}" width="50px" height="50px">
                </td>
                <td>{{ $course->name }}</td>
                <td>{{ $course->price }}</td>

                <td>
                    <a href="{{ route('admin.courses.edit', $course->id) }}" class="btn btn-sm btn-info">Edit</a>
                    <a href="{{ route('admin.courses.delete', $course->id) }}" class="btn btn-sm btn-danger">Delete</a>
                </td>
            </tr>
        @endforeach
    </tbody>
  </table>




</div>
@endsection
