@extends('layouts.app')

@section('head')
<style>
/* =========================
   BODY & PAGE LAYOUT
========================= */

body {
    background: #f8fafc !important;
    color: #334155;
    min-height: 100vh;
    display: flex;
    flex-direction: column;

    /* Fixed navbar space */
    padding-top: 90px;
}

/* =========================
   MAIN CONTENT
========================= */

main {
    flex: 1;
    display: flex;
    justify-content: center;
    align-items: flex-start;
    padding: 20px;
}

/* =========================
   REGISTER CONTAINER
========================= */

.register-container {
    width: 100%;
    max-width: 650px;
    margin: 0 auto;
    position: relative;
    z-index: 1;
}

/* =========================
   REGISTER CARD
========================= */

.register-card {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-top: 4px solid #bc342c;
    border-radius: 14px;
    padding: 24px 28px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.08);
}

/* =========================
   PORTAL TITLE
========================= */

.portal-title {
    font-size: 2rem;
    font-weight: 800;
    color: #bc342c;
    text-align: center;
    line-height: 1.1;
    margin-bottom: 4px;
}

.portal-title span {
    color: #0f172a;
}

.text-muted.small {
    margin-bottom: 14px !important;
    font-size: 0.85rem;
}

/* =========================
   SECTION HEADINGS
========================= */

.section-header {
    font-size: 0.82rem;
    font-weight: 700;
    text-transform: uppercase;
    color: #bc342c;
    letter-spacing: 1px;
    margin-bottom: 12px;
    padding-bottom: 6px;
    border-bottom: 1px solid #e2e8f0;

    display: flex;
    align-items: center;
    gap: 8px;
}

/* =========================
   FORM LABELS
========================= */

.form-label {
    font-size: 0.84rem;
    font-weight: 600;
    color: #334155;
    margin-bottom: 5px;
}

/* =========================
   INPUTS
========================= */

.form-control,
.form-select {
    height: 42px;
    border: 1px solid #dbe2ea;
    border-radius: 10px;
    background: #fff;
    color: #334155 !important;
    font-size: 0.9rem;
    padding: 8px 14px;
    transition: all 0.25s ease;
}

.form-control::placeholder {
    color: #94a3b8;
}

.form-control:focus,
.form-select:focus {
    border-color: #bc342c;
    box-shadow: 0 0 0 3px rgba(188,52,44,.12);
}

/* =========================
   INPUT ICONS
========================= */

.input-group-text-custom {
    height: 42px;
    background: #f8fafc;
    border: 1px solid #dbe2ea;
    border-right: none;
    color: #64748b;

    padding: 0 12px;

    display: flex;
    align-items: center;

    border-radius: 10px 0 0 10px;
}

.form-control-with-icon {
    border-left: none;
    border-radius: 0 10px 10px 0;
}

/* =========================
   PASSWORD BUTTON
========================= */

.password-toggle-btn {
    height: 42px;
    background: #f8fafc;
    border: 1px solid #dbe2ea;
    border-left: none;

    padding: 0 12px;

    display: flex;
    align-items: center;

    color: #64748b;
    cursor: pointer;

    border-radius: 0 10px 10px 0;
}

.password-toggle-btn:hover {
    color: #bc342c;
}

/* =========================
   FORM SPACING
========================= */

.row.mb-4 {
    margin-bottom: 0.75rem !important;
}

.col-md-6.mb-3,
.col-md-12.mb-3 {
    margin-bottom: 12px !important;
}

/* =========================
   BUTTON
========================= */

.btn-submit {
    height: 48px;
    background: #bc342c;
    border: none;
    border-radius: 10px;

    color: #fff;
    font-size: 0.95rem;
    font-weight: 700;

    transition: all .3s ease;
}

.btn-submit:hover {
    background: #a52d26;
    color: #fff;
    transform: translateY(-1px);
    box-shadow: 0 6px 15px rgba(188,52,44,.20);
}

/* =========================
   DIVIDER
========================= */

.divider {
    height: 1px;
    background: #e2e8f0;
    margin: 16px 0;
}

/* =========================
   LINKS
========================= */

.text-link {
    color: #bc342c;
    text-decoration: none;
    font-weight: 600;
}

.text-link:hover {
    color: #a52d26;
    text-decoration: underline;
}

/* =========================
   INVALID FEEDBACK
========================= */

.invalid-feedback {
    font-size: 0.8rem;
}

/* =========================
   FIXED NAVBAR
========================= */

.navbar-custom {
    z-index: 1050;
}

/* =========================
   MOBILE
========================= */

@media (max-width: 768px) {

    body {
        padding-top: 80px;
    }

    main {
        padding: 12px;
    }

    .register-container {
        max-width: 100%;
    }

    .register-card {
        padding: 18px;
    }

    .portal-title {
        font-size: 1.6rem;
    }

    .form-control,
    .form-select,
    .input-group-text-custom,
    .password-toggle-btn {
        height: 40px;
    }

    .btn-submit {
        height: 44px;
    }
}
</style>
@endsection

