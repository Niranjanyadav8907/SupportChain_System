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
    flex: 1;
    display: flex;
    justify-content: center;
    align-items: flex-start;
    padding: 20px 20px 30px !important;
    margin: 0 !important;
}

.login-container {
    width: 100%;
    max-width: 500px;
    margin: 0 auto;
    padding: 0;
}

.login-card {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-top: 5px solid #bc342c;
    border-radius: 16px;
    padding: 35px;
    margin-top: 0;
    box-shadow: 0 10px 30px rgba(0,0,0,.08);
}

.portal-title {
    font-size: 2rem;
    font-weight: 800;
    text-align: center;
    color: #bc342c;
    margin-bottom: 8px;
}

.portal-title span {
    color: #111827;
}

.form-label {
    font-size: 0.85rem;
    font-weight: 600;
    color: #334155;
    margin-bottom: 8px;
}

.form-control {
    background: #fff;
    border: 1px solid #dbe2ea;
    color: #334155 !important;
    border-radius: 12px;
    padding: 11px 16px;
    font-size: .92rem;
    height: 48px;
}

.form-control:focus {
    border-color: #bc342c;
    box-shadow: 0 0 0 4px rgba(188,52,44,.15);
}

.input-group-text-custom {
    background: #f8fafc;
    border: 1px solid #dbe2ea;
    border-right: none;
    color: #64748b;
    border-top-left-radius: 12px;
    border-bottom-left-radius: 12px;
    padding-left: 16px;
    padding-right: 12px;
    display: flex;
    align-items: center;
}

.form-control-with-icon {
    border-left: none;
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
}

.password-toggle-btn {
    background: #f8fafc;
    border: 1px solid #dbe2ea;
    border-left: none;
    color: #64748b;
    border-top-right-radius: 12px;
    border-bottom-right-radius: 12px;
    padding: 0 16px;
    cursor: pointer;
    display: flex;
    align-items: center;
}

.password-toggle-btn:hover {
    color: #bc342c;
}

.btn-submit {
    background: #bc342c;
    border: none;
    color: #fff;
    padding: 14px;
    border-radius: 12px;
    font-weight: 700;
    font-size: 1rem;
    transition: all .3s ease;
}

.btn-submit:hover {
    background: #a52d26;
    color: #fff;
    transform: translateY(-2px);
}

.text-link {
    color: #bc342c;
    text-decoration: none;
    font-weight: 600;
}

.text-link:hover {
    color: #a52d26;
    text-decoration: underline;
}

.divider {
    height: 1px;
    background: #e2e8f0;
    margin: 25px 0;
}

.form-check-label {
    color: #64748b;
}

.alert-success {
    border-radius: 12px;
}

.container,
.container-fluid,
.row {
    margin-top: 0 !important;
    padding-top: 0 !important;
}
html,
body {
    margin: 0;
    padding: 0;
    background: #f8fafc !important;
    min-height: 100vh;
}

main,
main.py-4 {
    width: 100%;
    padding-top: 20px !important;
    margin-top: 0 !important;
}

.login-container {
    width: 100%;
    max-width: 500px;
    margin: 20px auto 0 auto !important;
}

.login-card {
    background: #fff;
    border: 1px solid #e2e8f0;
    border-top: 5px solid #bc342c;
    border-radius: 16px;
    padding: 35px;
    box-shadow: 0 10px 30px rgba(0,0,0,.08);
}
main,
main.py-4 {
    padding-top: 105px !important;
}

.remember-forgot-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: 18px 0 25px;
}

.remember-forgot-row .form-check {
    display: flex;
    align-items: center;
    margin: 0;
}

.remember-forgot-row .form-check-input {
    width: 20px;
    height: 20px;
    border: 2px solid #bc342c;
    cursor: pointer;
    box-shadow: none;
}

.remember-forgot-row .form-check-input:checked {
    background-color: #bc342c;
    border-color: #bc342c;
}

