@extends('layouts.master')

@section('title', 'Roles & Permissions')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-0 text-slate-800">Roles & Access Control</h1>
            <p class="text-muted mb-0">Define organizational access levels and configure granular page permissions.</p>
        </div>
        <button class="btn btn-primary rounded-pill px-4 shadow-sm" data-bs-toggle="modal" data-bs-target="#createRoleModal">
            <i class="bi bi-shield-plus me-1"></i> Add Custom Role
        </button>
    </div>

    <!-- Table -->
    <div class="card shadow-sm border-0">
        <div class="card-body p-4">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0" id="rolesTable">
                    <thead class="table-light text-muted small text-uppercase">
                        <tr>
                            <th>Role Title</th>
                            <th>Description</th>
                            <th>Active Permissions</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $role)
                            <tr id="role-row-{{ $role->id }}">
                                <td class="fw-bold">{{ $role->name }}</td>
                                <td>{{ $role->description ?? 'No description' }}</td>
                                <td>
                                    <div class="d-flex flex-wrap gap-1" style="max-width: 500px;">
                                        @forelse($role->permissions as $perm)
                                            <span class="badge bg-secondary-subtle text-dark border-0 rounded px-2 py-1 fs-8">
                                                {{ str_replace('_', ' ', $perm->name) }}
                                            </span>
                                        @empty
                                            <span class="text-muted small">No permissions active</span>
                                        @endforelse
                                    </div>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-light border edit-role-btn" data-role="{{ json_encode($role) }}" data-permissions="{{ json_encode($role->permissions->pluck('id')) }}" data-bs-toggle="modal" data-bs-target="#editRoleModal">
                                        <i class="bi bi-shield-lock"></i> Edit
                                    </button>
                                    
                                    @if(!in_array($role->name, ['Admin', 'Team Lead', 'Project Manager', 'HR', 'Employee']))
                                        <button class="btn btn-sm btn-light border text-danger delete-role-btn" data-id="{{ $role->id }}">
                                            <i class="bi bi-trash"></i>
                                        </button>
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

<!-- Create Modal -->
<div class="modal fade" id="createRoleModal" tabindex="-1" aria-labelledby="createRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content rounded-4 border-0 shadow">
            <div class="modal-header border-bottom-0 pb-0 pt-4 px-4">
                <h5 class="modal-title fw-bold" id="createRoleModalLabel">Create Custom Role</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="createRoleForm">
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Role Name</label>
                        <input type="text" class="form-control" name="name" required placeholder="e.g. IT Auditor">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Description</label>
                        <input type="text" class="form-control" name="description" placeholder="Short description of role duties...">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Grant Permissions</label>
                        <div class="row g-2">
                            @foreach($permissions as $perm)
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $perm->id }}" id="perm_{{ $perm->id }}">
                                        <label class="form-check-label fs-7" for="perm_{{ $perm->id }}">{{ str_replace('_', ' ', $perm->name) }}</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top-0 pt-0 pb-4 px-4 justify-content-end">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary px-4">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editRoleModal" tabindex="-1" aria-labelledby="editRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content rounded-4 border-0 shadow">
            <div class="modal-header border-bottom-0 pb-0 pt-4 px-4">
                <h5 class="modal-title fw-bold" id="editRoleModalLabel">Edit Role & Permissions</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editRoleForm">
                <input type="hidden" id="edit_role_id">
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Role Name</label>
                        <input type="text" class="form-control" name="name" id="edit_role_name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Description</label>
                        <input type="text" class="form-control" name="description" id="edit_role_desc">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Active Permissions</label>
                        <div class="row g-2">
                            @foreach($permissions as $perm)
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-check">
                                        <input class="form-check-input edit-perm-checkbox" type="checkbox" name="permissions[]" value="{{ $perm->id }}" id="edit_perm_{{ $perm->id }}">
                                        <label class="form-check-label fs-7" for="edit_perm_{{ $perm->id }}">{{ str_replace('_', ' ', $perm->name) }}</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top-0 pt-0 pb-4 px-4 justify-content-end">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary px-4">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#rolesTable').DataTable({
            pageLength: 10,
            ordering: true,
            responsive: true
        });

        // Create Submit
        $('#createRoleForm').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: "{{ route('roles.store') }}",
                method: "POST",
                data: $(this).serialize(),
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

        // Edit Populate
        $('.edit-role-btn').click(function() {
            var role = $(this).data('role');
            var perms = $(this).data('permissions');
            
            $('#edit_role_id').val(role.id);
            $('#edit_role_name').val(role.name);
            $('#edit_role_desc').val(role.description);

            $('.edit-perm-checkbox').prop('checked', false);
            perms.forEach(id => {
                $('#edit_perm_' + id).prop('checked', true);
            });
        });

        // Edit Submit
        $('#editRoleForm').submit(function(e) {
            e.preventDefault();
            var id = $('#edit_role_id').val();
            $.ajax({
                url: "/roles/" + id,
                method: "PUT",
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

        // Delete
        $('.delete-role-btn').click(function() {
            var id = $(this).data('id');
            Swal.fire({
                title: 'Are you sure?',
                text: "Deleting this role will remove it from all assigned users.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                confirmButtonText: 'Yes, delete!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "/roles/" + id,
                        method: "DELETE",
                        success: function(res) {
                            Swal.fire('Deleted!', res.message, 'success').then(() => {
                                $('#role-row-' + id).remove();
                            });
                        },
                        error: function(xhr) {
                            Swal.fire('Error', xhr.responseJSON.message || 'Failed to delete role.', 'error');
                        }
                    });
                }
            });
        });
    });
</script>
@endpush
