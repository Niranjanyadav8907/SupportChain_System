@extends('layouts.master')

@section('title', 'Notification Center')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-0 text-slate-800">Notification Center</h1>
            <p class="text-muted mb-0">System alerts, ticket assignments, status updates, and SLA notifications.</p>
        </div>
        @if(auth()->user()->unreadNotifications->isNotEmpty())
            <button class="btn btn-outline-primary btn-sm rounded-pill px-3 mark-all-read-btn">
                <i class="bi bi-check2-all me-1"></i> Mark All as Read
            </button>
        @endif
    </div>

    <!-- Notifications List -->
    <div class="card shadow-sm border-0">
        <div class="card-body p-4">
            <div class="list-group list-group-flush">
                @forelse($notifications as $n)
                    <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center rounded-3 p-3 mb-2 border @if(is_null($n->read_at)) border-primary border-opacity-10 bg-primary bg-opacity-5 @else bg-light @endif">
                        <div class="d-flex gap-3 align-items-center overflow-hidden">
                            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 42px; height: 42px; flex-shrink: 0;">
                                <i class="bi bi-bell-fill"></i>
                            </div>
                            <div class="overflow-hidden">
                                <h6 class="mb-0 fw-bold @if(is_null($n->read_at)) text-primary @else text-slate-700 @endif">{{ $n->data['message'] }}</h6>
                                <small class="text-muted">{{ $n->created_at->format('d M Y h:i A') }} ({{ $n->created_at->diffForHumans() }})</small>
                            </div>
                        </div>
                        <div class="d-flex gap-2">
                            <a href="{{ route('tickets.show', $n->data['ticket_id']) }}" class="btn btn-sm btn-light border">
                                <i class="bi bi-eye"></i> View Ticket
                            </a>
                            @if(is_null($n->read_at))
                                <button class="btn btn-sm btn-success mark-read-btn" data-id="{{ $n->id }}">
                                    <i class="bi bi-check2"></i> Mark Read
                                </button>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="text-center py-5 text-muted">
                        <i class="bi bi-bell-slash fs-2 d-block mb-2 text-slate-300"></i> No alerts logged.
                    </div>
                @endforelse
            </div>

            <!-- Pagination Links -->
            <div class="mt-4">
                {{ $notifications->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        // Mark Single Read
        $('.mark-read-btn').click(function() {
            var id = $(this).data('id');
            var btn = $(this);
            $.ajax({
                url: "/notifications/" + id + "/read",
                method: "POST",
                success: function(res) {
                    btn.closest('.list-group-item').removeClass('border-primary bg-primary bg-opacity-5').addClass('bg-light');
                    btn.remove();
                    updateNotificationCount();
                }
            });
        });

        // Mark All Read
        $('.mark-all-read-btn').click(function() {
            $.ajax({
                url: "{{ route('notifications.read-all') }}",
                method: "POST",
                success: function(res) {
                    Swal.fire('Success', res.message, 'success').then(() => {
                        location.reload();
                    });
                }
            });
        });
    });
</script>
@endpush
