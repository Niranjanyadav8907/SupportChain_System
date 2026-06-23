@extends('layouts.master')

@section('title', 'Activity Logs')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="mb-4">
        <h1 class="h3 mb-0 text-slate-800">System Activity Logs</h1>
        <p class="text-muted mb-0">Monitor mutating actions, logins, updates, and configuration changes for security audit trails.</p>
    </div>

    <!-- Table -->
    <div class="card shadow-sm border-0">
        <div class="card-body p-4">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0" id="logsTable">
                    <thead class="table-light text-muted small text-uppercase">
                        <tr>
                            <th>User</th>
                            <th>Action</th>
                            <th>Description</th>
                            <th>IP Address</th>
                            <th>User Agent</th>
                            <th>Properties</th>
                            <th>Logged At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($logs as $log)
                            <tr>
                                <td class="fw-bold">
                                    {{ $log->user?->name ?? 'System' }}
                                    <small class="text-muted d-block">{{ $log->user?->email ?? '' }}</small>
                                </td>
                                <td>
                                    <span class="badge bg-primary-subtle text-primary border-0 px-2 py-1">
                                        {{ $log->action }}
                                    </span>
                                </td>
                                <td>{{ $log->description }}</td>
                                <td class="text-muted small">{{ $log->ip_address }}</td>
                                <td class="text-muted small text-truncate" style="max-width: 150px;" title="{{ $log->user_agent }}">
                                    {{ $log->user_agent }}
                                </td>
                                <td>
                                    @if($log->properties && count($log->properties) > 0)
                                        <button class="btn btn-sm btn-light border show-props-btn" data-props="{{ json_encode($log->properties, JSON_PRETTY_PRINT) }}" data-bs-toggle="modal" data-bs-target="#propertiesModal">
                                            <i class="bi bi-braces"></i> View Data
                                        </button>
                                    @else
                                        <span class="text-muted small">None</span>
                                    @endif
                                </td>
                                <td>{{ $log->created_at->format('Y-m-d H:i:s') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination Links -->
            <div class="mt-4">
                {{ $logs->links() }}
            </div>
        </div>
    </div>
</div>

<!-- Properties JSON Modal -->
<div class="modal fade" id="propertiesModal" tabindex="-1" aria-labelledby="propertiesModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 border-0 shadow">
            <div class="modal-header border-bottom-0 pb-0 pt-4 px-4">
                <h5 class="modal-title fw-bold" id="propertiesModalLabel">Logged Input Parameters</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <pre class="bg-light rounded p-3 text-slate-700 fs-7" id="jsonViewer" style="max-height: 400px; overflow-y: auto;"></pre>
            </div>
            <div class="modal-footer border-top-0 pt-0 pb-4 px-4 justify-content-end">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#logsTable').DataTable({
            paging: false, // Using Laravel pagination
            info: false,
            ordering: false, // Already sorted by latest
            responsive: true
        });

        // Show properties
        $('.show-props-btn').click(function() {
            var props = $(this).data('props');
            $('#jsonViewer').text(props);
        });
    });
</script>
@endpush
