@extends('admin.layout')

@section('content')


<div class="container p-5 m-5">
    <div class="d-flex jusify-content-between m-3">
        <h4>All Students</h4>
        <a class="btn btn-primary ml-auto" href="{{ route('admin.students.create') }}">
            Add New
        </a>
    </div>


<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Speciality</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($students as $student)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>
                    @if($student->name !== null)
                        {{ $student->name }}
                    @else
                        <p>No Name Found</p>
                    @endif
                </td>
                <td>{{ $student->email }}</td>
                <td>
                    @if($student->spec !== null)
                        {{ $student->spec }}
                    @else
                        <p>--</p>
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.students.edit', $student->id) }}" class="btn btn-sm btn-info">Edit</a>
                    <a href="{{ route('admin.students.delete', $student->id) }}" class="btn btn-sm btn-danger">Delete</a>
                </td>
            </tr>
        @endforeach
    </tbody>
  </table>




</div>
@endsection
