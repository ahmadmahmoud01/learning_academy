@extends('admin.layout')

@section('content')


<div class="container m-5 p-5">
        <div class="d-flex jusify-content-between m-3">
            <h4>Categories / Add New</h4>
            <a class="btn btn-primary ml-auto" href="{{ route('admin.categories.index') }}">
               Back
            </a>
        </div>
        <form method="POST" action="{{ route('admin.categories.store') }}">
            @csrf
            <div class="mb-3">
                <label class="col-sm-2 col-form-label">name</label><br>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control">
                    <div class="mt-3">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary text-center">Add</button>
        </form>
</div>


@endsection
