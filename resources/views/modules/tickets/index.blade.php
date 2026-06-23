@extends('layouts.master')

@section('title', 'Tickets')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-0 text-slate-800">Support Tickets</h1>
            <p class="text-muted mb-0">Track raised support tickets, active queues, and resolution deadlines.</p>
        </div>
        <a href="{{ route('tickets.create') }}" class="btn btn-primary rounded-pill px-4 shadow-sm">
            <i class="bi bi-plus-circle-fill me-1"></i> Raise Ticket
        </a>
    </div>

    <!-- Filters Section -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body p-4">
            <form action="{{ route('tickets.index') }}" method="GET" class="row g-3 align-items-end">
                <div class="col-md-3">
                    <label class="form-label fw-semibold text-muted small text-uppercase">Status</label>
                    <select class="form-select" name="status">
                        <option value="">All Statuses</option>
                        <option value="open" {{ request('status') === 'open' ? 'selected' : '' }}>Open</option>
                        <option value="in_progress" {{ request('status') === 'in_progress' ? 'selected' : '' }}>In Progress</option>
                        <option value="resolved" {{ request('status') === 'resolved' ? 'selected' : '' }}>Resolved</option>
                        <option value="closed" {{ request('status') === 'closed' ? 'selected' : '' }}>Closed</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-semibold text-muted small text-uppercase">Priority</label>
                    <select class="form-select" name="priority">
                        <option value="">All Priorities</option>
                        <option value="low" {{ request('priority') === 'low' ? 'selected' : '' }}>Low</option>
                        <option value="medium" {{ request('priority') === 'medium' ? 'selected' : '' }}>Medium</option>
                        <option value="high" {{ request('priority') === 'high' ? 'selected' : '' }}>High</option>
                        <option value="critical" {{ request('priority') === 'critical' ? 'selected' : '' }}>Critical</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold text-muted small text-uppercase">Search Keyword</label>
                    <input type="text" class="form-control" name="search" value="{{ request('search') }}" placeholder="Title, description, ticket ID...">
                </div>
                <div class="col-md-2 d-flex gap-2">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-funnel-fill me-1"></i> Filter
                    </button>
                    <a href="{{ route('tickets.index') }}" class="btn btn-light border text-muted">
                        <i class="bi bi-arrow-counterclockwise"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Tickets Table Card -->
    <div class="card shadow-sm border-0">
        <div class="card-body p-4">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0" id="ticketsTable">
                    <thead class="table-light text-muted small text-uppercase">
                        <tr>
                            <th>Ticket ID</th>
                            <th>Title & Subject</th>
                            <th>Priority</th>
                            <th>Status</th>
                            <th>Department</th>
                            <th>Assignee</th>
                            <th>Deadline</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($tickets as $ticket)
                            <tr>
                                <td class="fw-bold text-primary">#{{ $ticket->ticket_number }}</td>
                                <td>
                                    <div class="fw-bold">{{ $ticket->title }}</div>
                                    <small class="text-muted">Raised by: {{ $ticket->creator?->name }} ({{ $ticket->category?->name }})</small>
                                </td>
                                <td>
                                    @if ($ticket->priority === 'critical')
                                        <span class="badge bg-danger">Critical</span>
                                    @elseif ($ticket->priority === 'high')
                                        <span class="badge bg-warning text-dark">High</span>
                                    @elseif ($ticket->priority === 'medium')
                                        <span class="badge bg-info text-dark">Medium</span>
                                    @else
                                        <span class="badge bg-secondary">Low</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($ticket->status === 'open')
                                        <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-3">Open</span>
                                    @elseif ($ticket->status === 'in_progress')
                                        <span class="badge bg-warning-subtle text-warning border border-warning-subtle rounded-pill px-3">In Progress</span>
                                    @elseif ($ticket->status === 'resolved')
                                        <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3">Resolved</span>
                                    @else
                                        <span class="badge bg-light text-muted border rounded-pill px-3">Closed</span>
                                    @endif
                                </td>
                                <td>{{ $ticket->department?->name ?? 'N/A' }}</td>
                                <td>
                                    @if($ticket->assignee)
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center fw-bold" style="width: 24px; height: 24px; font-size: 0.75rem;">
                                                {{ substr($ticket->assignee->name, 0, 1) }}
                                            </div>
                                            <span class="small">{{ $ticket->assignee->name }}</span>
                                        </div>
                                    @else
                                        <span class="text-danger small fw-semibold"><i class="bi bi-person-x me-1"></i> Unassigned</span>
                                    @endif
                                </td>
                                <td>
                                    @if($ticket->sla_deadline)
                                        <span class="small @if(Carbon\Carbon::now()->gt($ticket->sla_deadline) && $ticket->status !== 'closed' && $ticket->status !== 'resolved') text-danger fw-bold @else text-muted @endif">
                                            {{ $ticket->sla_deadline->format('d M Y h:i A') }}
                                        </span>
                                    @else
                                        <span class="text-muted small">N/A</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('tickets.show', $ticket->id) }}" class="btn btn-sm btn-light border">
                                        <i class="bi bi-eye"></i> View
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-5 text-muted">
                                    <i class="bi bi-ticket-detailed fs-2 d-block mb-2 text-slate-300"></i> No tickets found
                                </td>
                            </tr>
                        @endforelse
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
        $('#ticketsTable').DataTable({
            pageLength: 25,
            ordering: true,
            order: [[0, "desc"]],
            responsive: true
        });
    });
</script>
@endpush
