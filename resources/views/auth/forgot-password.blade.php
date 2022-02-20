@extends('auth.layout')

@section('title', __("Forgot password"))

@section('content')
    <div class="position-absolute top-50 start-50 translate-middle">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Immetti la tua email</h3>
                    <form id="recpswd" method="POST" action="/forgot-password">
                        @csrf
                        <input type="email" name="email" class="form-control" id="emaillogin" aria-describedby="emailHelp" />
                        <small class="mt-3">Una mail ti sarà inviata all'indirizzo che hai indicato. Segui le istruzioni per reimpostare la tua password.</small>
                    </form>
                    <button type="submit" form="recpswd" class="btn btn-primary mt-3">Invia</button>
                </div>
            </div>
        </div>
    </div>
@endsection
