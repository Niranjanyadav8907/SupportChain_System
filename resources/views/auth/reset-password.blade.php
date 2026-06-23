@extends('layouts.app')

@section('head')
<style>
    body {
        background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 50%, #0f172a 100%) !important;
        color: #f8fafc;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }
    main {
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 80px 20px;
    }
    .reset-card {
        background: rgba(30, 41, 59, 0.7);
        backdrop-filter: blur(16px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 20px;
        padding: 40px;
        width: 100%;
        max-width: 480px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
    }
    .form-control {
        background: rgba(15, 23, 42, 0.6);
        border: 1px solid rgba(255, 255, 255, 0.1);
        color: #f8fafc;
        border-radius: 10px;
        padding: 12px 16px;
    }
    .form-control:focus {
        background: rgba(15, 23, 42, 0.8);
        border-color: #3b82f6;
        color: #f8fafc;
        box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.25);
    }
    .btn-primary-custom {
        background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
        border: none;
        padding: 12px;
        font-weight: 600;
        border-radius: 10px;
        transition: all 0.3s ease;
    }
    .btn-primary-custom:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(37, 99, 235, 0.4);
    }
    .text-muted-custom {
        color: #94a3b8;
    }
</style>
@endsection

@section('content')
<div class="reset-card">
    <div class="text-center mb-4">
        <h3 class="fw-bold tracking-tight text-white mb-1">
            SUPPORT<span class="text-primary">CHAIN</span>
        </h3>
        <p class="text-muted-custom">Reset your corporate portal password</p>
    </div>

    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        <!-- Email Address -->
        <div class="mb-3">
            <label for="email" class="form-label fw-medium">Corporate Email</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus readonly>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <!-- Password -->
        <div class="mb-3">
            <label for="password" class="form-label fw-medium">New Password</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Min. 8 characters">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="mb-4">
            <label for="password-confirm" class="form-label fw-medium">Confirm Password</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="••••••••">
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary-custom w-100 text-white mb-3">
            Update Password <i class="bi bi-shield-check ms-2"></i>
        </button>
    </form>
</div>
@endsection
