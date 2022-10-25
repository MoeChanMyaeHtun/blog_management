@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
                    <form method="POST" action="{{ route('login') }}" class="box">
                        @csrf
                 
                    <h1>Login</h1>
                    <p class="text-muted"> Please enter your login and password!</p>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"  autocomplete="current-email" placeholder="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="current-password" placeholder="Password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                     <a class="forgot text-muted" href="#">Forgot
                        password?</a>
                         <input type="submit" name="" value="Login" >
                </form>
        </div>
    </div>
</div>

@endsection
