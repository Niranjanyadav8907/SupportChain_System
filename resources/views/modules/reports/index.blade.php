@extends('layouts.master')

@section('title', 'System Reports')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-0 text-slate-800">Support Analytics & Reports</h1>
            <p class="text-muted mb-0">Generate tickets reports, SLA breach analysis, and resolution rates.</p>
        </div>
        <button class="btn btn-success rounded-pill px-4 shadow-sm" id="exportReportBtn">
            <i class="bi bi-file-earmark-excel-fill me-1"></i> Export CSV
        </button>
    </div>

    <!-- Analytics Summary Widgets -->
    <div class="row g-3 mb-4">
        <div class="col-xl-3 col-md-6">
            <div class="card p-3 border-start border-primary border-4 shadow-sm">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-uppercase text-xs fw-bold text-muted">Total Tickets Checked</span>
                        <h3 class="mb-0 mt-1 fw-bold">{{ $analytics['total'] }}</h3>
                    </div>
                    <div class="bg-primary-subtle text-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                        <i class="bi bi-filter-square fs-5"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card p-3 border-start border-success border-4 shadow-sm">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-uppercase text-xs fw-bold text-muted">Resolved Rate</span>
                        <h3 class="mb-0 mt-1 fw-bold text-success">{{ $analytics['resolved'] }}</h3>
                    </div>
                    <div class="bg-success-subtle text-success rounded-circle d-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                        <i class="bi bi-patch-check fs-5"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card p-3 border-start border-warning border-4 shadow-sm">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-uppercase text-xs fw-bold text-muted">Active SLA Breaches</span>
                        <h3 class="mb-0 mt-1 fw-bold text-warning">{{ $analytics['breached'] }}</h3>
                    </div>
                    <div class="bg-warning-subtle text-warning rounded-circle d-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                        <i class="bi bi-clock-history fs-5"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card p-3 border-start border-danger border-4 shadow-sm">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-uppercase text-xs fw-bold text-muted">Escalation Count</span>
                        <h3 class="mb-0 mt-1 fw-bold text-danger">{{ $analytics['escalated'] }}</h3>
                    </div>
                    <div class="bg-danger-subtle text-danger rounded-circle d-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                        <i class="bi bi-exclamation-triangle fs-5"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters Panel -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body p-4">
            <h5 class="fw-bold mb-3"><i class="bi bi-funnel text-primary me-2"></i>Report Filters</h5>
            <form id="filterForm" action="{{ route('reports.index') }}" method="GET" class="row g-3">
                <div class="col-md-3">
                    <label class="form-label small fw-semibold text-muted">Department</label>
                    <select class="form-select" name="department_id">
                        <option value="">All Departments</option>
                        @foreach($departments as $dept)
                            <option value="{{ $dept->id }}" {{ request('department_id') == $dept->id ? 'selected' : '' }}>{{ $dept->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label small fw-semibold text-muted">Employee (Raised By)</label>
                    <select class="form-select" name="user_id">
                        <option value="">All Employees</option>
                        @foreach($employees as $emp)
                            <option value="{{ $emp->id }}" {{ request('user_id') == $emp->id ? 'selected' : '' }}>{{ $emp->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label small fw-semibold text-muted">Priority</label>
                    <select class="form-select" name="priority">
                        <option value="">All Priorities</option>
                        <option value="low" {{ request('priority') === 'low' ? 'selected' : '' }}>Low</option>
                        <option value="medium" {{ request('priority') === 'medium' ? 'selected' : '' }}>Medium</option>
                        <option value="high" {{ request('priority') === 'high' ? 'selected' : '' }}>High</option>
                        <option value="critical" {{ request('priority') === 'critical' ? 'selected' : '' }}>Critical</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label small fw-semibold text-muted">Status</label>
                    <select class="form-select" name="status">
                        <option value="">All Statuses</option>
                        <option value="open" {{ request('status') === 'open' ? 'selected' : '' }}>Open</option>
                        <option value="in_progress" {{ request('status') === 'in_progress' ? 'selected' : '' }}>In Progress</option>
                        <option value="resolved" {{ request('status') === 'resolved' ? 'selected' : '' }}>Resolved</option>
                        <option value="closed" {{ request('status') === 'closed' ? 'selected' : '' }}>Closed</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label small fw-semibold text-muted">Start Date</label>
                    <input type="date" class="form-control" name="start_date" value="{{ request('start_date') }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label small fw-semibold text-muted">End Date</label>
                    <input type="date" class="form-control" name="end_date" value="{{ request('end_date') }}">
                </div>
                <div class="col-md-4 d-flex align-items-end gap-2">
                    <button type="submit" class="btn btn-primary w-100 py-2">
                        <i class="bi bi-search me-1"></i> Apply Filter
                    </button>
                    <a href="{{ route('reports.index') }}" class="btn btn-light border py-2 text-muted">Reset</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Results Table -->
    <div class="card shadow-sm border-0">
        <div class="card-body p-4">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0" id="reportsTable">
                    <thead class="table-light text-muted small text-uppercase">
                        <tr>
                            <th>Ticket ID</th>
                            <th>Title & Subject</th>
                            <th>Department</th>
                            <th>Category</th>
                            <th>Priority</th>
                            <th>Status</th>
                            <th>Raised Date</th>
                            <th>SLA Breach</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tickets as $ticket)
                            <tr>
                                <td class="fw-bold text-primary">#{{ $ticket->ticket_number }}</td>
                                <td>
                                    <div class="fw-bold">{{ $ticket->title }}</div>
                                    <small class="text-muted">By: {{ $ticket->creator?->name }}</small>
                                </td>
                                <td>{{ $ticket->department?->name }}</td>
                                <td>{{ $ticket->category?->name }}</td>
                                <td>
                                    @if ($ticket->priority === 'critical')
                                        <span class="badge bg-danger">Critical</span>
                                    @else
                                        <span class="badge bg-secondary text-capitalize">{{ $ticket->priority }}</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark border">{{ strtoupper($ticket->status) }}</span>
                                </td>
                                <td>{{ $ticket->created_at->format('Y-m-d') }}</td>
                                <td>
                                    @if($ticket->sla_deadline && Carbon\Carbon::now()->gt($ticket->sla_deadline) && $ticket->status !== 'closed' && $ticket->status !== 'resolved')
                                        <span class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-20">Breached</span>
                                    @else
                                        <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-20">Compliant</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#reportsTable').DataTable({
            pageLength: 20,
            ordering: true,
            responsive: true
        });

        // Trigger CSV Export using filtered criteria
        $('#exportReportBtn').click(function() {
            var params = $('#filterForm').serialize();
            window.location.href = "{{ route('reports.export') }}?" + params;
        });
    });
</script>
@endpush
