@extends('admin.layouts.master')

@section('content')
<div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
        <div class="row align-items-center mb-4">
            <div class="col-md-6"><h3 class="fw-bold">Settings</h3></div>
            <div class="col-md-6 text-end">
                <a href="{{ route('settings.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Add Setting
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
                        <th data-priority="1">Label</th>
                        <th data-priority="6">Key</th>
                        <th data-priority="2">Type</th>
                        <th data-priority="3">Value / Preview</th>
                        <th data-priority="2">Status</th>
                        <th class="dt-no-sort" data-priority="1">Actions</th>
                    </tr>
                </thead>
                    <tbody>
                        @forelse($settings as $setting)
                            <tr class="{{ $setting->trashed() ? 'table-warning' : '' }}">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $setting->label }}</td>
                                <td><code>{{ $setting->key }}</code></td>
                                <td>
                                    @switch($setting->type)
                                        @case('image') <span class="badge bg-info text-dark">Image</span> @break
                                        @case('url') <span class="badge bg-primary">URL</span> @break
                                        @default <span class="badge bg-secondary">Text</span>
                                    @endswitch
                                </td>
                                <td>
                                    @if($setting->type === 'image')
                                        @if($setting->image)
                                            <img src="{{ $setting->image_url }}" alt="{{ $setting->image_alt ?: $setting->label }}" style="max-width:70px;max-height:40px;">
                                        @else
                                            <span class="text-muted">&mdash;</span>
                                        @endif
                                    @elseif($setting->type === 'url')
                                        <a href="{{ $setting->value }}" target="_blank">{{ Str::limit($setting->value, 40) }}</a>
                                    @else
                                        {{ Str::limit($setting->value, 60) }}
                                    @endif
                                </td>
                                <td>
                                    @if($setting->trashed())
                                        <span class="badge bg-warning text-dark">Trashed</span>
                                    @elseif($setting->is_active)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-secondary">Inactive</span>
                                    @endif
                                </td>
                                <td class="text-nowrap">
                                    @if($setting->trashed())
                                        <form action="{{ route('settings.restore', $setting->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('PATCH')
                                            <button class="btn btn-sm btn-outline-success" type="submit">Restore</button>
                                        </form>
                                        <button type="button" class="btn btn-sm btn-outline-danger js-delete-btn"
                                                data-name="{{ $setting->label }}"
                                                data-force-url="{{ route('settings.force_delete', $setting->id) }}"
                                                data-force-only="1">
                                            Delete Permanently
                                        </button>
                                    @else
                                        <a href="{{ route('settings.edit', $setting->id) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                                        <button type="button" class="btn btn-sm btn-outline-danger js-delete-btn"
                                                data-name="{{ $setting->label }}"
                                                data-soft-url="{{ route('settings.delete', $setting->id) }}"
                                                data-force-url="{{ route('settings.force_delete', $setting->id) }}"
                                                data-force-only="0">
                                            Delete
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="7" class="text-center text-muted py-4">No settings yet. Click "Add Setting" to create one.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- Shared delete-choice modal (identical pattern to Categories/Branches) --}}
<div class="modal fade" id="deleteChoiceModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete "<span id="deleteChoiceName"></span>"</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p id="deleteChoiceText" class="mb-0">How would you like to delete this setting?</p>
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
                    ? 'This setting is already in trash. This will permanently delete it — this cannot be undone.'
                    : 'Move it to trash (can be restored later) or delete it permanently right away.'
            );

            $('#deleteChoiceSoft').off('click').on('click', function() {
                $actionForm.attr('action', btn.data('soft-url')).trigger('submit');
            });
            $('#deleteChoiceForce').off('click').on('click', function() {
                if (!confirm('This permanently deletes the setting. This cannot be undone. Continue?')) {
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
