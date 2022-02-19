@extends('auth.layout')

@section('title', 'Login')

@section('content')

    <div class="position-absolute top-50 start-50 translate-middle">
        <div id="loginmnt">
            <login-card csrf_token="{{csrf_token()}}"></login-card>
        </div>
    </div>
@endsection
