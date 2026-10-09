@extends('layout')
@section('hide-nav', true)
@section('content')
<div class="auth-page">
    <div class="auth-photo" style="background-image: url('https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=1000&q=80');">
        <div class="auth-photo-overlay">
            <div class="auth-photo-text">
                <h2>Simple by design. Secure by default.</h2>
                <p>We believe great products don't need to be complicated. AUTH APP strips away the noise and gives you a clean, fast, and secure space to work from.</p>
                <p>Our mission is straightforward: make authentication effortless so you can spend your time building, not configuring.</p>
            </div>
        </div>
    </div>
    <div class="auth-form-side">
        <div class="form-box">
            <a href="/" style="text-decoration: none; font-weight: 700; font-size: 0.95rem; color: #0c0c0c; display: inline-block; margin-bottom: 2rem;">AUTH APP</a>
            <h1>Create your account</h1>
            <p class="sub">It only takes a minute to get started.</p>

            <form method="POST" action="/register" novalidate>
                @csrf
                <div class="field">
                    <label for="name">Full name</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Jane Doe" class="{{ $errors->has('name') ? 'input-error' : '' }}">
                    @error('name') <p class="field-error">{{ $message }}</p> @enderror
                </div>

                <div class="field">
                    <label for="email">Email address</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="you@example.com" class="{{ $errors->has('email') ? 'input-error' : '' }}">
                    @error('email') <p class="field-error">{{ $message }}</p> @enderror
                </div>

                <div class="field">
                    <label for="password">Password</label>
                    <div class="pw-wrap">
                        <input type="password" id="password" name="password" placeholder="At least 6 characters" class="{{ $errors->has('password') ? 'input-error' : '' }}">
                        <button type="button" class="toggle-pw" data-target="password">
                            <svg class="eye-on" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M2.036 12.322a1 1 0 010-.644C3.433 7.536 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178a1 1 0 010 .644C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.964-7.178z"/><circle cx="12" cy="12" r="3"/></svg>
                            <svg class="eye-off" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M3.98 8.223A10.477 10.477 0 002.036 11.678a1 1 0 000 .644C3.433 16.464 7.36 19.5 12 19.5c1.618 0 3.14-.39 4.49-1.065M6.228 6.228A10.45 10.45 0 0112 4.5c4.638 0 8.573 3.007 9.963 7.178a1 1 0 010 .644 10.503 10.503 0 01-2.226 3.694M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.243L9.88 9.88"/></svg>
                        </button>
                    </div>
                    @error('password') <p class="field-error">{{ $message }}</p> @enderror
                </div>

                <div class="field">
                    <label for="password_confirmation">Confirm password</label>
                    <div class="pw-wrap">
                        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Same password again">
                        <button type="button" class="toggle-pw" data-target="password_confirmation">
                            <svg class="eye-on" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M2.036 12.322a1 1 0 010-.644C3.433 7.536 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178a1 1 0 010 .644C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.964-7.178z"/><circle cx="12" cy="12" r="3"/></svg>
                            <svg class="eye-off" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M3.98 8.223A10.477 10.477 0 002.036 11.678a1 1 0 000 .644C3.433 16.464 7.36 19.5 12 19.5c1.618 0 3.14-.39 4.49-1.065M6.228 6.228A10.45 10.45 0 0112 4.5c4.638 0 8.573 3.007 9.963 7.178a1 1 0 010 .644 10.503 10.503 0 01-2.226 3.694M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.243L9.88 9.88"/></svg>
                        </button>
                    </div>
                </div>

                <button type="submit" class="btn">Create account</button>
            </form>

            <p class="form-footer">Already have an account? <a href="/login">Log in</a></p>
        </div>
    </div>
</div>
@endsection
