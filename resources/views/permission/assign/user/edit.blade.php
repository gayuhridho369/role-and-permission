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
    <div class="card-header">Sync Roles for {{$user->name}}</div>
    <div class="card-body">
        <form action="{{ route('assign.user.update', $user) }}" method="post">
            @method('put')
            @csrf
            <div class="form-group">
                <label for="user">User</label>
                <input type="text" name="email" id="user" class="form-control" value="{{ $user->email }}">
            </div>

            <div class="form-group">
                <label for="roles">Pick Roles</label>
                <select name="roles[]" id="roles" class="form-control select2" multiple>
                    @foreach($roles as $role)
                    <option {{$user->roles()->find($role->id) ? 'selected' : ''}} value="{{ $role->id }}">{{$role->name}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Sync</button>

        </form>
    </div>
</div>


@endsection