<div class="d-inline">
    <!-- Button trigger modal -->
    @if(auth()->check() and auth()->user()->hasRole('Admin'))
        <button type="button" class="btn btn-sm btn-danger rounded-circle" data-bs-toggle="modal" data-bs-target=".modalFormDeleteTelescopeEmail{{$telescope_emails->id}}">
            <i class="fa fa-trash"></i>
        </button>

        <!-- Modal -->
        <div wire:ignore.self class="modal fade modalFormDeleteTelescopeEmail{{$telescope_emails->id}}" id="" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content bg-sub border-secondary">
                    <div class="modal-header bg-sub border-secondary">
                        <h5 class="modal-title" id="modalFormDeleteTelescopeEmail">{{ __('Telescope emails') }}</h5>
                        <button type="button" class="close btn ms-0" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="text-ddd">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-ddd">

                        <p>{{ __('Are you sure want to delete?') }}</p>
                        <div class="mt-4">
                            <button type="button" data-bs-dismiss="modal" aria-label="Close" class="btn btn-primary">{{ __('Close') }}</button>
                            <button type="button" wire:click.prevent="delete" class="btn btn-danger">{{ __('Yes, Delete') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