.remember-forgot-row .form-check-input:focus {
    box-shadow: 0 0 0 3px rgba(188,52,44,.15);
}

.remember-forgot-row .form-check-label {
    margin-left: 10px;
    color: #64748b;
    cursor: pointer;
    font-size: .95rem;
}

.forgot-link {
    color: #bc342c;
    text-decoration: none;
    font-weight: 600;
    font-size: .95rem;
}

.forgot-link:hover {
    color: #a52d26;
    text-decoration: underline;
}

.form-check-input {
    width: 20px;
    height: 20px;
    border: 2px solid #bc342c;
    cursor: pointer;
    accent-color: #bc342c; /* Modern browsers */
}

.form-check-input:focus {
    box-shadow: 0 0 0 3px rgba(188,52,44,.15);
}


@media (max-width: 768px) {
    main,
    main.py-4 {
        padding: 15px !important;
    }

    .login-card {
        padding: 25px;
    }
}
</style>
@endsection

@section('content')
        <div class="login-container">
            <div class="login-card">
                <!-- Brand Logo & Header -->
                <div class="text-center mb-4">
            <h3 class="fw-bold mb-1 portal-title">
                SUPPORT<span>CHAIN</span>
            </h3>

            <p class="text-muted small">
                Sign In to Employee Support Portal
            </p>
        </div>

        @if (session('status'))
            <div class="alert alert-success border-0 bg-success bg-opacity-20 text-success rounded-4 mb-4 small" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i> {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate>
            @csrf

            <!-- Email Input -->
            <div class="mb-3">
                <label for="email" class="form-label">Corporate Email</label>
                <div class="input-group">
                    <span class="input-group-text-custom">
                        <i class="bi bi-envelope"></i>
                    </span>
                    <input id="email" type="email" class="form-control form-control-with-icon @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="name@company.com">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <!-- Password Input -->
            <div class="mb-3">
                <label for="password" class="form-label mb-2">
                    Password
                </label>
                <div class="input-group">
                    <span class="input-group-text-custom">
                        <i class="bi bi-lock"></i>
                    </span>
                    <input id="password" type="password" class="form-control form-control-with-icon border-end-0 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="••••••••">
                    <span class="password-toggle-btn" id="togglePassword">
                        <i class="bi bi-eye" id="eyeIcon"></i>
                    </span>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
           <!-- Remember Me + Forgot Password -->
            <div class="remember-forgot-row">

                <div class="form-check">
                    <input
                        class="form-check-input"
                        type="checkbox"
                        name="remember"
                        id="remember"
                        {{ old('remember') ? 'checked' : '' }}
                    >

                    <label class="form-check-label" for="remember">
                        Remember this device
                    </label>
                </div>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="forgot-link">
                        Forgot Password?
                    </a>
                @endif

            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-submit w-100 mb-3">
                Sign In <i class="bi bi-box-arrow-in-right ms-2 align-middle"></i>
            </button>

            <div class="divider"></div>

            <!-- Register portal redirection -->
            <div class="text-center text-muted small">
                <span>New employee? </span>
                <a href="{{ route('register') }}" class="text-link fw-semibold">Register Portal Account</a>
            </div>
        </form>
    </div>
</div>

<script>
    // Password visibility toggle handler
    document.addEventListener("DOMContentLoaded", function() {
        const toggleBtn = document.getElementById("togglePassword");
        const passwordInput = document.getElementById("password");
        const eyeIcon = document.getElementById("eyeIcon");

        if (toggleBtn && passwordInput && eyeIcon) {
            toggleBtn.addEventListener("click", function() {
                const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
                passwordInput.setAttribute("type", type);
                
                // Toggle icons
                if (type === "text") {
                    eyeIcon.classList.remove("bi-eye");
                    eyeIcon.classList.add("bi-eye-slash");
                } else {
                    eyeIcon.classList.remove("bi-eye-slash");
                    eyeIcon.classList.add("bi-eye");
                }
            });
        }
    });
</script>
@endsection
