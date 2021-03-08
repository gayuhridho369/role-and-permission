@extends('layouts.back')

@section('style')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@push('script')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2({
            placeholder: "Select Permissions"
        });
    });
</script>
@endpush


@section('content')
@if(session('success'))
<div class="alert alert-success">{{session('success')}}</div>
@endif
<div class="card mb-3">
    <div class="card-header">Assign Permission</div>
    <div class="card-body">
        <form action="{{ route('assign.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="role">Role Name</label>
                <select type="text" name="role" id="role" class="form-control">
                    <option disabled selected>Choose a Role</option>
                    @foreach($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
                @error('role')
                <div class="text-danger mt-2 d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="permissions">Permissions</label>
                <select name="permissions[]" id="permissions" class="form-control select2" multiple>
                    <!-- <option disabled selected>Choose Permissions</option> -->
                    @foreach ($permissions as $permission)
                    <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                    @endforeach
                </select>
                @error('permissions')
                <div class="text-danger mt-2 d-block">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Assign</button>

        </form>
    </div>
</div>

<div class="card mb-3">
    <div class="card-header">
        Table of Role & Permission
    </div>

    <div class="card-body">
        <table class="table table-hover">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Guard Name</th>
                <th>The Permissions</th>
                <th>Action</th>
            </tr>

            @foreach($roles as $index => $role)
            <tr>
                <td>{{ $index+1}}</td>
                <td>{{ $role->name }}</td>
                <td>{{ $role->guard_name }}</td>
                <td>{{ implode(' | ', $role->getPermissionNames()->toArray()) }}</td>
                <td>
                    <a href="{{ route('assign.edit', $role) }}">Sync</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection