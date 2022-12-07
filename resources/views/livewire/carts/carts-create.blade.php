<div class="d-inline">
    @if(auth()->check() and !in_array($package['id'],auth()->user()->carts()->pluck('package_id')->toArray()))
        <a class="btn btn-sm btn-success mb-2" data-bs-toggle="modal" data-bs-target="#addModal{{$package['id']}}" title="{{ __('Add To Cart') }}">
            <i class="fas fa-shopping-cart"></i> {{ __('Add To Cart') }}
        </a>
    @else
        <a class="btn btn-sm btn-success mb-2" data-bs-toggle="modal" data-bs-target="#addModal{{$package['id']}}" title="{{ __('Add To Cart again') }}">
            <i class="fas fa-shopping-cart"></i> {{ __('Add To Cart again') }}
        </a>
    @endif

    <div wire:ignore.self class="modal fade" id="addModal{{$package['id']}}" tabindex="-1" role="dialog" aria-labelledby="addModal{{$package['id']}}Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content bg-sub">
                <div class="modal-header bg-sub border-secondary">
                    <h5 class="modal-title" id="addModal{{$package['id']}}Label">{{ __('Cart Confirm') }}</h5>
                    <button type="button" class="close btn" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-ddd">×</span>
                    </button>
                </div>
                <div class="modal-body text-end">
                    @if(auth()->check() and !in_array($package['id'],auth()->user()->carts()->pluck('package_id')->toArray()))
                        <p class="mb-0">{{ __('Are you sure want to add cart?') }}</p>
                    @else
                        <p class="mb-0">{{ __('Are you sure you want to make a re-order for the package?') }}</p>
                    @endif
                </div>
                <div class="modal-footer border-top-0 mt-0">
                    <button type="button" class="btn btn-danger close-btn" data-bs-dismiss="modal">{{ __('Close') }}</button>
                    <button type="button" wire:click.prevent="store" class="btn btn-primary close-modal" data-bs-dismiss="modal">
                        @if(auth()->check() and !in_array($package['id'],auth()->user()->carts()->pluck('package_id')->toArray()))
                            {{ __('Yes, Add') }}
                        @else
                            {{ __('Yes, Re-application') }}
                        @endif
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
