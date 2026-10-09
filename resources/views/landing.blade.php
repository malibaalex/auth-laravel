@extends('layout')
@section('content')

<!-- Hero -->
<section style="background: #fff;">
    <div class="wrap" style="display: flex; align-items: center; gap: 4rem; padding: 5rem 0;">
        <div style="flex: 1;">
            @auth
                <h1 style="font-size: 2.8rem; font-weight: 700; line-height: 1.12; margin-bottom: 1.25rem; letter-spacing: -0.025em; max-width: 440px;">Welcome back, {{ Auth::user()->name }}.</h1>
                <p style="font-size: 1.05rem; color: #64748b; margin-bottom: 2rem; max-width: 400px; line-height: 1.7;">Your dashboard is ready. Jump back in and pick up where you left off.</p>
                <a href="/dashboard" class="btn" style="width: auto; padding: 0.65rem 1.75rem;">Go to dashboard</a>
            @else
                <h1 style="font-size: 2.8rem; font-weight: 700; line-height: 1.12; margin-bottom: 1.25rem; letter-spacing: -0.025em; max-width: 440px;">Sign in once, access everything.</h1>
                <p style="font-size: 1.05rem; color: #64748b; margin-bottom: 2rem; max-width: 400px; line-height: 1.7;">A lightweight auth system. Create an account, log in, and reach your dashboard in seconds.</p>
                <div style="display: flex; gap: 0.6rem; align-items: center;">
                    <a href="/register" class="btn" style="width: auto; padding: 0.65rem 1.75rem;">Create an account</a>
                    <a href="/login" style="font-size: 0.875rem; font-weight: 500; color: #2563eb; text-decoration: none; padding: 0.65rem 0.5rem;">or log in</a>
                </div>
            @endauth
        </div>
        <div style="flex: 1;">
            <img src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?w=800&q=80" alt="" style="width: 100%; height: 380px; object-fit: cover; border-radius: 8px;">
        </div>
    </div>
</section>

<!-- Middle -->
<section>
    <div class="wrap" style="padding: 4.5rem 0;">
        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 1.25rem;">
            <div style="background: #fff; border: 1px solid #e8e8e8; border-radius: 8px; overflow: hidden;">
                <img src="https://images.unsplash.com/photo-1555421689-d68471e189f2?w=600&q=80" alt="" style="width: 100%; height: 180px; object-fit: cover;">
                <div style="padding: 1.25rem;">
                    <h3 style="font-size: 0.95rem; font-weight: 600; margin-bottom: 0.35rem;">Quick registration</h3>
                    <p style="font-size: 0.825rem; color: #64748b; line-height: 1.55;">Name, email, password. That's all it takes to create your account.</p>
                </div>
            </div>
            <div style="background: #fff; border: 1px solid #e8e8e8; border-radius: 8px; overflow: hidden;">
                <img src="https://images.unsplash.com/photo-1510915228340-29c85a43dcfe?w=600&q=80" alt="" style="width: 100%; height: 180px; object-fit: cover;">
                <div style="padding: 1.25rem;">
                    <h3 style="font-size: 0.95rem; font-weight: 600; margin-bottom: 0.35rem;">Secure sessions</h3>
                    <p style="font-size: 0.825rem; color: #64748b; line-height: 1.55;">Your password is hashed and your session is protected on every request.</p>
                </div>
            </div>
            <div style="background: #fff; border: 1px solid #e8e8e8; border-radius: 8px; overflow: hidden;">
                <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?w=600&q=80" alt="" style="width: 100%; height: 180px; object-fit: cover;">
                <div style="padding: 1.25rem;">
                    <h3 style="font-size: 0.95rem; font-weight: 600; margin-bottom: 0.35rem;">Private dashboard</h3>
                    <p style="font-size: 0.825rem; color: #64748b; line-height: 1.55;">Only logged-in users can see the dashboard. Everyone else gets redirected.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Bottom CTA -->
<section style="background: #fff; border-top: 1px solid #e8e8e8;">
    <div class="wrap" style="padding: 4rem 0; text-align: center;">
        @auth
            <h2 style="font-size: 1.6rem; font-weight: 700; color: #0c0c0c; margin-bottom: 0.6rem; letter-spacing: -0.02em;">You're all set.</h2>
            <p style="color: #64748b; font-size: 0.9rem; margin-bottom: 1.75rem;">Head to your dashboard to see your account.</p>
            <a href="/dashboard" class="btn" style="width: auto; padding: 0.65rem 2rem; display: inline-block;">Open dashboard</a>
        @else
            <h2 style="font-size: 1.6rem; font-weight: 700; color: #0c0c0c; margin-bottom: 0.6rem; letter-spacing: -0.02em;">Ready to get started?</h2>
            <p style="color: #64748b; font-size: 0.9rem; margin-bottom: 1.75rem;">Create a free account and see for yourself.</p>
            <a href="/register" class="btn" style="width: auto; padding: 0.65rem 2rem; display: inline-block;">Sign up free</a>
        @endauth
    </div>
</section>

<footer>
    <div class="wrap footer-inner">
        <span>&copy; {{ date('Y') }} AUTH APP</span>
        <span>Built with Laravel</span>
    </div>
</footer>
@endsection
