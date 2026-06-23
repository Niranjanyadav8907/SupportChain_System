@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
    <!-- Welcome Header -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-0 text-slate-800">Welcome Back, {{ auth()->user()->name }}!</h1>
            <p class="text-muted mb-0">Here is a quick overview of SupportChain activity today.</p>
        </div>
        <div>
            <span class="badge bg-primary px-3 py-2 fs-7 rounded-pill">
                <i class="bi bi-calendar2-week me-1"></i> {{ date('l, d M Y') }}
            </span>
        </div>
    </div>

    <!-- Widgets row -->
    <div class="row g-4 mb-5">
        @if (auth()->user()->isAdmin())
            <!-- Admin Widgets -->
            <div class="col-xl-3 col-md-6">
                <div class="card p-3 border-start border-primary border-4 shadow-sm">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <span class="text-uppercase text-xs fw-bold text-muted">Total Tickets</span>
                            <h3 class="mb-0 mt-1 fw-bold">{{ $stats['total_tickets'] ?? 0 }}</h3>
                        </div>
                        <div class="bg-primary-subtle text-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                            <i class="bi bi-ticket-detailed fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card p-3 border-start border-warning border-4 shadow-sm">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <span class="text-uppercase text-xs fw-bold text-muted">Open Tickets</span>
                            <h3 class="mb-0 mt-1 fw-bold text-warning">{{ $stats['open_tickets'] ?? 0 }}</h3>
                        </div>
                        <div class="bg-warning-subtle text-warning rounded-circle d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                            <i class="bi bi-envelope-open fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card p-3 border-start border-danger border-4 shadow-sm">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <span class="text-uppercase text-xs fw-bold text-muted">Escalated Tickets</span>
                            <h3 class="mb-0 mt-1 fw-bold text-danger">{{ $stats['escalated_tickets'] ?? 0 }}</h3>
                        </div>
                        <div class="bg-danger-subtle text-danger rounded-circle d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                            <i class="bi bi-exclamation-triangle fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card p-3 border-start border-success border-4 shadow-sm">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <span class="text-uppercase text-xs fw-bold text-muted">Users Registered</span>
                            <h3 class="mb-0 mt-1 fw-bold">{{ $stats['total_users'] ?? 0 }}</h3>
                        </div>
                        <div class="bg-success-subtle text-success rounded-circle d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                            <i class="bi bi-people fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>

        @elseif (auth()->user()->isTeamLead())
            <!-- Team Lead Widgets -->
            <div class="col-xl-4 col-md-6">
                <div class="card p-3 border-start border-primary border-4 shadow-sm">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <span class="text-uppercase text-xs fw-bold text-muted">Team Tickets</span>
                            <h3 class="mb-0 mt-1 fw-bold">{{ $stats['team_tickets'] ?? 0 }}</h3>
                        </div>
                        <div class="bg-primary-subtle text-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                            <i class="bi bi-people fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-6">
                <div class="card p-3 border-start border-danger border-4 shadow-sm">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <span class="text-uppercase text-xs fw-bold text-muted">Escalated Alerts</span>
                            <h3 class="mb-0 mt-1 fw-bold text-danger">{{ $stats['escalated_tickets'] ?? 0 }}</h3>
                        </div>
                        <div class="bg-danger-subtle text-danger rounded-circle d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                            <i class="bi bi-exclamation-octagon fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-6">
                <div class="card p-3 border-start border-warning border-4 shadow-sm">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <span class="text-uppercase text-xs fw-bold text-muted">Assigned to Me</span>
                            <h3 class="mb-0 mt-1 fw-bold text-warning">{{ $stats['assigned_tickets'] ?? 0 }}</h3>
                        </div>
                        <div class="bg-warning-subtle text-warning rounded-circle d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                            <i class="bi bi-person-check fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>

        @elseif (auth()->user()->isHR())
            <!-- HR Widgets -->
            <div class="col-xl-4 col-md-6">
                <div class="card p-3 border-start border-primary border-4 shadow-sm">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <span class="text-uppercase text-xs fw-bold text-muted">Total HR Tickets</span>
                            <h3 class="mb-0 mt-1 fw-bold">{{ $stats['total_hr_tickets'] ?? 0 }}</h3>
                        </div>
                        <div class="bg-primary-subtle text-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                            <i class="bi bi-ticket-detailed fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-6">
                <div class="card p-3 border-start border-warning border-4 shadow-sm">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <span class="text-uppercase text-xs fw-bold text-muted">Open HR Tickets</span>
                            <h3 class="mb-0 mt-1 fw-bold text-warning">{{ $stats['open_hr_tickets'] ?? 0 }}</h3>
                        </div>
                        <div class="bg-warning-subtle text-warning rounded-circle d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                            <i class="bi bi-envelope-open fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-6">
                <div class="card p-3 border-start border-success border-4 shadow-sm">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <span class="text-uppercase text-xs fw-bold text-muted">Resolved HR Requests</span>
                            <h3 class="mb-0 mt-1 fw-bold text-success">{{ $stats['closed_hr_tickets'] ?? 0 }}</h3>
                        </div>
                        <div class="bg-success-subtle text-success rounded-circle d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                            <i class="bi bi-check-circle fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>

        @else
            <!-- Employee Widgets -->
            <div class="col-xl-4 col-md-6">
                <div class="card p-3 border-start border-primary border-4 shadow-sm">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <span class="text-uppercase text-xs fw-bold text-muted">My Raised Tickets</span>
                            <h3 class="mb-0 mt-1 fw-bold">{{ $stats['my_tickets'] ?? 0 }}</h3>
                        </div>
                        <div class="bg-primary-subtle text-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                            <i class="bi bi-ticket-detailed fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-6">
                <div class="card p-3 border-start border-warning border-4 shadow-sm">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <span class="text-uppercase text-xs fw-bold text-muted">Pending Resolution</span>
                            <h3 class="mb-0 mt-1 fw-bold text-warning">{{ $stats['pending_tickets'] ?? 0 }}</h3>
                        </div>
                        <div class="bg-warning-subtle text-warning rounded-circle d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                            <i class="bi bi-clock fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-6">
                <div class="card p-3 border-start border-success border-4 shadow-sm">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <span class="text-uppercase text-xs fw-bold text-muted">Closed Tickets</span>
                            <h3 class="mb-0 mt-1 fw-bold text-success">{{ $stats['closed_tickets'] ?? 0 }}</h3>
                        </div>
                        <div class="bg-success-subtle text-success rounded-circle d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                            <i class="bi bi-check-circle fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <!-- Details and Lists -->
    <div class="row">
        <!-- Recent Tickets Table -->
        <div class="col-lg-8 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-transparent border-0 d-flex justify-content-between align-items-center py-3">
                    <h5 class="mb-0 text-slate-800 fw-bold">Recent Active Tickets</h5>
                    <a href="{{ route('tickets.index') }}" class="btn btn-outline-primary btn-sm px-3 rounded-pill">View All Tickets</a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table align-middle mb-0">
                            <thead class="table-light text-muted small text-uppercase">
                                <tr>
                                    <th class="ps-4">Ticket ID</th>
                                    <th>Title</th>
                                    <th>Priority</th>
                                    <th>Status</th>
                                    <th>Category</th>
                                    <th>Created On</th>
                                    <th class="pe-4">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentTickets as $ticket)
                                    <tr>
                                        <td class="ps-4 fw-semibold text-primary">#{{ $ticket->ticket_number }}</td>
                                        <td>
                                            <div class="fw-bold">{{ $ticket->title }}</div>
                                            <small class="text-muted">By: {{ $ticket->creator?->name }}</small>
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
                                        <td>{{ $ticket->category?->name }}</td>
                                        <td>{{ $ticket->created_at->format('d M Y') }}</td>
                                        <td class="pe-4">
                                            <a href="{{ route('tickets.show', $ticket->id) }}" class="btn btn-sm btn-light border" data-bs-toggle="tooltip" title="View details">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-4 text-muted">
                                            <i class="bi bi-inbox fs-3 d-block mb-2"></i> No tickets found
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Help & Information Widget -->
        <div class="col-lg-4 mb-4">
            <div class="card shadow-sm h-100 bg-primary text-white p-4 d-flex flex-column justify-content-between position-relative overflow-hidden" style="border-radius: 16px;">
                <div class="position-absolute opacity-10 end-0 bottom-0" style="font-size: 15rem; transform: translate(30px, 50px);">
                    <i class="bi bi-headset"></i>
                </div>
                <div>
                    <h4 class="fw-bold mb-3">SupportChain Helpdesk</h4>
                    <p style="font-size: 0.95rem; line-height: 1.6; opacity: 0.9;">
                        Need technical assistance, hardware replacement, software licenses, or access approvals? Raise a support request. Tickets will follow the company hierarchy path and automatically escalate if unresolved.
                    </p>
                </div>
                <div class="mt-4">
                    <a href="{{ route('tickets.create') }}" class="btn btn-light text-primary w-100 py-3 fw-bold rounded-4 shadow-sm">
                        <i class="bi bi-plus-circle-fill me-2"></i> Raise a New Ticket
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
