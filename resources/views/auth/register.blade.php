@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="login-container">
            <div class="card form-container">
                <div class="header">{{ __('Sign Up') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-item">
                            <span class="material-symbols-outlined form-icon">
                                person
                            </span>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror mb-3"
                                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                placeholder="Username">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-item">
                            <span class="material-symbols-outlined form-icon">
                                mail
                            </span>
                            <input id="email" type="email"
                                class="form-control @error('email') is-invalid @enderror  mb-3" name="email"
                                value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        <div class="form-item">
                            <span class="material-symbols-outlined form-icon">
                                lock
                            </span>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror  mb-3" name="password"
                                required autocomplete="new-password" placeholder="Password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-item mb-3">
                            <span class="material-symbols-outlined form-icon">
                                lock
                            </span>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password"
                                    placeholder="Confirm Password">
                            </div>
                        </div>

                        <div class="mb-0">
                            <button type="submit" class="btn btn-danger">
                                {{ __('Sign Up') }}
                            </button>
                        </div>
                        <div class="signup-container mt-3">
                            <p>Already have an account?</p><a class="text-danger" href="{{ route('login') }}">Sing
                                In</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection