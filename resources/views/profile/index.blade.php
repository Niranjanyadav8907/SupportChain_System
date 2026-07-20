@extends('layouts.master')

@section('title', 'My Profile')

@section('content')
<style>
    :root {
        --profile-navy: #1E2A45;
        --profile-navy-light: #2B3A67;
        --profile-gold: #C9A227;
        --profile-gold-light: #E8C766;
        --profile-bg: #F5F7FA;
        --profile-border: #E4E8F0;
        --profile-text: #1E2A45;
        --profile-muted: #6B7688;
    }

    .profile-wrap {
        background: var(--profile-bg);
        padding: 8px 0 32px;
    }

    /* Page header banner */
    .profile-banner {
        background: linear-gradient(120deg, var(--profile-navy) 0%, var(--profile-navy-light) 100%);
        border-radius: 16px;
        padding: 28px 32px;
        margin-bottom: 28px;
        display: flex;
        align-items: center;
        gap: 20px;
        box-shadow: 0 8px 24px rgba(30, 42, 69, 0.18);
    }

    .profile-avatar {
        width: 64px;
        height: 64px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--profile-gold-light), var(--profile-gold));
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 1.4rem;
        color: var(--profile-navy);
        flex-shrink: 0;
        border: 3px solid rgba(255,255,255,0.25);
    }

    .profile-banner h4 {
        color: #fff;
        font-weight: 700;
        margin-bottom: 2px;
    }

    .profile-banner p {
        color: rgba(255,255,255,0.75);
        margin: 0;
        font-size: 0.9rem;
    }

    /* Cards */
    .profile-card {
        background: #fff;
        border: 1px solid var(--profile-border);
        border-radius: 14px;
        box-shadow: 0 2px 10px rgba(30, 42, 69, 0.05);
        overflow: hidden;
        transition: box-shadow 0.2s ease;
    }

    .profile-card:hover {
        box-shadow: 0 6px 20px rgba(30, 42, 69, 0.09);
    }

    .profile-card-header {
        padding: 22px 26px 16px;
        border-bottom: 1px solid var(--profile-border);
    }

    .profile-card-header .icon-badge {
        width: 38px;
        height: 38px;
        border-radius: 10px;
        background: rgba(43, 58, 103, 0.08);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        color: var(--profile-navy-light);
        font-size: 1.1rem;
        margin-right: 10px;
    }

    .profile-card-header h5 {
        color: var(--profile-text);
        font-weight: 700;
        display: inline-flex;
        align-items: center;
        margin-bottom: 4px;
    }

    .profile-card-header p {
        color: var(--profile-muted);
        font-size: 0.85rem;
        margin: 0 0 0 48px;
    }

    .profile-card-body {
        padding: 24px 26px 26px;
    }

    /* Form controls */
    .profile-card-body label {
        color: var(--profile-text);
        font-size: 0.85rem;
        font-weight: 600;
        margin-bottom: 6px;
    }

    .profile-card-body .form-control {
        border: 1px solid var(--profile-border);
        border-radius: 8px;
        padding: 10px 14px;
        font-size: 0.95rem;
        color: var(--profile-text);
        transition: border-color 0.15s ease, box-shadow 0.15s ease;
    }

    .profile-card-body .form-control:focus {
        border-color: var(--profile-navy-light);
        box-shadow: 0 0 0 3px rgba(43, 58, 103, 0.12);
    }

    .profile-card-body .form-control.bg-light {
        background-color: #F8F9FB !important;
        color: var(--profile-muted);
    }

    .profile-card-body .form-control.is-invalid {
        border-color: #DC3545;
    }

    /* Button */
    .btn-profile-save {
        background: var(--profile-navy);
        border: none;
        color: #fff;
        font-weight: 600;
        border-radius: 8px;
        padding: 10px 24px;
        transition: background 0.15s ease, transform 0.1s ease;
    }

    .btn-profile-save:hover {
        background: var(--profile-navy-light);
        color: #fff;
        transform: translateY(-1px);
    }

    .btn-profile-save.gold {
        background: var(--profile-gold);
        color: var(--profile-navy);
    }

    .btn-profile-save.gold:hover {
        background: var(--profile-gold-light);
        color: var(--profile-navy);
    }
</style>

<div class="container-fluid profile-wrap">

    <!-- Header banner -->
    <div class="profile-banner">
        <div class="profile-avatar">
            {{ collect(explode(' ', $user->name))->map(fn($p) => strtoupper(substr($p, 0, 1)))->take(2)->implode('') }}
        </div>
        <div>
            <h4>{{ $user->name }}</h4>
            <p>{{ $user->employee_id }} &middot; {{ $user->department?->name ?? 'No Department Assigned' }}</p>
        </div>
    </div>

    <div class="row">
        <!-- Profile details card -->
        <div class="col-lg-6 mb-4">
            <div class="profile-card h-100">
                <div class="profile-card-header">
                    <h5><span class="icon-badge"><i class="bi bi-person-circle"></i></span>Account Information</h5>
                    <p>Update your corporate profile details</p>
                </div>
                <div class="profile-card-body">
                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="employee_id" class="form-label">Employee ID</label>
                            <input
                                type="text"
                                class="form-control bg-light"
                                id="employee_id"
                                value="{{ $user->employee_id }}"
                                readonly>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Extension / Number</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone', $user->phone) }}">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-muted">Primary Department</label>
                                <input type="text" class="form-control bg-light" value="{{ $user->department?->name ?? 'N/A' }}" readonly>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-muted">Reporting Manager</label>
                                <input type="text" class="form-control bg-light" value="{{ $user->manager?->name ?? 'None' }}" readonly>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-profile-save mt-3">
                            <i class="bi bi-check2-circle me-1"></i> Save Changes
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Password Change Card -->
        <div class="col-lg-6 mb-4" id="change-password">
            <div class="profile-card h-100">
                <div class="profile-card-header">
                    <h5><span class="icon-badge"><i class="bi bi-shield-lock"></i></span>Security Settings</h5>
                    <p>Change your portal access password</p>
                </div>
                <div class="profile-card-body">
                    <form method="POST" action="{{ route('profile.password') }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="current_password" class="form-label">Current Password</label>
                            <input type="password" class="form-control @error('current_password') is-invalid @enderror" id="current_password" name="current_password" required placeholder=" ">
                            @error('current_password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="new_password" class="form-label">New Password</label>
                            <input type="password" class="form-control @error('new_password') is-invalid @enderror" id="new_password" name="new_password" required placeholder="Min. 8 characters">
                            @error('new_password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
                            <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" required placeholder="">
                        </div>

                        <button type="submit" class="btn btn-profile-save gold mt-3">
                            <i class="bi bi-shield-check me-1"></i> Update Password
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection