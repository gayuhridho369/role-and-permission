@extends('layouts.back')

@section('content')
<div class="card mb-4">
    <div class="card-header">Create New Permissions</div>
    <div class="card-body">
        <form action="{{ route('permissions.create') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="guard_name">Guard Name</label>
                <input type="text" name="guard_name" id="guard_name" placeholder='default to "web"' class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</div>


<div class="card mb-4">
    <div class="card-header">Table Of Permission</div>
    <div class="card-body">
        <table class="table table-hover">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Guard Name</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>

            @foreach($permissions as $index => $permission)
            <tr>
                <td>{{ $index+1 }}</td>
                <td>{{ $permission->name }}</td>
                <td>{{ $permission->guard_name }}</td>
                <td>{{ $permission->created_at->format("d F Y") }}</td>
                <td>
                    <a href="{{ route('permissions.edit', $permission) }}" class="btn btn-success btn-sm">Edit</a>

                    <form action="{{ route('permissions.delete', $permission) }}" method="post" class="d-inline">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection