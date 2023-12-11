@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="login-container">
            <div class="card form-container">
                <div class="header">{{ __('Sign In') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        
                        <div class="form-item">
                            <span class="material-symbols-outlined form-icon">
                                mail
                            </span>
                            <input id="email" type="email"
                                class="form-control @error('email') is-invalid @enderror mb-3" name="email"
                                value="{{ old('email') }}" required autocomplete="email" autofocus
                                placeholder="Email Address">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-item ">
                            <span class="material-symbols-outlined form-icon">
                                lock
                            </span>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password" placeholder="Password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mt-3 mb-3">
                            <div class="form-check remember-forgot">
                                <div class="remember">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{
                                        old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                                @if (Route::has('password.request'))
                                <a class="forgot" href="{{ route('password.request') }}">
                                    {{ __('Forgot Password?') }}
                                </a>
                                @endif
                            </div>
                        </div>
                        <div class="mb-0">
                            <button type="submit" class="btn btn-danger">
                                {{ __('Sign In') }}
                            </button>
                        </div>
                        <!-- <div class="signup-container mt-3">
                            <p>Don't have an account?</p><a class="text-danger" href="{{ route('register') }}">{{
                                __('Sign Up') }}</a>
                        </div> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection