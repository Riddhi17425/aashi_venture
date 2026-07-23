@extends('admin.layouts.master')

@section('content')
<div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
        <div class="row align-items-center mb-4">
            <div class="col-md-6"><h3 class="fw-bold">Banners</h3></div>
            <div class="col-md-6 text-end">
                <a href="{{ route('banners.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Add Banner
                </a>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <table class="table table-bordered align-middle" id="myDataTable">
                    <thead>
                    <tr>
                        <th data-priority="1">ID</th>
                        <th data-priority="2">Desktop Image</th>
                        <th data-priority="1">Title</th>
                        <th data-priority="1">Category</th>
                        <th data-priority="6">Order</th>
                        <th data-priority="3">Status</th>
                        <th data-priority="5">Created</th>
                        <th class="dt-no-sort" data-priority="1">Actions</th>
                    </tr>
                </thead>
                    <tbody>
                        @forelse($banners as $banner)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @if($banner->desktop_image)
                                        <img src="{{ $banner->desktop_image_url }}" alt="{{ $banner->desktop_image_alt ?: $banner->title }}" style="width:60px;height:60px;object-fit:cover;border-radius:4px;">
                                    @else
                                        <span class="text-muted">&mdash;</span>
                                    @endif
                                </td>
                                <td>{{ $banner->title }}</td>
                                <td>
                                    @if($banner->category)
                                        {{ $banner->category->title }}
                                    @else
                                        <span class="text-muted">&mdash;</span>
                                    @endif
                                </td>
                                <td>{{ $banner->sort_order }}</td>
                                <td>
                                    @if($banner->trashed())
                                        <span class="badge bg-warning text-dark">Trashed</span>
                                    @else
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="form-check form-switch mb-0">
                                                <input class="form-check-input toggle-status" type="checkbox" role="switch"
                                                       style="width: 2.5em; height: 1.3em;"
                                                       data-url="{{ route('banners.toggle_status', $banner->id) }}"
                                                       {{ $banner->is_active ? 'checked' : '' }}>
                                            </div>
                                            <span class="status-label small fw-semibold {{ $banner->is_active ? 'text-success' : 'text-secondary' }}">
                                                {{ $banner->is_active ? 'Active' : 'Inactive' }}
                                            </span>
                                        </div>
                                    @endif
                                </td>
                                <td>{{ $banner->created_at->format('Y-m-d') }}</td>
                                <td class="text-nowrap">
                                    @if($banner->trashed())
                                        <form action="{{ route('banners.restore', $banner->id) }}" method="POST" class="d-inline-block">
                                            @csrf
                                            @method('PATCH')
                                            <button class="btn btn-sm btn-outline-success" type="submit" title="Restore">
                                                <i class="bi bi-arrow-counterclockwise"></i>
                                            </button>
                                        </form>
                                    @else
                                        <a href="{{ route('banners.edit', $banner->id) }}" class="btn btn-sm btn-outline-primary" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <button type="button" class="btn btn-sm btn-outline-danger js-delete-btn"
                                                data-name="{{ $banner->title }}"
                                                data-url="{{ route('banners.delete', $banner->id) }}"
                                                title="Delete">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="8" class="text-center text-muted py-4">No banners yet. Click "Add Banner" to create one.</td></tr>
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
                <p class="mb-0">Are you sure you want to delete this banner? It will be moved to trash and can be restored later.</p>
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
            const bannerName = $chk.closest('tr').find('td').eq(2).text().trim();

            $.ajax({
                url: $chk.data('url'),
                type: 'PATCH',
                data: { _token: '{{ csrf_token() }}' },
                success: function(res) {
                    if (res.is_active) {
                        $label.text('Active').removeClass('text-secondary').addClass('text-success');
                        showAppToast('success', `"${bannerName}" marked as Active.`);
                    } else {
                        $label.text('Inactive').removeClass('text-success').addClass('text-secondary');
                        showAppToast('info', `"${bannerName}" marked as Inactive.`);
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
