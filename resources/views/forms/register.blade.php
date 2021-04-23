@extends('layout.app')

@section('title', 'Register')

@section('content')
    <form method="POST" action="/register" class="w-50 m-auto mt-3">
        @csrf
        <h1>Register</h1>
        <div class="form-group mt-3">
            <label for="name">Name</label>
            <input type="text" class="form-control @error('name')
                                                                is-invalid
                                    @enderror" id="name" name="name" placeholder="Enter name" value="{{ old('name') }}">
            @error('name')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class=" form-group mt-3">
            <label for="email">Email address</label>
            <input type="email" class="form-control @error('email')
                                                    is-invalid
                        @enderror" id="email" name="email" placeholder="Enter email" value="{{ old('email') }}">
            @error('email')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group mt-3">
            <label for="password">Password</label>
            <input type="password" class="form-control @error('password')
                                            is-invalid
                    @enderror" id="password" placeholder="Password" name="password">
            @error('password')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group mt-3">
            <label for="password_confirmation">Confirm password</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                placeholder="Password">
        </div>
        <div class="form-check mt-3">
            <input type="checkbox" class="form-check-input" id="terms_conditions" name="terms_conditions">
            <label class="form-check-label" for="terms_conditions">I agree to terms and conditions</label>
            @error('terms_conditions')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>

@endsection
