@extends('auth.layout')

@section('title', 'Login')

@section('content')

    <div class="position-absolute top-50 start-50 translate-middle">
        <div id="loginmnt">
            <login-form csrf_token="{{csrf_token()}}"></login-form>
        </div>
    </div>
@endsection
