@extends('admin.layouts.master')

@section('content')
<div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
        <div class="row align-items-center mb-4">
            <div class="col-md-6"><h3 class="fw-bold">Categories</h3></div>
            <div class="col-md-6 text-end">
                <a href="{{ route('categories.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Add Category
                </a>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <table class="table table-bordered align-middle" id="myDataTable">
                    <thead>
                    <tr>
                        <th data-priority="1">ID</th>
                        <th data-priority="6">Icon</th>
                        <th data-priority="1">Title</th>
                        <th data-priority="1">URL</th>
                        <th data-priority="7">Short Note</th>
                        <th data-priority="2">Listing Image</th>
                        <th data-priority="3">Status</th>
                        <th data-priority="5">Created</th>
                        <th class="dt-no-sort" data-priority="1">Actions</th>
                    </tr>
                </thead>
                    <tbody>
                        @forelse($categories as $category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @if($category->icon)
                                        <img src="{{ $category->icon_url }}" alt="{{ $category->title }} icon" style="max-width:32px;max-height:32px;">
                                    @else
                                        <span class="text-muted">&mdash;</span>
                                    @endif
                                </td>
                                <td>{{ $category->title }}</td>
                                <td><code>{{ $category->category_url }}</code></td>
                                <td>{{ Str::limit($category->short_note, 60) }}</td>
                                <td>
                                    @if($category->listing_image)
                                        <img src="{{ $category->listing_image_url }}" alt="{{ $category->listing_image_alt ?: $category->title }}" style="max-width:100px;">
                                    @endif
                                </td>
                              <td>
                                @if($category->trashed())
                                    <span class="badge bg-warning text-dark">Trashed</span>
                                @else
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="form-check form-switch mb-0">
                                            <input class="form-check-input toggle-status" type="checkbox" role="switch"
                                                style="width: 2.5em; height: 1.3em;"
                                                data-url="{{ route('categories.toggle_status', $category->id) }}"
                                                {{ $category->is_active ? 'checked' : '' }}>
                                        </div>
                                        <span class="status-label small fw-semibold {{ $category->is_active ? 'text-success' : 'text-secondary' }}">
                                            {{ $category->is_active ? 'Active' : 'Inactive' }}
                                        </span>
                                    </div>
                                @endif
                            </td>
                                <td>{{ $category->created_at->format('Y-m-d') }}</td>
                                <td class="text-nowrap">
                                @if($category->trashed())
                                    <form action="{{ route('categories.restore', $category->id) }}" method="POST" class="d-inline-block">
                                        @csrf
                                        @method('PATCH')
                                        <button class="btn btn-sm btn-outline-success" type="submit" title="Restore">
                                            <i class="bi bi-arrow-counterclockwise"></i>
                                        </button>
                                    </form>
                                @else
                                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-outline-primary" title="Edit">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-outline-danger js-delete-btn"
                                            data-name="{{ $category->title }}"
                                            data-url="{{ route('categories.delete', $category->id) }}"
                                            title="Delete">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                @endif
                            </td>
                            </tr>
                        @empty
                            <tr><td colspan="9" class="text-center text-muted py-4">No categories yet. Click "Add Category" to create one.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- Shared delete-choice modal --}}
<div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete "<span id="deleteConfirmName"></span>"</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="mb-0">Are you sure you want to delete this category? It will be moved to trash and can be restored later.</p>
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
        let $pendingToggle = null;

        // Delete confirm
        $(document).on('click', '.js-delete-btn', function() {
            $('#deleteConfirmName').text($(this).data('name'));
            $actionForm.attr('action', $(this).data('url'));
            modal.show();
        });

        $('#deleteConfirmYes').on('click', function() {
            $actionForm.trigger('submit');
        });

        // Active/Inactive toggle
       $(document).on('change', '.toggle-status', function() {
        const $chk = $(this);
        const $label = $chk.closest('.d-flex').find('.status-label');
        const categoryName = $chk.closest('tr').find('td').eq(2).text().trim();

        $.ajax({
            url: $chk.data('url'),
            type: 'PATCH',
            data: { _token: '{{ csrf_token() }}' },
            success: function(res) {
                if (res.is_active) {
                    $label.text('Active').removeClass('text-secondary').addClass('text-success');
                    showAppToast('success', `"${categoryName}" marked as Active.`);
                } else {
                    $label.text('Inactive').removeClass('text-success').addClass('text-secondary');
                    showAppToast('info', `"${categoryName}" marked as Inactive.`);
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
