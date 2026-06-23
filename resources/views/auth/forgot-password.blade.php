@extends('layouts.app')

@section('head')
<style>
body {
    background: #f8fafc !important;
    color: #334155;
    min-height: 100vh;
    margin: 0;
    padding: 0;
}

main,
main.py-4 {
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: flex-start;
    padding-top: 120px !important;
    padding-bottom: 40px;
}

.forgot-card {
    width: 100%;
    max-width: 500px;
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-top: 5px solid #bc342c;
    border-radius: 16px;
    padding: 35px;
    box-shadow: 0 10px 30px rgba(0,0,0,.08);
}

.portal-title {
    font-size: 2rem;
    font-weight: 800;
    color: #bc342c;
    margin-bottom: 8px;
}

.portal-title span {
    color: #111827;
}

.portal-subtitle {
    color: #64748b;
    font-size: .95rem;
}

.form-label {
    font-size: .9rem;
    font-weight: 600;
    color: #334155;
    margin-bottom: 8px;
}

.input-group-text {
    background: #f8fafc !important;
    border: 1px solid #dbe2ea !important;
    border-right: none !important;
    color: #64748b !important;
    border-radius: 12px 0 0 12px !important;
}

.form-control {
    background: #fff !important;
    border: 1px solid #dbe2ea !important;
    color: #334155 !important;
    border-left: none !important;
    border-radius: 0 12px 12px 0 !important;
    height: 50px;
}

.form-control:focus {
    border-color: #bc342c !important;
    box-shadow: 0 0 0 4px rgba(188,52,44,.15) !important;
}

.form-control::placeholder {
    color: #94a3b8;
}

.btn-primary-custom {
    background: #bc342c;
    border: none;
    color: #fff;
    padding: 14px;
    font-weight: 700;
    border-radius: 12px;
    transition: all .3s ease;
}

.btn-primary-custom:hover {
    background: #a52d26;
    color: #fff;
    transform: translateY(-2px);
}

.text-muted-custom {
    color: #64748b;
}

.back-login-link {
    color: #bc342c;
    font-weight: 600;
    text-decoration: none;
}

.back-login-link:hover {
    color: #a52d26;
    text-decoration: underline;
}

.alert-success {
    border-radius: 12px;
}

@media (max-width: 768px) {
    main,
    main.py-4 {
        padding: 20px !important;
    }

    .forgot-card {
        padding: 25px;
    }
}
</style>
@endsection

@section('content')
<div class="forgot-card">
    <div class="text-center mb-4">
        <h3 class="portal-title">
            SUPPORT<span>CHAIN</span>
        </h3>

        <p class="portal-subtitle">
            Enter email to recover your portal password
        </p>
    </div>

    @if (session('status'))
        <div class="alert alert-success border-0 bg-success bg-opacity-20 text-success mb-4" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div class="mb-4">
            <label for="email" class="form-label fw-medium">Corporate Email</label>
            <div class="input-group">
                <span class="input-group-text bg-transparent border-end-0 border-white border-opacity-10 text-muted-custom">
                    <i class="bi bi-envelope"></i>
                </span>
                <input id="email" type="email" class="form-control border-start-0 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="name@company.com">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary-custom w-100 text-white mb-3">
            Send Reset Link <i class="bi bi-send ms-2"></i>
        </button>

        <div class="text-center text-muted-custom">
            <a href="{{ route('login') }}" class="back-login-link">
                Back to Login
            </a>
        </div>
    </form>
</div>
@endsection
