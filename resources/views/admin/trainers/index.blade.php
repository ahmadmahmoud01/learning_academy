@extends('admin.layout')

@section('content')


<div class="container p-5 m-5">
    <div class="d-flex jusify-content-between m-3">
        <h4>All Trainers</h4>
        <a class="btn btn-primary ml-auto" href="{{ route('admin.trainers.create') }}">
            Add New
        </a>
    </div>


<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Img</th>
        <th scope="col">phone</th>
        <th scope="col">speciality</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($trainers as $trainer)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $trainer->name }}</td>
                <td>
                    <img src="{{ asset('uploads/trainers/' . $trainer->img) }}">
                </td>
                <td>
                    @if($trainer->phone !== null)
                        {{ $trainer->phone }}
                    @else
                        <p>No data found</p>
                    @endif
                </td>
                <td>{{ $trainer->spec }}</td>
                <td>
                    <a href="{{ route('admin.trainers.edit', $trainer->id) }}" class="btn btn-sm btn-info">Edit</a>
                    <a href="{{ route('admin.trainers.delete', $trainer->id) }}" class="btn btn-sm btn-danger">Delete</a>
                </td>
            </tr>
        @endforeach
    </tbody>
  </table>




</div>
@endsection