@section('content')
<div class="register-container">
    <div class="register-card">
        <!-- Brand Title & Header -->
        <div class="text-center mb-4">
           <h3 class="fw-bold tracking-tight mb-1 portal-title">
                SUPPORT<span>CHAIN</span>
            </h3>
            <p class="text-muted small">Create your Corporate Employee Account</p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="needs-validation" novalidate>
            @csrf

            <!-- Section 1: Personal Profile -->
            <div class="section-header">
                <i class="bi bi-person-lines-fill"></i> 1. Personal Profile
            </div>
            <div class="row mb-4">
                <!-- Full Name -->
                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <div class="input-group">
                        <span class="input-group-text-custom">
                            <i class="bi bi-person"></i>
                        </span>
                        <input id="name" type="text" class="form-control form-control-with-icon @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="John Doe">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <!-- Email Address -->
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Corporate Email</label>
                    <div class="input-group">
                        <span class="input-group-text-custom">
                            <i class="bi bi-envelope"></i>
                        </span>
                        <input id="email" type="email" class="form-control form-control-with-icon @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="name@company.com">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <!-- Phone Number -->
                <div class="col-md-12 mb-3">
                    <label for="phone" class="form-label">Contact Phone (Optional)</label>
                    <div class="input-group">
                        <span class="input-group-text-custom">
                            <i class="bi bi-telephone"></i>
                        </span>
                        <input id="phone" type="text" class="form-control form-control-with-icon @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="+1 555-0199">
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Section 2: Corporate Details -->
            <div class="section-header">
                <i class="bi bi-building"></i> 2. Corporate Assignment
            </div>
            <div class="row mb-4">
                <!-- Employee ID -->
                <div class="col-md-6 mb-3">
                    <label for="employee_id" class="form-label">Employee ID</label>
                    <div class="input-group">
                        <span class="input-group-text-custom">
                            <i class="bi bi-person-badge"></i>
                        </span>
                        <input id="employee_id" type="text" class="form-control form-control-with-icon @error('employee_id') is-invalid @enderror" name="employee_id" value="{{ old('employee_id') }}" required placeholder="e.g. EMP-00912">
                        @error('employee_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <!-- Department -->
                <div class="col-md-6 mb-3">
                    <label for="department_id" class="form-label">Department</label>
                    <div class="input-group">
                        <span class="input-group-text-custom">
                            <i class="bi bi-diagram-3"></i>
                        </span>
                        <select id="department_id" class="form-select form-control-with-icon @error('department_id') is-invalid @enderror" name="department_id" required>
                            <option value="" disabled selected>Select Department</option>
                            @foreach($departments as $dept)
                                <option value="{{ $dept->id }}" {{ old('department_id') == $dept->id ? 'selected' : '' }}>
                                    {{ $dept->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('department_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Section 3: Credentials Setup -->
            <div class="section-header">
                <i class="bi bi-shield-lock"></i> 3. Security Credentials
            </div>
            <div class="row mb-4">
                <!-- Password -->
                <div class="col-md-6 mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text-custom">
                            <i class="bi bi-lock"></i>
                        </span>
                        <input id="password" type="password" class="form-control form-control-with-icon border-end-0 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Min. 8 characters">
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

                <!-- Confirm Password -->
                <div class="col-md-6 mb-3">
                    <label for="password-confirm" class="form-label">Confirm Password</label>
                    <div class="input-group">
                        <span class="input-group-text-custom">
                            <i class="bi bi-lock-check"></i>
                        </span>
                        <input id="password-confirm" type="password" class="form-control form-control-with-icon border-end-0" name="password_confirmation" required autocomplete="new-password" placeholder="Re-enter password">
                        <span class="password-toggle-btn" id="toggleConfirmPassword">
                            <i class="bi bi-eye" id="confirmEyeIcon"></i>
                        </span>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-submit w-100">
                Register Portal Account <i class="bi bi-person-plus-fill ms-2 align-middle"></i>
            </button>

            <div class="divider"></div>

            <!-- Sign in redirect -->
            <div class="text-center text-muted small">
                <span>Already registered? </span>
                <a href="{{ route('login') }}" class="text-link fw-semibold">Sign In to Portal</a>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Toggle password visibility helper
        function setupToggle(buttonId, inputId, iconId) {
            const btn = document.getElementById(buttonId);
            const input = document.getElementById(inputId);
            const icon = document.getElementById(iconId);

            if (btn && input && icon) {
                btn.addEventListener("click", function() {
                    const type = input.getAttribute("type") === "password" ? "text" : "password";
                    input.setAttribute("type", type);
                    
                    if (type === "text") {
                        icon.classList.remove("bi-eye");
                        icon.classList.add("bi-eye-slash");
                    } else {
                        icon.classList.remove("bi-eye-slash");
                        icon.classList.add("bi-eye");
                    }
                });
            }
        }

        setupToggle("togglePassword", "password", "eyeIcon");
        setupToggle("toggleConfirmPassword", "password-confirm", "confirmEyeIcon");
    });
</script>
@endsection
