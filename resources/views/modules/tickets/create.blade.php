@extends('layouts.master')

@section('title', 'Raise Ticket')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="mb-4">
        <h1 class="h3 mb-0 text-slate-800">Raise Support Ticket</h1>
        <p class="text-muted mb-0">Describe the issue in detail. The ticket will automatically route to the corresponding department queue.</p>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <form action="{{ route('tickets.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Ticket Title -->
                        <div class="mb-3">
                            <label for="title" class="form-label fw-semibold">Subject / Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" placeholder="Brief title of the issue" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <!-- Category -->
                            <div class="col-md-6 mb-3">
                                <label for="category_id" class="form-label fw-semibold">Category</label>
                                <select class="form-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
                                    <option value="" disabled selected>Select Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }} (SLA: {{ $category->sla_hours }} Hours)
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Priority -->
                            <div class="col-md-6 mb-3">
                                <label for="priority" class="form-label fw-semibold">Priority Level</label>
                                <select class="form-select @error('priority') is-invalid @enderror" id="priority" name="priority" required>
                                    <option value="low" {{ old('priority') == 'low' ? 'selected' : '' }}>Low - Non-critical requests</option>
                                    <option value="medium" {{ old('priority', 'medium') == 'medium' ? 'selected' : '' }}>Medium - Normal operations</option>
                                    <option value="high" {{ old('priority') == 'high' ? 'selected' : '' }}>High - Business impact</option>
                                    <option value="critical" {{ old('priority') == 'critical' ? 'selected' : '' }}>Critical - System/Server outage</option>
                                </select>
                                @error('priority')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Ticket Description -->
                        <div class="mb-4">
                            <label for="description" class="form-label fw-semibold">Detailed Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="8" placeholder="Please provide step-by-step details, error codes, and what you have attempted..." required>{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- File Attachments -->
                        <div class="mb-4">
                            <label for="attachments" class="form-label fw-semibold">Attachments (Screenshots, Logs, Documents)</label>
                            <input type="file" class="form-control" id="attachments" name="attachments[]" multiple>
                            <small class="text-muted mt-1 d-block"><i class="bi bi-info-circle me-1"></i> You can select multiple files. Max file size: 10MB per file.</small>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary px-4 py-2">
                                <i class="bi bi-send-fill me-1"></i> Submit Ticket
                            </button>
                            <a href="{{ route('tickets.index') }}" class="btn btn-light border px-4 py-2">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Info Sidebar -->
        <div class="col-lg-4">
            <div class="card shadow-sm border-0 mb-4 bg-light">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-3"><i class="bi bi-info-circle text-primary me-2"></i>Hierarchy Rules</h5>
                    <p class="small text-muted mb-3" style="line-height: 1.6;">
                        Your tickets are automatically routed upward based on the hierarchy route:
                    </p>
                    <div class="d-flex flex-column align-items-center gap-2 mb-3 bg-white p-3 border rounded-3">
                        <span class="badge bg-secondary px-3 py-2 w-100">Employee</span>
                        <div class="text-primary"><i class="bi bi-arrow-down-short"></i></div>
                        <span class="badge bg-info text-dark px-3 py-2 w-100">Team Lead</span>
                        <div class="text-primary"><i class="bi bi-arrow-down-short"></i></div>
                        <span class="badge bg-warning text-dark px-3 py-2 w-100">Project Manager</span>
                        <div class="text-primary"><i class="bi bi-arrow-down-short"></i></div>
                        <span class="badge bg-danger px-3 py-2 w-100">HR / Admin</span>
                    </div>
                    <p class="small text-muted mb-0" style="line-height: 1.6;">
                        If the assignee fails to resolve the issue within the SLA period, the ticket will automatically escalate to the supervisor.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
