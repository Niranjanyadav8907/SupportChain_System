@extends('layouts.master')

@section('title', 'Ticket Categories')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-0 text-slate-800">Ticket Categories</h1>
            <p class="text-muted mb-0">Configure ticket categories, SLA response periods, and active status.</p>
        </div>
        <button class="btn btn-primary rounded-pill px-4 shadow-sm" data-bs-toggle="modal" data-bs-target="#createCategoryModal">
            <i class="bi bi-tag-fill me-1"></i> Add Category
        </button>
    </div>

    <!-- Table -->
    <div class="card shadow-sm border-0">
        <div class="card-body p-4">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0" id="categoriesTable">
                    <thead class="table-light text-muted small text-uppercase">
                        <tr>
                            <th>Category Name</th>
                            <th>Description</th>
                            <th>SLA Period (Hours)</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $cat)
                            <tr id="cat-row-{{ $cat->id }}">
                                <td class="fw-bold">{{ $cat->name }}</td>
                                <td>{{ $cat->description ?? 'No description' }}</td>
                                <td>
                                    <span class="badge bg-secondary-subtle text-dark border-0 rounded px-2 py-1">
                                        <i class="bi bi-clock me-1"></i> {{ $cat->sla_hours }} Hours
                                    </span>
                                </td>
                                <td>
                                    @if($cat->status === 'active')
                                        <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3">Active</span>
                                    @else
                                        <span class="badge bg-danger-subtle text-danger border border-danger-subtle rounded-pill px-3">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-light border edit-cat-btn" data-id="{{ $cat->id }}" data-name="{{ $cat->name }}" data-sla="{{ $cat->sla_hours }}" data-description="{{ $cat->description }}" data-status="{{ $cat->status }}" data-bs-toggle="modal" data-bs-target="#editCategoryModal">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                    <button class="btn btn-sm btn-light border text-danger delete-cat-btn" data-id="{{ $cat->id }}">
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
<div class="modal fade" id="createCategoryModal" tabindex="-1" aria-labelledby="createCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 border-0 shadow">
            <div class="modal-header border-bottom-0 pb-0 pt-4 px-4">
                <h5 class="modal-title fw-bold" id="createCategoryModalLabel">Add Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="createCategoryForm">
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Category Name</label>
                        <input type="text" class="form-control" name="name" required placeholder="e.g. Server Issue">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">SLA Resolution Window (Hours)</label>
                        <input type="number" class="form-control" name="sla_hours" required min="1" placeholder="e.g. 24">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Description</label>
                        <textarea class="form-control" name="description" rows="3" placeholder="Category description..."></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Status</label>
                        <select class="form-select" name="status" required>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
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
<div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 border-0 shadow">
            <div class="modal-header border-bottom-0 pb-0 pt-4 px-4">
                <h5 class="modal-title fw-bold" id="editCategoryModalLabel">Edit Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editCategoryForm">
                <input type="hidden" id="edit_cat_id">
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Category Name</label>
                        <input type="text" class="form-control" name="name" id="edit_cat_name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">SLA Window (Hours)</label>
                        <input type="number" class="form-control" name="sla_hours" id="edit_cat_sla" required min="1">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Description</label>
                        <textarea class="form-control" name="description" id="edit_cat_desc" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Status</label>
                        <select class="form-select" name="status" id="edit_cat_status" required>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
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
        $('#categoriesTable').DataTable({
            pageLength: 10,
            ordering: true,
            responsive: true
        });

        // Create
        $('#createCategoryForm').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: "{{ route('ticket-categories.store') }}",
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

        // Edit Populate
        $('.edit-cat-btn').click(function() {
            $('#edit_cat_id').val($(this).data('id'));
            $('#edit_cat_name').val($(this).data('name'));
            $('#edit_cat_sla').val($(this).data('sla'));
            $('#edit_cat_desc').val($(this).data('description'));
            $('#edit_cat_status').val($(this).data('status'));
        });

        // Edit Submit
        $('#editCategoryForm').submit(function(e) {
            e.preventDefault();
            var id = $('#edit_cat_id').val();
            $.ajax({
                url: "/ticket-categories/" + id,
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
        $('.delete-cat-btn').click(function() {
            var id = $(this).data('id');
            Swal.fire({
                title: 'Are you sure?',
                text: "Deleting this category is irreversible.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                confirmButtonText: 'Yes, delete!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "/ticket-categories/" + id,
                        method: "DELETE",
                        success: function(res) {
                            Swal.fire('Deleted!', res.message, 'success').then(() => {
                                $('#cat-row-' + id).remove();
                            });
                        },
                        error: function(xhr) {
                            Swal.fire('Error', xhr.responseJSON.message || 'Failed to delete category.', 'error');
                        }
                    });
                }
            });
        });
    });
</script>
@endpush
