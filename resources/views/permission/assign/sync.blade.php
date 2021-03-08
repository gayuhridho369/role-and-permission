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
        <form action="{{ route('assign.update', $role) }}" method="post">
            @method('put')
            @csrf
            <div class="form-group">
                <label for="role">Role Name</label>
                <select type="text" name="role" id="role" class="form-control">
                    <option disabled selected>Choose a Role</option>
                    @foreach($roles as $item)
                    <option {{ $role->id == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name }}</option>
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
                    <option {{ $role->permissions()->find($permission->id) ? 'selected' : '' }} value="{{ $permission->id }}">{{ $permission->name }}</option>
                    @endforeach
                </select>
                @error('permissions')
                <div class="text-danger mt-2 d-block">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Sync</button>

        </form>
    </div>
</div>


@endsection