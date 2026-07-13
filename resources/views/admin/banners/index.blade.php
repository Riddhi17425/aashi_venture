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

        @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
        @if(session('error'))<div class="alert alert-danger">{{ session('error') }}</div>@endif

        <div class="card">
            <div class="card-body">
                <table class="table table-bordered align-middle" id="myDataTable">
                    <thead>
                    <tr>
                        <th data-priority="1">#</th>
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
                            <tr class="{{ $banner->trashed() ? 'table-warning' : '' }}">
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
                                    @elseif($banner->is_active)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-secondary">Inactive</span>
                                    @endif
                                </td>
                                <td>{{ $banner->created_at->format('Y-m-d') }}</td>
                                <td class="text-nowrap">
                                    @if($banner->trashed())
                                        <form action="{{ route('banners.restore', $banner->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('PATCH')
                                            <button class="btn btn-sm btn-outline-success" type="submit">Restore</button>
                                        </form>
                                        <button type="button" class="btn btn-sm btn-outline-danger js-delete-btn"
                                                data-name="{{ $banner->title }}"
                                                data-force-url="{{ route('banners.force_delete', $banner->id) }}"
                                                data-force-only="1">
                                            Delete Permanently
                                        </button>
                                    @else
                                        <a href="{{ route('banners.edit', $banner->id) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                                        <button type="button" class="btn btn-sm btn-outline-danger js-delete-btn"
                                                data-name="{{ $banner->title }}"
                                                data-soft-url="{{ route('banners.delete', $banner->id) }}"
                                                data-force-url="{{ route('banners.force_delete', $banner->id) }}"
                                                data-force-only="0">
                                            Delete
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

{{-- Shared delete-choice modal --}}
<div class="modal fade" id="deleteChoiceModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete "<span id="deleteChoiceName"></span>"</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p id="deleteChoiceText" class="mb-0">How would you like to delete this banner?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-outline-warning" id="deleteChoiceSoft">Move to Trash</button>
                <button type="button" class="btn btn-danger" id="deleteChoiceForce">Delete Permanently</button>
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
        const modalEl = document.getElementById('deleteChoiceModal');
        const modal = new bootstrap.Modal(modalEl);
        const $actionForm = $('#deleteActionForm');

        $(document).on('click', '.js-delete-btn', function() {
            const btn = $(this);
            const forceOnly = btn.data('force-only') == '1';

            $('#deleteChoiceName').text(btn.data('name'));
            $('#deleteChoiceSoft').toggle(!forceOnly);
            $('#deleteChoiceText').text(
                forceOnly
                    ? 'This banner is already in trash. This will permanently delete it and its files — this cannot be undone.'
                    : 'Move it to trash (can be restored later) or delete it permanently right away.'
            );

            $('#deleteChoiceSoft').off('click').on('click', function() {
                $actionForm.attr('action', btn.data('soft-url')).trigger('submit');
            });
            $('#deleteChoiceForce').off('click').on('click', function() {
                if (!confirm('This permanently deletes the banner and its files. This cannot be undone. Continue?')) {
                    return;
                }
                $actionForm.attr('action', btn.data('force-url')).trigger('submit');
            });

            modal.show();
        });
    });
</script>
@endpush
@endsection
