<div class="d-inline">
    <a class="btn btn-sm btn-danger rounded-circle me-3" data-bs-toggle="modal" data-bs-target="#deleteModal{{$cart['id']}}" title="{{ __('Delete') }}">
        <i class="fa fa-trash"></i>
    </a>

    <div wire:ignore.self class="modal fade" id="deleteModal{{$cart['id']}}" tabindex="-1" role="dialog" aria-labelledby="deleteModal{{$cart['id']}}Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content  bg-sub">
                <div class="modal-header  bg-sub border-secondary">
                    <h5 class="modal-title" id="deleteModal{{$cart['id']}}Label">{{ __('Delete Confirm') }}</h5>
                    <button type="button" class="close btn" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-ddd">×</span>
                    </button>
                </div>
                <div class="modal-body text-end">
                    <p class="mb-0">{{ __('Are you sure want to delete?') }}</p>
                </div>
                <div class="modal-footer border-top-0 mt-0">
                    <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">{{ __('Close') }}</button>
                    <button type="button" wire:click.prevent="delete()" class="btn btn-danger close-modal" data-bs-dismiss="modal">{{ __('Yes, Delete') }}</button>
                </div>
            </div>
        </div>
    </div>
</div>
