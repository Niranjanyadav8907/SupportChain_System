@extends('layouts.master')

@section('title', 'Organization Hierarchy')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-0 text-slate-800">Organization Hierarchy</h1>
            <p class="text-muted mb-0">Manage employee reporting manager mappings and view the organization tree.</p>
        </div>
    </div>

    <div class="row">
        <!-- Hierarchy Tree Graphic -->
        <div class="col-lg-7 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-transparent border-0 pt-4 px-4">
                    <h5 class="fw-bold mb-0 text-slate-800"><i class="bi bi-diagram-3-fill text-primary me-2"></i>Hierarchy Tree Map</h5>
                    <p class="text-muted small mb-0">Visual structure of reporting relationships</p>
                </div>
                <div class="card-body p-4">
                    <!-- Tree view rendering helper -->
                    <div class="hierarchy-tree-container">
                        @if($rootNodes->isEmpty())
                            <p class="text-muted text-center py-4">No hierarchy records defined yet.</p>
                        @else
                            <ul class="list-group list-group-flush ps-0">
                                @foreach($rootNodes as $root)
                                    @include('modules.hierarchy.tree_node', ['node' => $root])
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Manager Mapping Table -->
        <div class="col-lg-5 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-transparent border-0 pt-4 px-4">
                    <h5 class="fw-bold mb-0 text-slate-800"><i class="bi bi-person-gear text-primary me-2"></i>Manager Mapping</h5>
                    <p class="text-muted small mb-0">Modify employee supervisor mapping quickly</p>
                </div>
                <div class="card-body p-4">
                    <form id="mappingForm">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Select Employee</label>
                            <select class="form-select" name="user_id" id="map_user_id" required>
                                <option value="" disabled selected>Choose Employee...</option>
                                @foreach($users as $u)
                                    <option value="{{ $u->id }}">{{ $u->name }} ({{ $u->roles->first()?->name ?? 'Staff' }})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Reporting Manager / Supervisor</label>
                            <select class="form-select" name="reporting_to" id="map_reporting_to" required>
                                <option value="">No Reporting Manager (Self)</option>
                                @foreach($managers as $m)
                                    <option value="{{ $m->id }}">{{ $m->name }} ({{ $m->roles->first()?->name ?? 'Supervisor' }})</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold rounded-3 mt-3">
                            <i class="bi bi-check2-circle me-1"></i> Update Mapping
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#mappingForm').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: "{{ route('hierarchy.update') }}",
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
    });
</script>
@endpush
