@extends('layouts.master')

@section('title', 'Departments')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-0 text-slate-800">Departments</h1>
            <p class="text-muted mb-0">Define organization business units and assign respective leadership heads.</p>
        </div>
        <button class="btn btn-primary rounded-pill px-4 shadow-sm" data-bs-toggle="modal" data-bs-target="#createDeptModal">
            <i class="bi bi-plus-circle-fill me-1"></i> Add Department
        </button>
    </div>

    <!-- Table -->
    <div class="card shadow-sm border-0">
        <div class="card-body p-4">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0" id="departmentsTable">
                    <thead class="table-light text-muted small text-uppercase">
                        <tr>
                            <th>Department Name</th>
                            <th>Description</th>
                            <th>Department Head</th>
                            <th>Total Employees</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($departments as $dept)
                            <tr id="dept-row-{{ $dept->id }}">
                                <td class="fw-bold">{{ $dept->name }}</td>
                                <td>{{ $dept->description ?? 'No description provided' }}</td>
                                <td>
                                    @php
                                        $headEntry = $dept->assignedUsers()->wherePivot('is_head', true)->first();
                                    @endphp
                                    @if($headEntry)
                                        <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3 py-1">
                                            <i class="bi bi-person-badge-fill me-1"></i> {{ $headEntry->name }}
                                        </span>
                                    @else
                                        <span class="text-muted small">No Head Assigned</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge bg-secondary-subtle text-dark border-0 rounded px-2 py-1">
                                        {{ $dept->users->count() }} Employees
                                    </span>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-light border assign-head-btn" data-id="{{ $dept->id }}" data-name="{{ $dept->name }}" data-bs-toggle="modal" data-bs-target="#assignHeadModal">
                                        <i class="bi bi-person-gear"></i> Assign Head
                                    </button>
                                    <button class="btn btn-sm btn-light border edit-dept-btn" data-id="{{ $dept->id }}" data-name="{{ $dept->name }}" data-description="{{ $dept->description }}" data-bs-toggle="modal" data-bs-target="#editDeptModal">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                    <button class="btn btn-sm btn-light border text-danger delete-dept-btn" data-id="{{ $dept->id }}">
                                        <i class="bi bi-trash"></i>
                                    </button>
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
<div class="modal fade" id="createDeptModal" tabindex="-1" aria-labelledby="createDeptModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 border-0 shadow">
            <div class="modal-header border-bottom-0 pb-0 pt-4 px-4">
                <h5 class="modal-title fw-bold" id="createDeptModalLabel">Add Department</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="createDeptForm">
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Department Name</label>
                        <input type="text" class="form-control" name="name" required placeholder="e.g. Server Operations">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Description</label>
                        <textarea class="form-control" name="description" rows="3" placeholder="Define role responsibilities..."></textarea>
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
<div class="modal fade" id="editDeptModal" tabindex="-1" aria-labelledby="editDeptModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 border-0 shadow">
            <div class="modal-header border-bottom-0 pb-0 pt-4 px-4">
                <h5 class="modal-title fw-bold" id="editDeptModalLabel">Edit Department</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editDeptForm">
                <input type="hidden" id="edit_dept_id">
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Department Name</label>
                        <input type="text" class="form-control" name="name" id="edit_dept_name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Description</label>
                        <textarea class="form-control" name="description" id="edit_dept_desc" rows="3"></textarea>
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

<!-- Assign Head Modal -->
<div class="modal fade" id="assignHeadModal" tabindex="-1" aria-labelledby="assignHeadModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 border-0 shadow">
            <div class="modal-header border-bottom-0 pb-0 pt-4 px-4">
                <h5 class="modal-title fw-bold" id="assignHeadModalLabel">Assign Department Head</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="assignHeadForm">
                <input type="hidden" id="assign_dept_id">
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Department</label>
                        <input type="text" class="form-control bg-light" id="assign_dept_name" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Select Head</label>
                        <select class="form-select" name="user_id" required>
                            <option value="" disabled selected>Choose Manager/Supervisor</option>
                            @foreach($potentialHeads as $head)
                                <option value="{{ $head->id }}">{{ $head->name }} ({{ $head->roles->first()?->name }})</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Custom Title (Optional)</label>
                        <input type="text" class="form-control" name="role_in_department" placeholder="e.g. General Manager Operations">
                    </div>
                </div>
                <div class="modal-footer border-top-0 pt-0 pb-4 px-4 justify-content-end">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary px-4">Assign Head</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#departmentsTable').DataTable({
            pageLength: 10,
            ordering: true,
            responsive: true
        });

        // Create
        $('#createDeptForm').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: "{{ route('departments.store') }}",
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
        $('.edit-dept-btn').click(function() {
            $('#edit_dept_id').val($(this).data('id'));
            $('#edit_dept_name').val($(this).data('name'));
            $('#edit_dept_desc').val($(this).data('description'));
        });

        // Edit Submit
        $('#editDeptForm').submit(function(e) {
            e.preventDefault();
            var id = $('#edit_dept_id').val();
            $.ajax({
                url: "/departments/" + id,
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

        // Assign Head Populate
        $('.assign-head-btn').click(function() {
            $('#assign_dept_id').val($(this).data('id'));
            $('#assign_dept_name').val($(this).data('name'));
        });

        // Assign Head Submit
        $('#assignHeadForm').submit(function(e) {
            e.preventDefault();
            var id = $('#assign_dept_id').val();
            $.ajax({
                url: "/departments/" + id + "/assign-head",
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

        // Delete
        $('.delete-dept-btn').click(function() {
            var id = $(this).data('id');
            Swal.fire({
                title: 'Are you sure?',
                text: "Deleting this department is irreversible.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                confirmButtonText: 'Yes, delete!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "/departments/" + id,
                        method: "DELETE",
                        success: function(res) {
                            Swal.fire('Deleted!', res.message, 'success').then(() => {
                                $('#dept-row-' + id).remove();
                            });
                        },
                        error: function(xhr) {
                            Swal.fire('Error', xhr.responseJSON.message || 'Failed to delete department.', 'error');
                        }
                    });
                }
            });
        });
    });
</script>
@endpush
