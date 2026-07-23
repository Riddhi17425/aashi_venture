@extends('admin.layouts.master')

@section('content')
<div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
        <div class="row align-items-center mb-4">
            <div class="col-md-6"><h3 class="fw-bold">Contact Branches</h3></div>
            <div class="col-md-6 text-end">
                <a href="{{ route('branches.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Add Branch
                </a>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <table class="table table-bordered align-middle" id="myDataTable">
                    <thead>
                    <tr>
                        <th data-priority="1">ID</th>
                        <th data-priority="1">Label</th>
                        <th data-priority="4">Address</th>
                        <th data-priority="3">Phone</th>
                        <th data-priority="3">Email</th>
                        <th data-priority="2">Status</th>
                        <th data-priority="6">Order</th>
                        <th class="dt-no-sort" data-priority="1">Actions</th>
                    </tr>
                </thead>
                    <tbody>
                        @forelse($branches as $branch)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $branch->label }}</td>
                                <td>{{ Str::limit($branch->address, 60) }}</td>
                                <td>{{ $branch->phone }}</td>
                                <td>{{ $branch->email }}</td>
                                <td>
                                    @if($branch->trashed())
                                        <span class="badge bg-warning text-dark">Trashed</span>
                                    @else
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="form-check form-switch mb-0">
                                                <input class="form-check-input toggle-status" type="checkbox" role="switch"
                                                       style="width: 2.5em; height: 1.3em;"
                                                       data-url="{{ route('branches.toggle_status', $branch->id) }}"
                                                       {{ $branch->is_active ? 'checked' : '' }}>
                                            </div>
                                            <span class="status-label small fw-semibold {{ $branch->is_active ? 'text-success' : 'text-secondary' }}">
                                                {{ $branch->is_active ? 'Active' : 'Inactive' }}
                                            </span>
                                        </div>
                                    @endif
                                </td>
                                <td>{{ $branch->sort_order }}</td>
                                <td class="text-nowrap">
                                    @if($branch->trashed())
                                        <form action="{{ route('branches.restore', $branch->id) }}" method="POST" class="d-inline-block">
                                            @csrf
                                            @method('PATCH')
                                            <button class="btn btn-sm btn-outline-success" type="submit" title="Restore">
                                                <i class="bi bi-arrow-counterclockwise"></i>
                                            </button>
                                        </form>
                                    @else
                                        <a href="{{ route('branches.edit', $branch->id) }}" class="btn btn-sm btn-outline-primary" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <button type="button" class="btn btn-sm btn-outline-danger js-delete-btn"
                                                data-name="{{ $branch->label }}"
                                                data-url="{{ route('branches.delete', $branch->id) }}"
                                                title="Delete">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="8" class="text-center text-muted py-4">No branches yet. Click "Add Branch" to create one.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete "<span id="deleteConfirmName"></span>"</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="mb-0">Are you sure you want to delete this branch? It will be moved to trash and can be restored later.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <button type="button" class="btn btn-danger" id="deleteConfirmYes">Yes, Delete</button>
            </div>
        </div>
    </div>
</div>

<form id="deleteActionForm" method="POST" style="display:none;">
    @csrf
    @method('DELETE')
</form>

@push('scripts')
<script>
    $(function() {
        const modalEl = document.getElementById('deleteConfirmModal');
        const modal = new bootstrap.Modal(modalEl);
        const $actionForm = $('#deleteActionForm');

        $(document).on('click', '.js-delete-btn', function() {
            $('#deleteConfirmName').text($(this).data('name'));
            $actionForm.attr('action', $(this).data('url'));
            modal.show();
        });

        $('#deleteConfirmYes').on('click', function() {
            $actionForm.trigger('submit');
        });

        $(document).on('change', '.toggle-status', function() {
            const $chk = $(this);
            const $label = $chk.closest('.d-flex').find('.status-label');
            const branchName = $chk.closest('tr').find('td').eq(1).text().trim();

            $.ajax({
                url: $chk.data('url'),
                type: 'PATCH',
                data: { _token: '{{ csrf_token() }}' },
                success: function(res) {
                    if (res.is_active) {
                        $label.text('Active').removeClass('text-secondary').addClass('text-success');
                        showAppToast('success', `"${branchName}" marked as Active.`);
                    } else {
                        $label.text('Inactive').removeClass('text-success').addClass('text-secondary');
                        showAppToast('info', `"${branchName}" marked as Inactive.`);
                    }
                },
                error: function() {
                    $chk.prop('checked', !$chk.prop('checked'));
                    showAppToast('error', 'Failed to update status. Please try again.');
                }
            });
        });
    });
</script>
@endpush
@endsection
