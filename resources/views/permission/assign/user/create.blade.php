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
    <div class="card-header">Pick User by Email Address</div>
    <div class="card-body">
        <form action="{{ route('assign.user.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="user">User</label>
                <input type="text" name="email" id="user" class="form-control">
            </div>

            <div class="form-group">
                <label for="roles">Pick Roles</label>
                <select name="roles" id="roles" class="form-control select2" multiple>
                    @foreach($roles as $role)
                    <option value="{{ $role->id }}">{{$role->name}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Assign</button>

        </form>
    </div>
</div>

<div class="card mb-3">
    <div class="card-header">
        Table Role of Users
    </div>

    <div class="card-body">
        <table class="table table-hover">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Roles</th>
                <th>Action</th>
            </tr>

            @foreach($users as $index => $user)
            <tr>
                <td>{{ $index+1}}</td>
                <td>{{ $user->name }}</td>
                <td>{{ implode(' | ', $user->getRoleNames()->toArray()) }}</td>
                <td>
                    <a href="{{ route('assign.user.edit', $user) }}">Sync</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>

@endsection