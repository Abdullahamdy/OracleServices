<div class="d-inline">
    @if(auth()->check() and auth()->user()->can('services delete services'))
        <a class="btn btn-sm btn-danger rounded-circle" data-bs-toggle="modal" data-bs-target="#deleteModalCustomerReview{{$review['id']}}" title="{{ __('Delete') }}">
            <i class="fa fa-trash"></i>
        </a>

        <div wire:ignore.self class="modal fade" id="deleteModalCustomerReview{{$review['id']}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalCustomerReview{{$review['id']}}Label" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content bg-sub">
                    <div class="modal-header bg-sub border-secondary">
                        <h5 class="modal-title" id="deleteModal{{$review['id']}}Label">{{ __('Delete Confirm') }}</h5>
                        <button type="button" class="close btn" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="text-ddd">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="mb-0">{{ __('Are you sure want to delete?') }}</p>
                    </div>
                    <div class="modal-footer border-top-0 mt-0">
                        <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">{{ __('Close') }}</button>
                        <button type="button" wire:click.prevent="delete()" class="btn btn-danger close-modal" data-bs-dismiss="modal">{{ __('Yes, Delete') }}</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
