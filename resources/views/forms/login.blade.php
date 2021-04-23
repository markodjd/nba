@extends('layout.app')

@section('title', 'Login')

@section('content')
    <form method="POST" action="/login" class="w-50 m-auto mt-3">
        @csrf
        <h1>Login</h1>
        <div class=" form-group mt-3">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email"
                value="{{ old('email') }}">
        </div>
        <div class="form-group mt-3">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Password" name="password">
        </div>
        @if ($invalid_credentials ?? false)
            <p class="text-danger">Invalid email or password</p>
        @endif
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>

@endsection
