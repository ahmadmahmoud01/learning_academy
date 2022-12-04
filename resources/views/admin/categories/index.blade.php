@extends('admin.layout')

@section('content')


<div class="container p-5 m-5">
    <div class="d-flex jusify-content-between m-3">
        <h4>All Categories</h4>
        <a class="btn btn-primary ml-auto" href="{{ route('admin.categories.create') }}">
            Add New
        </a>
    </div>


<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $category->name }}</td>
                <td>
                    <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-sm btn-info">Edit</a>
                    <a href="{{ route('admin.categories.delete', $category->id) }}" class="btn btn-sm btn-danger">Delete</a>
                </td>
            </tr>
        @endforeach
    </tbody>
  </table>




</div>
@endsection
