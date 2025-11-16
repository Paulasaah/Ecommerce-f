@extends('admin.layouts.app')

@section('content')
    <h1>Add new category</h1>

    <div class="card">
        <div class="cardbody">
            <div class="p-4">
                <form action="{{route('admin.categories.store')}}" method="POST">
                    @csrf
                    <div class="input-group input-group-outline mb-4">
                        <label class="form-label" for="name">Name</label>
                        <input type="text" name="name" class="form-control" name="name">
                    </div>
                    <input type="submit" class="btn bg-gradient-success" name="Save">
                </form>
            </div>
        </div>
    </div>
@endsection