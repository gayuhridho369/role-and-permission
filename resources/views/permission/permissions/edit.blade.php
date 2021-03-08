@extends('layouts.back')

@section('content')
<div class="card mb-4">
    <div class="card-header">Edit PErmission</div>
    <div class="card-body">
        <form action="{{ route('permissions.update', $permission) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') ?? $permission->name }}">
            </div>
            <div class="form-group">
                <label for="guard_name">Guard Name</label>
                <input type="text" name="guard_name" id="guard_name" placeholder='default to "web"' class="form-control" value="{{ old('guard_name') ?? $permission->guard_name }}">
            </div>

            <button type="submit" class="btn btn-primary">{{ $submit }}</button>
        </form>
    </div>
</div>
@endsection