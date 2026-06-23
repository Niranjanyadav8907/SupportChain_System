@extends('layouts.master')

@section('title', 'System Settings')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="mb-4">
        <h1 class="h3 mb-0 text-slate-800">System Settings</h1>
        <p class="text-muted mb-0">Configure global helpdesk settings, SLA timers, and notification preferences.</p>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0">
                <form action="{{ route('settings.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="card-body p-4">
                        <!-- Grouped settings -->
                        @foreach($settings as $group => $groupSettings)
                            <div class="mb-5">
                                <h5 class="fw-bold text-slate-700 border-bottom pb-2 mb-3 text-capitalize">
                                    <i class="bi @if($group === 'general') bi-sliders @elseif($group === 'escalation') bi-exclamation-triangle @elseif($group === 'notification') bi-bell @else bi-envelope @endif text-primary me-2"></i>
                                    {{ $group }} Settings
                                </h5>
                                
                                <div class="row g-3">
                                    @foreach($groupSettings as $setting)
                                        <div class="col-12">
                                            <label for="set_{{ $setting->key }}" class="form-label fw-semibold small mb-1">{{ str_replace('_', ' ', $setting->key) }}</label>
                                            
                                            @if($setting->key === 'escalation_enabled' || $setting->key === 'email_notifications_enabled' || $setting->key === 'in_app_notifications_enabled')
                                                <select class="form-select" name="settings[{{ $setting->key }}]" id="set_{{ $setting->key }}">
                                                    <option value="1" {{ $setting->value == '1' ? 'selected' : '' }}>Enabled (Yes)</option>
                                                    <option value="0" {{ $setting->value == '0' ? 'selected' : '' }}>Disabled (No)</option>
                                                </select>
                                            @else
                                                <input type="text" class="form-control" name="settings[{{ $setting->key }}]" id="set_{{ $setting->key }}" value="{{ $setting->value }}">
                                            @endif
                                            
                                            @if($setting->description)
                                                <small class="text-muted mt-1 d-block"><i class="bi bi-info-circle me-1"></i> {{ $setting->description }}</small>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="card-footer bg-transparent border-top p-4 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary px-4 py-2">
                            <i class="bi bi-check2-circle me-1"></i> Save Configurations
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Info Card -->
        <div class="col-lg-4">
            <div class="card shadow-sm border-0 bg-light p-4">
                <h5 class="fw-bold mb-3"><i class="bi bi-lightbulb text-primary me-2"></i>SLA & Escalations</h5>
                <p class="small text-muted mb-3" style="line-height: 1.6;">
                    The SupportChain system uses automated background scanning to enforce deadlines.
                </p>
                <ul class="small text-muted ps-3 mb-0" style="line-height: 1.6;">
                    <li class="mb-2">Tickets breaching default SLA times will trigger automatic manager routing.</li>
                    <li class="mb-2">Ensure cron is configured for <code>php artisan schedule:run</code>.</li>
                    <li>SLA hours can also be specified per Ticket Category.</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
