@extends('layouts.master')

@section('title', 'SLA Escalations')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="mb-4">
        <h1 class="h3 mb-0 text-slate-800">SLA Escalations</h1>
        <p class="text-muted mb-0">Review active SLA breaches, automatic system alerts, and supervisor overrides.</p>
    </div>

    <!-- Escalations List Card -->
    <div class="card shadow-sm border-0">
        <div class="card-body p-4">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0" id="escalationsTable">
                    <thead class="table-light text-muted small text-uppercase">
                        <tr>
                            <th>Ticket ID</th>
                            <th>Ticket Subject</th>
                            <th>Previous Agent</th>
                            <th>Escalated To (Supervisor)</th>
                            <th>Reason / Trigger</th>
                            <th>Escalation Level</th>
                            <th>Status</th>
                            <th>Logged At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($escalations as $esc)
                            <tr id="esc-row-{{ $esc->id }}">
                                <td class="fw-bold text-primary">#{{ $esc->ticket?->ticket_number }}</td>
                                <td>
                                    <div class="fw-bold">{{ $esc->ticket?->title }}</div>
                                    <small class="text-muted">Raised by: {{ $esc->ticket?->creator?->name }}</small>
                                </td>
                                <td class="small text-muted">{{ $esc->oldAssignee?->name ?? 'Unassigned' }}</td>
                                <td class="fw-semibold">{{ $esc->escalatedTo?->name }}</td>
                                <td>
                                    <span class="small text-muted d-block text-wrap" style="max-width: 250px;">
                                        {{ $esc->reason }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge bg-danger bg-opacity-10 text-danger rounded-pill px-3">
                                        Level {{ $esc->level }}
                                    </span>
                                </td>
                                <td>
                                    @if ($esc->status === 'pending')
                                        <span class="badge bg-warning-subtle text-warning border border-warning-subtle rounded-pill px-3">Pending Action</span>
                                    @else
                                        <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3">Resolved</span>
                                    @endif
                                </td>
                                <td>{{ $esc->created_at->format('d M Y h:i A') }}</td>
                                <td>
                                    <a href="{{ route('tickets.show', $esc->ticket_id) }}" class="btn btn-sm btn-light border" data-bs-toggle="tooltip" title="Inspect Ticket">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    @if($esc->status === 'pending')
                                        <button class="btn btn-sm btn-success resolve-esc-btn" data-id="{{ $esc->id }}" data-bs-toggle="tooltip" title="Mark Resolved">
                                            <i class="bi bi-check2"></i>
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center py-5 text-muted">
                                    <i class="bi bi-shield-check fs-2 d-block mb-2 text-slate-300"></i> No SLA breaches currently flagged.
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
        $('#escalationsTable').DataTable({
            pageLength: 25,
            ordering: true,
            order: [[7, "desc"]],
            responsive: true
        });

        // Resolve escalation log
        $('.resolve-esc-btn').click(function() {
            var id = $(this).data('id');
            $.ajax({
                url: "/escalations/" + id + "/resolve",
                method: "POST",
                success: function(res) {
                    Swal.fire('Resolved', res.message, 'success').then(() => {
                        location.reload();
                    });
                },
                error: function(xhr) {
                    Swal.fire('Error', 'Failed to resolve escalation log.', 'error');
                }
            });
        });
    });
</script>
@endpush
