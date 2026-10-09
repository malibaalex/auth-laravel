<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'AuthApp' }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Inter', -apple-system, sans-serif;
            color: #0c0c0c;
            background: #f8f8f8;
            line-height: 1.6;
            min-height: 100vh;
            -webkit-font-smoothing: antialiased;
        }

        a { color: inherit; }
        img { display: block; max-width: 100%; }

        .wrap {
            width: 83.333%;
            max-width: 1140px;
            margin: 0 auto;
        }

        /* ---- Nav ---- */
        nav {
            background: #fff;
            border-bottom: 1px solid #e8e8e8;
            position: sticky;
            top: 0;
            z-index: 100;
        }
        .nav-inner {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 54px;
            width: 83.333%;
            max-width: 1140px;
            margin: 0 auto;
        }
        .brand {
            font-weight: 700;
            font-size: 1rem;
            text-decoration: none;
            color: #0c0c0c;
        }
        .nav-links {
            display: flex;
            gap: 0.35rem;
            align-items: center;
        }
        .nav-links a {
            text-decoration: none;
            font-size: 0.825rem;
            font-weight: 500;
            padding: 0.4rem 1rem;
            color: #64748b;
            transition: color 0.15s;
        }
        .nav-links a:hover { color: #0c0c0c; }
        .nav-links a.cta {
            background: #2563eb;
            color: #fff;
            border-radius: 6px;
            margin-left: 0.15rem;
        }
        .nav-links a.cta:hover { background: #1d4fd7; }
        /* Avatar + Dropdown */
        .avatar-wrap {
            position: relative;
        }
        .avatar {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background: #2563eb;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
            font-weight: 600;
            cursor: pointer;
            border: none;
            font-family: inherit;
            transition: box-shadow 0.15s;
        }
        .avatar:hover { box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.2); }
        .dropdown {
            position: absolute;
            right: 0;
            top: calc(100% + 0.5rem);
            background: #fff;
            border: 1px solid #e8e8e8;
            border-radius: 8px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.08);
            min-width: 200px;
            display: none;
            overflow: hidden;
            z-index: 200;
        }
        .dropdown.open { display: block; }
        .dropdown-header {
            padding: 0.85rem 1rem;
            border-bottom: 1px solid #e8e8e8;
        }
        .dropdown-header .dd-name {
            font-size: 0.85rem;
            font-weight: 600;
        }
        .dropdown-header .dd-email {
            font-size: 0.75rem;
            color: #94a3b8;
        }
        .dropdown a, .dropdown button {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            width: 100%;
            padding: 0.65rem 1rem;
            font-size: 0.825rem;
            font-weight: 500;
            color: #374151;
            text-decoration: none;
            background: none;
            border: none;
            cursor: pointer;
            font-family: inherit;
            text-align: left;
            transition: background 0.1s;
        }
        .dropdown a:hover, .dropdown button:hover { background: #f8f8f8; }
        .dropdown a svg, .dropdown button svg { width: 16px; height: 16px; color: #94a3b8; }
        .dropdown .divider { border-top: 1px solid #e8e8e8; }
        .dropdown .logout-btn { color: #dc2626; }
        .dropdown .logout-btn svg { color: #dc2626; }
        .dropdown .logout-btn:hover { background: #fef2f2; }
        .dropdown .logout-btn .spinner {
            width: 14px;
            height: 14px;
            border: 2px solid rgba(220, 38, 38, 0.2);
            border-top-color: #dc2626;
        }

        /* ---- Auth page split ---- */
        .auth-page {
            display: flex;
            height: 100vh;
        }
        .auth-form-side {
            width: 45%;
            padding: 3rem;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #fff;
        }
        .auth-photo {
            width: 55%;
            background-size: cover;
            background-position: center;
            position: relative;
        }
        .auth-photo-overlay {
            position: absolute;
            inset: 0;
            background: rgba(0,0,0,0.45);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 3rem;
            text-align: center;
        }
        .auth-photo-text {
            max-width: 380px;
        }
        .auth-photo-text h2 {
            color: #fff;
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 1rem;
            line-height: 1.25;
        }
        .auth-photo-text p {
            color: rgba(255,255,255,0.85);
            font-size: 1.05rem;
            font-weight: 500;
            line-height: 1.75;
            margin-bottom: 0.75rem;
        }
        .auth-photo-text p:last-child {
            margin-bottom: 0;
        }
        .form-box {
            width: 100%;
            max-width: 360px;
        }
        .form-box h1 {
            font-size: 1.6rem;
            font-weight: 700;
            margin-bottom: 0.3rem;
            line-height: 1.2;
        }
        .form-box .sub {
            font-size: 0.875rem;
            color: #64748b;
            margin-bottom: 2.25rem;
        }
        label {
            display: block;
            font-size: 0.8rem;
            font-weight: 500;
            margin-bottom: 0.4rem;
            color: #374151;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 0.7rem 0.85rem;
            border: 1.5px solid #d1d5db;
            border-radius: 8px;
            font-size: 0.9rem;
            margin-bottom: 1.15rem;
            background: #f9fafb;
            font-family: inherit;
            transition: all 0.2s;
            color: #0c0c0c;
        }
        input::placeholder {
            color: #9ca3af;
        }
        input:hover {
            border-color: #9ca3af;
        }
        input:focus {
            outline: none;
            border-color: #2563eb;
            background: #fff;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.12);
        }
        .btn {
            display: block;
            width: 100%;
            padding: 0.75rem;
            background: #2563eb;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            font-family: inherit;
            text-align: center;
            text-decoration: none;
            transition: all 0.2s;
            margin-top: 0.5rem;
        }
        .btn:hover { background: #1d4fd7; box-shadow: 0 2px 8px rgba(37, 99, 235, 0.3); }
        .btn:active { transform: scale(0.98); }
        .btn:disabled {
            opacity: 0.7;
            cursor: not-allowed;
        }
        .btn .spinner {
            display: inline-block;
            width: 16px;
            height: 16px;
            border: 2px solid rgba(255,255,255,0.3);
            border-top-color: #fff;
            border-radius: 50%;
            animation: spin 0.6s linear infinite;
            vertical-align: middle;
            margin-right: 0.4rem;
        }
        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Page loading bar */
        .page-loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 0;
            height: 3px;
            background: #2563eb;
            z-index: 9999;
            transition: width 0.3s ease;
        }
        .page-loader.loading {
            width: 70%;
            transition: width 8s cubic-bezier(0.1, 0.05, 0, 1);
        }
        .page-loader.done {
            width: 100%;
            transition: width 0.2s ease;
            opacity: 0;
            transition: width 0.2s ease, opacity 0.3s ease 0.2s;
        }
        .form-footer {
            margin-top: 1.5rem;
            font-size: 0.8rem;
            color: #94a3b8;
        }
        .form-footer a { color: #2563eb; font-weight: 500; text-decoration: none; }
        .form-footer a:hover { text-decoration: underline; }
        .field {
            margin-bottom: 1.15rem;
            position: relative;
        }
        .field input {
            margin-bottom: 0;
        }
        .pw-wrap {
            position: relative;
        }
        .pw-wrap input {
            padding-right: 2.75rem;
        }
        .toggle-pw {
            position: absolute;
            right: 0.7rem;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            color: #94a3b8;
            padding: 0;
            display: flex;
            align-items: center;
        }
        .toggle-pw:hover { color: #2563eb; }
        .toggle-pw svg { width: 18px; height: 18px; }
        .eye-off { display: none; }
        .toggle-pw.active .eye-on { display: none; }
        .toggle-pw.active .eye-off { display: block; }
        .field-error {
            font-size: 0.78rem;
            color: #dc2626;
            margin-top: 0.35rem;
        }
        .input-error {
            border-color: #dc2626 !important;
            background: #fef2f2 !important;
        }
        .input-error:focus {
            box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.12) !important;
            border-color: #dc2626 !important;
        }
        .error {
            font-size: 0.8rem;
            color: #991b1b;
            background: #fef2f2;
            border-left: 3px solid #dc2626;
            padding: 0.5rem 0.75rem;
            margin-bottom: 1rem;
            border-radius: 0 6px 6px 0;
        }
        .form-error {
            font-size: 0.85rem;
            color: #991b1b;
            background: #fef2f2;
            border: 1px solid #fecaca;
            border-radius: 8px;
            padding: 0.65rem 0.85rem;
            margin-bottom: 1.25rem;
            font-weight: 500;
        }

        /* ---- Footer ---- */
        footer {
            border-top: 1px solid #e8e8e8;
            background: #fff;
        }
        footer .footer-inner {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.25rem 0;
            font-size: 0.75rem;
            color: #94a3b8;
        }

        @media (max-width: 768px) {
            .wrap, .nav-inner { width: 92%; }
            .auth-form-side { width: 100%; }
            .auth-photo { display: none; }
        }
    </style>
</head>
<body>
    @unless(trim($__env->yieldContent('hide-nav')))
    <nav>
        <div class="nav-inner">
            <a href="/" class="brand">AUTH APP</a>
            <div class="nav-links">
                @auth
                    <div class="avatar-wrap">
                        <button class="avatar" id="avatarBtn">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}{{ strtoupper(substr(strstr(Auth::user()->name, ' '), 1, 1)) }}</button>
                        <div class="dropdown" id="dropdown">
                            <div class="dropdown-header">
                                <p class="dd-name">{{ Auth::user()->name }}</p>
                                <p class="dd-email">{{ Auth::user()->email }}</p>
                            </div>
                            <a href="/dashboard">
                                <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zm0 9.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zm9.75-9.75A2.25 2.25 0 0115.75 3.75H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zm0 9.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z"/></svg>
                                Dashboard
                            </a>
                            <div class="divider"></div>
                            <form action="/logout" method="POST">
                                @csrf
                                <button type="submit" class="logout-btn" id="logoutBtn">
                                    <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3-3h-9m9 0l-3-3m3 3l-3 3"/></svg>
                                    Sign out
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="/login">Log in</a>
                    <a href="/register" class="cta">Sign up</a>
                @endauth
            </div>
        </div>
    </nav>
    @endunless
    <div class="page-loader" id="pageLoader"></div>
    @yield('content')
    <script>
        // Client-side validation + loading state
        var rules = {
            name: { msg: 'Please enter your name.' },
            email: { msg: 'Please enter your email address.', email: 'Please enter a valid email address.' },
            password: { msg: 'Please enter a password.' },
            password_confirmation: { msg: 'Please confirm your password.' }
        };

        function clearFieldError(field) {
            field.classList.remove('input-error');
            var err = field.parentNode.querySelector('.field-error');
            if (err) err.remove();
        }

        function showFieldError(field, msg) {
            field.classList.add('input-error');
            var existing = field.parentNode.querySelector('.field-error');
            if (existing) existing.remove();
            var p = document.createElement('p');
            p.className = 'field-error';
            p.textContent = msg;
            field.parentNode.appendChild(p);
        }

        function isValidEmail(val) {
            return /^[^\s@]+@[^\s@]+\.[a-zA-Z]{2,}$/.test(val);
        }

        // Clear error on typing
        document.querySelectorAll('input').forEach(function(input) {
            input.addEventListener('input', function() {
                clearFieldError(input);
            });
        });

        document.querySelectorAll('form[novalidate]').forEach(function(form) {
            form.addEventListener('submit', function(e) {
                var valid = true;
                var fields = form.querySelectorAll('input:not([type="hidden"])');

                fields.forEach(function(field) {
                    clearFieldError(field);
                    var rule = rules[field.name];
                    if (!rule) return;

                    if (!field.value.trim()) {
                        showFieldError(field, rule.msg);
                        valid = false;
                    } else if (field.type === 'email' && !isValidEmail(field.value) && rule.email) {
                        showFieldError(field, rule.email);
                        valid = false;
                    }
                });

                if (!valid) {
                    e.preventDefault();
                    return;
                }

                var btn = form.querySelector('button[type="submit"]');
                if (btn && !btn.disabled) {
                    btn.disabled = true;
                    var text = btn.textContent;
                    btn.innerHTML = '<span class="spinner"></span>' + text + '...';
                }
            });
        });

        // Loading state for other forms (logout etc)
        document.querySelectorAll('form:not([novalidate])').forEach(function(form) {
            form.addEventListener('submit', function() {
                var btn = form.querySelector('button[type="submit"]');
                if (btn && !btn.disabled) {
                    btn.disabled = true;
                    var text = btn.textContent;
                    btn.innerHTML = '<span class="spinner"></span>' + text + '...';
                }
            });
        });

        // Avatar dropdown toggle
        var avatarBtn = document.getElementById('avatarBtn');
        var dropdown = document.getElementById('dropdown');
        if (avatarBtn) {
            avatarBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                dropdown.classList.toggle('open');
            });
            document.addEventListener('click', function(e) {
                if (!dropdown.contains(e.target)) {
                    dropdown.classList.remove('open');
                }
            });
        }

        // Logout loading state
        var logoutBtn = document.getElementById('logoutBtn');
        if (logoutBtn) {
            logoutBtn.closest('form').addEventListener('submit', function() {
                logoutBtn.disabled = true;
                logoutBtn.innerHTML = '<span class="spinner"></span>Signing out...';
            });
        }

        // Password show/hide toggle
        document.querySelectorAll('.toggle-pw').forEach(function(btn) {
            btn.addEventListener('click', function() {
                var input = document.getElementById(btn.getAttribute('data-target'));
                if (input.type === 'password') {
                    input.type = 'text';
                    btn.classList.add('active');
                } else {
                    input.type = 'password';
                    btn.classList.remove('active');
                }
            });
        });

        // Page loading bar
        var loader = document.getElementById('pageLoader');
        window.addEventListener('beforeunload', function() {
            loader.classList.add('loading');
        });
        window.addEventListener('pageshow', function() {
            loader.classList.remove('loading');
            loader.classList.add('done');
            setTimeout(function() {
                loader.classList.remove('done');
                loader.style.width = '0';
            }, 500);
        });
    </script>
</body>
</html>
