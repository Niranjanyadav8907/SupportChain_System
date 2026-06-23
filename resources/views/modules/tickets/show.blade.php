@extends('layouts.master')

@section('title', 'Ticket Details')

@section('content')
<div class="container-fluid">
    <!-- Header/Breadcrumb -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-0 text-slate-800">Ticket Details</h1>
            <p class="text-muted mb-0">Ticket ID: <span class="fw-bold text-primary">#{{ $ticket->ticket_number }}</span></p>
        </div>
        <a href="{{ route('tickets.index') }}" class="btn btn-outline-secondary btn-sm rounded-pill px-3">
            <i class="bi bi-arrow-left me-1"></i> Back to List
        </a>
    </div>

    <div class="row">
        <!-- Main Timeline / Tab area -->
        <div class="col-lg-8 mb-4">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body p-4">
                    <!-- Ticket Main Header details -->
                    <div class="d-flex align-items-center justify-content-between border-bottom pb-3 mb-4">
                        <div class="d-flex align-items-center gap-3">
                            <div class="bg-primary text-white rounded-4 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                <i class="bi bi-laptop fs-3"></i>
                            </div>
                            <div>
                                <h4 class="fw-bold mb-1">{{ $ticket->title }}</h4>
                                <small class="text-muted">Raised by: <span class="fw-semibold text-dark">{{ $ticket->creator?->name }}</span> | Created on: {{ $ticket->created_at->format('d M Y h:i A') }}</small>
                            </div>
                        </div>
                        <div class="text-end">
                            <span class="d-block small text-muted text-uppercase fw-semibold mb-1">Status</span>
                            @if ($ticket->status === 'open')
                                <span class="badge bg-primary px-3 py-2 rounded-pill">Open</span>
                            @elseif ($ticket->status === 'in_progress')
                                <span class="badge bg-warning text-dark px-3 py-2 rounded-pill">In Progress</span>
                            @elseif ($ticket->status === 'resolved')
                                <span class="badge bg-success px-3 py-2 rounded-pill">Resolved</span>
                            @else
                                <span class="badge bg-secondary px-3 py-2 rounded-pill">Closed</span>
                            @endif
                        </div>
                    </div>

                    <!-- Navigation Tabs -->
                    <ul class="nav nav-tabs border-bottom mb-4" id="ticketTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active fw-bold" id="conversation-tab" data-bs-toggle="tab" data-bs-target="#conversation" type="button" role="tab">Conversation</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link fw-bold" id="details-tab" data-bs-toggle="tab" data-bs-target="#details" type="button" role="tab">Ticket Details</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link fw-bold" id="attachments-tab" data-bs-toggle="tab" data-bs-target="#attachments" type="button" role="tab">Attachments ({{ $ticket->attachments->count() }})</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link fw-bold" id="history-tab" data-bs-toggle="tab" data-bs-target="#history" type="button" role="tab">History</button>
                        </li>
                    </ul>

                    <!-- Tab Contents -->
                    <div class="tab-content" id="ticketTabsContent">
                        
                        <!-- 1. Conversation Timeline -->
                        <div class="tab-pane fade show active" id="conversation" role="tabpanel">
                            <!-- Ticket Description (First Post) -->
                            <div class="bg-light rounded-4 p-4 mb-4 border border-opacity-10">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center fw-bold" style="width: 32px; height: 32px;">
                                            {{ substr($ticket->creator?->name, 0, 1) }}
                                        </div>
                                        <span class="fw-bold">{{ $ticket->creator?->name }}</span>
                                        <span class="badge bg-secondary-subtle text-dark fs-8">Author</span>
                                    </div>
                                    <small class="text-muted">{{ $ticket->created_at->format('d M Y h:i A') }}</small>
                                </div>
                                <p class="mb-0 text-slate-800" style="white-space: pre-wrap; line-height: 1.6;">{{ $ticket->description }}</p>
                            </div>

                            <!-- Comment Thread -->
                            <div class="comments-thread mb-4">
                                @foreach($ticket->comments as $comment)
                                    <div class="card border-0 mb-3 @if($comment->is_internal) bg-warning bg-opacity-10 border-start border-warning border-4 @else bg-light @endif" style="border-radius: 14px;">
                                        <div class="card-body p-3">
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="bg-dark text-white rounded-circle d-flex align-items-center justify-content-center fw-bold" style="width: 28px; height: 28px; font-size: 0.8rem;">
                                                        {{ substr($comment->user?->name, 0, 1) }}
                                                    </div>
                                                    <span class="fw-bold small">{{ $comment->user?->name }}</span>
                                                    @if($comment->is_internal)
                                                        <span class="badge bg-warning text-dark fs-9">Internal Note</span>
                                                    @endif
                                                </div>
                                                <small class="text-muted fs-8">{{ $comment->created_at->format('d M Y h:i A') }}</small>
                                            </div>
                                            <p class="mb-0 small text-slate-800" style="white-space: pre-wrap;">{{ $comment->comment }}</p>
                                            
                                            @if($comment->attachment_path)
                                                <div class="mt-2 pt-2 border-top border-white border-opacity-10">
                                                    <a href="{{ asset('storage/' . $comment->attachment_path) }}" target="_blank" class="btn btn-sm btn-outline-secondary py-1 px-2 rounded-3 text-xs">
                                                        <i class="bi bi-paperclip me-1"></i> View Attachment
                                                    </a>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <!-- Reply Box -->
                            @if($ticket->status !== 'closed')
                                <div class="border-top pt-4">
                                    <h6 class="fw-bold mb-3">Add Reply</h6>
                                    <form id="commentForm" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <textarea class="form-control rounded-4" name="comment" rows="4" placeholder="Type your message here..." required></textarea>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col-md-6 mb-3 mb-md-0">
                                                <input type="file" class="form-control form-control-sm" name="attachment">
                                            </div>
                                            <div class="col-md-6 text-md-end">
                                                @if(auth()->user()->isAdmin() || auth()->user()->isTeamLead() || auth()->user()->isProjectManager() || auth()->user()->isHR())
                                                    <div class="form-check form-check-inline me-3">
                                                        <input class="form-check-input" type="checkbox" name="is_internal" value="1" id="is_internal">
                                                        <label class="form-check-label small" for="is_internal">Internal Note (Visible to Agents Only)</label>
                                                    </div>
                                                @endif
                                                <button type="submit" class="btn btn-primary px-4">
                                                    Send Reply <i class="bi bi-send ms-1"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            @else
                                <div class="alert alert-light border text-center rounded-4 py-3">
                                    <i class="bi bi-lock-fill me-1"></i> This ticket is closed. Reopen the ticket to add a comment.
                                </div>
                            @endif
                        </div>

                        <!-- 2. Ticket Details Tab -->
                        <div class="tab-pane fade" id="details" role="tabpanel">
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <h6 class="fw-bold text-muted text-uppercase fs-8">Subject</h6>
                                    <p class="fw-bold">{{ $ticket->title }}</p>

                                    <h6 class="fw-bold text-muted text-uppercase fs-8 mt-4">Category</h6>
                                    <p>{{ $ticket->category?->name }}</p>

                                    <h6 class="fw-bold text-muted text-uppercase fs-8 mt-4">SLA Deadline</h6>
                                    <p>{{ $ticket->sla_deadline ? $ticket->sla_deadline->format('Y-m-d H:i:s') : 'N/A' }}</p>
                                </div>
                                <div class="col-md-6">
                                    <h6 class="fw-bold text-muted text-uppercase fs-8">Priority</h6>
                                    <p>
                                        <span class="badge bg-secondary-subtle text-dark border-0 rounded px-2 py-1 text-capitalize">
                                            {{ $ticket->priority }}
                                        </span>
                                    </p>

                                    <h6 class="fw-bold text-muted text-uppercase fs-8 mt-4">Department Queue</h6>
                                    <p>{{ $ticket->department?->name ?? 'N/A' }}</p>

                                    <h6 class="fw-bold text-muted text-uppercase fs-8 mt-4">Escalation Count</h6>
                                    <p>{{ $ticket->escalations->count() }} times escalated</p>
                                </div>
                            </div>
                        </div>

                        <!-- 3. Attachments Tab -->
                        <div class="tab-pane fade" id="attachments" role="tabpanel">
                            <div class="row g-3">
                                @forelse($ticket->attachments as $attach)
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-center justify-content-between p-3 border rounded-4 bg-light">
                                            <div class="d-flex align-items-center gap-2 overflow-hidden">
                                                <i class="bi bi-file-earmark-check fs-4 text-primary"></i>
                                                <div class="overflow-hidden">
                                                    <span class="d-block text-truncate small fw-bold">{{ $attach->file_name }}</span>
                                                    <small class="text-muted">{{ $attach->formatted_size }}</small>
                                                </div>
                                            </div>
                                            <a href="{{ asset('storage/' . $attach->file_path) }}" target="_blank" class="btn btn-sm btn-light border">
                                                <i class="bi bi-download"></i>
                                            </a>
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-12 text-center py-4 text-muted">
                                        <p class="mb-0">No attachments found on this ticket.</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>

                        <!-- 4. History Tab -->
                        <div class="tab-pane fade" id="history" role="tabpanel">
                            <div class="timeline-trail ps-3 border-start py-2">
                                @foreach($ticket->comments->where('is_internal', false) as $history)
                                    <div class="position-relative mb-4 ps-4">
                                        <div class="position-absolute bg-primary rounded-circle" style="width: 10px; height: 10px; left: -29px; top: 6px;"></div>
                                        <div class="small fw-bold">{{ $history->comment }}</div>
                                        <small class="text-muted">{{ $history->created_at->format('d M Y h:i A') }} by {{ $history->user?->name }}</small>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Ticket Information and Action Panel -->
        <div class="col-lg-4">
            <!-- Ticket Info Panel -->
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-4 text-slate-800">Ticket Information</h5>
                    <table class="table table-sm table-borderless mb-0">
                        <tbody>
                            <tr>
                                <td class="text-muted py-2">Ticket ID</td>
                                <td class="fw-bold text-end py-2">#{{ $ticket->ticket_number }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted py-2">Category</td>
                                <td class="text-end py-2">{{ $ticket->category?->name }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted py-2">Priority</td>
                                <td class="text-end py-2">
                                    <span class="badge bg-secondary-subtle text-dark border-0 rounded px-2 py-1 text-capitalize">
                                        {{ $ticket->priority }}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-muted py-2">Created By</td>
                                <td class="text-end py-2">{{ $ticket->creator?->name }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted py-2">Department</td>
                                <td class="text-end py-2">{{ $ticket->department?->name }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted py-2">Assigned To</td>
                                <td class="text-end py-2 fw-semibold text-primary">
                                    {{ $ticket->assignee?->name ?? 'Unassigned' }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Actions Panel -->
            @if(auth()->user()->isAdmin() || auth()->user()->isTeamLead() || auth()->user()->isProjectManager() || auth()->user()->isHR())
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-4 text-slate-800">Queue & Action Center</h5>
                        
                        <!-- Assign ticket -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold small text-muted text-uppercase">Assign Ticket</label>
                            <form id="assignTicketForm" class="d-flex gap-2">
                                @csrf
                                <select class="form-select form-select-sm" name="assigned_to" required>
                                    <option value="" disabled selected>Select Agent...</option>
                                    @foreach($agents as $agent)
                                        <option value="{{ $agent->id }}" {{ $ticket->assigned_to == $agent->id ? 'selected' : '' }}>
                                            {{ $agent->name }} ({{ $agent->roles->first()?->name }})
                                        </option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-primary btn-sm px-3">Assign</button>
                            </form>
                        </div>

                        <!-- Change Status -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold small text-muted text-uppercase">Change Status</label>
                            <form id="changeStatusForm" class="d-flex gap-2">
                                @csrf
                                <select class="form-select form-select-sm" name="status" required>
                                    <option value="open" {{ $ticket->status === 'open' ? 'selected' : '' }}>Open</option>
                                    <option value="in_progress" {{ $ticket->status === 'in_progress' ? 'selected' : '' }}>In Progress</option>
                                    <option value="resolved" {{ $ticket->status === 'resolved' ? 'selected' : '' }}>Resolved</option>
                                    <option value="closed" {{ $ticket->status === 'closed' ? 'selected' : '' }}>Closed</option>
                                    <option value="reopened" {{ $ticket->status === 'reopened' ? 'selected' : '' }}>Reopened</option>
                                </select>
                                <button type="submit" class="btn btn-primary btn-sm px-3">Update</button>
                            </form>
                        </div>

                        <!-- Escalate Ticket -->
                        @if($ticket->status !== 'closed' && $ticket->status !== 'resolved')
                            <div class="border-top pt-3 mt-3">
                                <label class="form-label fw-semibold small text-muted text-uppercase">Manual Escalation Override</label>
                                <form id="escalateForm">
                                    @csrf
                                    <div class="mb-2">
                                        <input type="text" class="form-control form-control-sm" name="reason" placeholder="Reason for escalation override..." required>
                                    </div>
                                    <button type="submit" class="btn btn-danger btn-sm w-100 fw-bold">
                                        <i class="bi bi-exclamation-triangle-fill me-1"></i> Escalate Ticket Upward
                                    </button>
                                </form>
                            </div>
                        @endif

                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        // Comment submission AJAX
        $('#commentForm').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: "{{ route('tickets.comment', $ticket->id) }}",
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(res) {
                    Swal.fire('Success', res.message, 'success').then(() => {
                        location.reload();
                    });
                },
                error: function(xhr) {
                    Swal.fire('Error', xhr.responseJSON.message || 'Validation failed.', 'error');
                }
            });
        });

        // Ticket Assignment AJAX
        $('#assignTicketForm').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: "{{ route('tickets.assign', $ticket->id) }}",
                method: "POST",
                data: $(this).serialize(),
                success: function(res) {
                    Swal.fire('Success', res.message, 'success').then(() => {
                        location.reload();
                    });
                },
                error: function(xhr) {
                    Swal.fire('Error', xhr.responseJSON.message || 'Operation failed.', 'error');
                }
            });
        });

        // Status update AJAX
        $('#changeStatusForm').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: "{{ route('tickets.status', $ticket->id) }}",
                method: "POST",
                data: $(this).serialize(),
                success: function(res) {
                    Swal.fire('Success', res.message, 'success').then(() => {
                        location.reload();
                    });
                },
                error: function(xhr) {
                    Swal.fire('Error', xhr.responseJSON.message || 'Operation failed.', 'error');
                }
            });
        });

        // Manual Escalation AJAX
        $('#escalateForm').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: "{{ route('tickets.escalate', $ticket->id) }}",
                method: "POST",
                data: $(this).serialize(),
                success: function(res) {
                    Swal.fire('Escalated!', res.message, 'warning').then(() => {
                        location.reload();
                    });
                },
                error: function(xhr) {
                    Swal.fire('Error', xhr.responseJSON.message || 'Escalation failed.', 'error');
                }
            });
        });
    });
</script>
@endpush
