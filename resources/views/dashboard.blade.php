@extends('layout')
@section('content')
<div class="wrap" style="padding: 3rem 0; max-width: 900px;">

    <!-- Header -->
    <div style="display: flex; align-items: center; gap: 1.25rem; margin-bottom: 2.5rem;">
        <div style="width: 52px; height: 52px; border-radius: 50%; background: #2563eb; color: #fff; display: flex; align-items: center; justify-content: center; font-size: 1.15rem; font-weight: 700; flex-shrink: 0;">
            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}{{ strtoupper(substr(strstr(Auth::user()->name, ' '), 1, 1)) }}
        </div>
        <div>
            <h1 style="font-size: 1.35rem; font-weight: 700; letter-spacing: -0.02em; line-height: 1.2;">Welcome back, {{ Auth::user()->name }}</h1>
            <p style="color: #64748b; font-size: 0.85rem;">Here's your account overview.</p>
        </div>
    </div>

    <!-- Account info -->
    <div style="background: #fff; border: 1px solid #e8e8e8; border-radius: 8px; overflow: hidden; margin-bottom: 1.25rem;">
        <div style="padding: 1rem 1.5rem; border-bottom: 1px solid #e8e8e8; background: #fafafa;">
            <p style="font-size: 0.8rem; font-weight: 600; color: #64748b;">Account details</p>
        </div>
        <div style="padding: 1.25rem 1.5rem; display: grid; grid-template-columns: 1fr 1fr; gap: 1.25rem; border-bottom: 1px solid #f0f0f0;">
            <div>
                <p style="font-size: 0.75rem; color: #94a3b8; margin-bottom: 0.2rem;">Full name</p>
                <p style="font-size: 0.9rem; font-weight: 500;">{{ Auth::user()->name }}</p>
            </div>
            <div>
                <p style="font-size: 0.75rem; color: #94a3b8; margin-bottom: 0.2rem;">Email address</p>
                <p style="font-size: 0.9rem; font-weight: 500;">{{ Auth::user()->email }}</p>
            </div>
        </div>
        <div style="padding: 1.25rem 1.5rem; display: grid; grid-template-columns: 1fr 1fr; gap: 1.25rem;">
            <div>
                <p style="font-size: 0.75rem; color: #94a3b8; margin-bottom: 0.2rem;">Member since</p>
                <p style="font-size: 0.9rem; font-weight: 500;">{{ Auth::user()->created_at->format('F j, Y') }}</p>
            </div>
            <div>
                <p style="font-size: 0.75rem; color: #94a3b8; margin-bottom: 0.2rem;">Status</p>
                <p style="font-size: 0.9rem; font-weight: 500; color: #16a34a; display: flex; align-items: center; gap: 0.4rem;">
                    <span style="width: 7px; height: 7px; border-radius: 50%; background: #16a34a; display: inline-block;"></span>
                    Active
                </p>
            </div>
        </div>
    </div>

    <!-- Quick actions -->
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.25rem;">
        <a href="/" style="background: #fff; border: 1px solid #e8e8e8; border-radius: 8px; padding: 1.25rem 1.5rem; text-decoration: none; display: flex; align-items: center; gap: 0.85rem; transition: border-color 0.15s;">
            <div style="width: 36px; height: 36px; border-radius: 8px; background: #eff6ff; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                <svg width="18" height="18" fill="none" stroke="#2563eb" stroke-width="1.5" viewBox="0 0 24 24"><path d="M2.25 12l8.954-8.955a1.126 1.126 0 011.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"/></svg>
            </div>
            <div>
                <p style="font-size: 0.875rem; font-weight: 600; color: #0c0c0c;">Home</p>
                <p style="font-size: 0.78rem; color: #94a3b8;">Back to landing page</p>
            </div>
        </a>
        <form action="/logout" method="POST" style="margin: 0;">
            @csrf
            <button type="submit" id="dashLogout" style="width: 100%; background: #fff; border: 1px solid #e8e8e8; border-radius: 8px; padding: 1.25rem 1.5rem; text-decoration: none; display: flex; align-items: center; gap: 0.85rem; cursor: pointer; font-family: inherit; text-align: left; transition: border-color 0.15s;">
                <div style="width: 36px; height: 36px; border-radius: 8px; background: #fef2f2; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                    <svg width="18" height="18" fill="none" stroke="#dc2626" stroke-width="1.5" viewBox="0 0 24 24"><path d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3-3h-9m9 0l-3-3m3 3l-3 3"/></svg>
                </div>
                <div>
                    <p style="font-size: 0.875rem; font-weight: 600; color: #dc2626;">Sign out</p>
                    <p style="font-size: 0.78rem; color: #94a3b8;">End your session</p>
                </div>
            </button>
        </form>
    </div>

</div>
@endsection
