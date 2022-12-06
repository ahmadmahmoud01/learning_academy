@extends('admin.layout')

@section('content')


<div class="container m-5 p-5">
        <div class="d-flex jusify-content-between m-3">
            <h4>Trainers / Edit / {{ $trainer->name }}</h4>
            <a class="btn btn-primary ml-auto" href="{{ route('admin.trainers.index') }}">
               All Trainers
            </a>
        </div>
        <form method="POST" action="{{ route('admin.trainers.update') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $trainer->id }}">
            <div class="mb-3">
                <label class="col-sm-2 col-form-label">name</label><br>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" value="{{ $trainer->name }}">
                    <div class="mt-3">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label class="col-sm-2 col-form-label">Phone</label><br>
                <div class="col-sm-10">
                    <input type="text" name="phone" class="form-control" value="{{ $trainer->phone }}">
                </div>
            </div>
            <div class="mb-3">
                <label class="col-sm-2 col-form-label">Speciality</label><br>
                <div class="col-sm-10">
                    <input type="text" name="spec" class="form-control" value="{{ $trainer->spec }}">
                    <div class="mt-3">
                        @error('spec')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-3 mt-3">
                <div class="col-sm-10">
                    <img src="{{ asset('uploads/trainers/' . $trainer->img) }}" height="100px"alt="" srcset="">
                    <input type="file" name="img" class="form-control-file mt-3">
                </div>
            </div>


            <button type="submit" class="btn btn-primary text-center">Update</button>
        </form>
</div>


@endsection
