@extends('layout')
@section('hide-nav', true)
@section('content')
<div class="auth-page">
    <div class="auth-photo" style="background-image: url('https://images.unsplash.com/photo-1486312338219-ce68d2c6f44d?w=1000&q=80');">
        <div class="auth-photo-overlay">
            <div class="auth-photo-text">
                <h2>We build tools that get out of your way.</h2>
                <p>AUTH APP was created with one belief: software should be simple. No bloated dashboards, no features you'll never use. Just the essentials, done right.</p>
                <p>We handle the security so you can focus on what matters — your work, your ideas, your next move.</p>
            </div>
        </div>
    </div>
    <div class="auth-form-side">
        <div class="form-box">
            <a href="/" style="text-decoration: none; font-weight: 700; font-size: 0.95rem; color: #0c0c0c; display: inline-block; margin-bottom: 2rem;">AUTH APP</a>
            <h1>Welcome back</h1>
            <p class="sub">Enter your email and password to continue.</p>

            <form method="POST" action="/login" novalidate>
                @csrf
                @if($errors->has('email') && !$errors->has('password'))
                    <div class="form-error">{{ $errors->first('email') }}</div>
                @endif

                <div class="field">
                    <label for="email">Email address</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="you@example.com">
                </div>

                <div class="field">
                    <label for="password">Password</label>
                    <div class="pw-wrap">
                        <input type="password" id="password" name="password" placeholder="Your password">
                        <button type="button" class="toggle-pw" data-target="password">
                            <svg class="eye-on" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M2.036 12.322a1 1 0 010-.644C3.433 7.536 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178a1 1 0 010 .644C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.964-7.178z"/><circle cx="12" cy="12" r="3"/></svg>
                            <svg class="eye-off" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M3.98 8.223A10.477 10.477 0 002.036 11.678a1 1 0 000 .644C3.433 16.464 7.36 19.5 12 19.5c1.618 0 3.14-.39 4.49-1.065M6.228 6.228A10.45 10.45 0 0112 4.5c4.638 0 8.573 3.007 9.963 7.178a1 1 0 010 .644 10.503 10.503 0 01-2.226 3.694M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.243L9.88 9.88"/></svg>
                        </button>
                    </div>
                </div>

                <button type="submit" class="btn">Log in</button>
            </form>

            <p class="form-footer">Don't have an account? <a href="/register">Sign up</a></p>
        </div>
    </div>
</div>
@endsection
