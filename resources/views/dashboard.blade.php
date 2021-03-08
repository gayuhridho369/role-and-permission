@extends('layouts.back')

@section('content')
<div class="card">
    <div class="card-header">Welcome to Dashboard</div>
    <div class="card-body">
        Hi {{ auth()->user()->name }}
    </div>
</div>
@endsection