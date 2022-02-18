@extends('auth.layout')

@section('title', 'Forgot password')

@section('content')
<div class="container">
    <h1>Input your email</h1>
    <div class="input-group mt-4">
        <span class="input-group-text" id="basic-addon1">@</span>
        <input type="text" class="form-control" placeholder="Username" aria-label="Email"
            aria-describedby="basic-addon1">
    </div>
</div>
@endsection
