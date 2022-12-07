<div class="d-inline">
    <button type="button" class="btn btn-sm btn-primary ml-auto mr-auto mb-2" data-bs-toggle="modal" data-bs-target="#ModalProfileEdit-{{auth()->id()}}-">
        <i class="fa fa-edit"></i> {{ __('Edit profile') }}
    </button>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade text-ddd" id="ModalProfileEdit-{{auth()->id()}}-" tabindex="-1" role="dialog" aria-labelledby="ModalProfileEdit-{{auth()->id()}}-Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content bg-sub">
                <div class="modal-header bg-sub border-secondary">
                    <h5 class="modal-title">{{ __('Edit profile') }}</h5>
                    <button type="button" class="close btn ms-0" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-ddd">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="update" class="modal-body">
                    <div class="form-group mb-3">
                        <label>{{ __('Name') }}</label>
                        <input wire:model.defer="user.name" class="form-control-2 pe-4e rounded-3 mt-2 @error('user.name') is-invalid @enderror" placeholder="{{ __('Name') }}">
                        @error('user.name')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label>{{ __('Email') }}</label>
                        <input wire:model.defer="user.email" class="form-control-2 pe-4e rounded-3 mt-2 @error('user.email') is-invalid @enderror" placeholder="{{ __('Email') }}">
                        @error('user.email')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label>{{ __('Phone') }}</label>
                        <input wire:model.defer="user.mobile" class="form-control-2 pe-4e rounded-3 mt-2 @error('user.mobile') is-invalid @enderror" placeholder="{{ __('Phone') }}">
                        @error('user.mobile')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label>{{ __('Country') }}</label>
                        <input wire:model.defer="user.country" class="form-control-2 pe-4e rounded-3 mt-2 @error('user.country') is-invalid @enderror" placeholder="{{ __('Country') }}">
                        @error('user.country')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label>{{ __('Birth date') }}</label>
                        <input wire:model.defer="user.birth_date" type="date" class="form-control-2 pe-4e rounded-3 mt-2 @error('user.birth_date') is-invalid @enderror" placeholder="{{ __('Birth date') }}">
                        @error('user.birth_date')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label>{{ __('Password') }}</label>
                        <input wire:model.defer="user.password" type="password" class="form-control-2 pe-4e rounded-3 mt-2 @error('user.password') is-invalid @enderror" placeholder="{{ __('Password') }}">
                        @error('user.password')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label>{{ __('Password confirmation') }}</label>
                        <input wire:model.defer="user.password_confirmation" type="password" class="form-control-2 pe-4e rounded-3 mt-2 @error('user.password_confirmation') is-invalid @enderror" placeholder="{{ __('Password confirmation') }}">
                        @error('user.password_confirmation')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="form-group mb-3 text-center">
                        <button type="submit" wire:loading.attr="disabled" class="btn btn-primary">{{ __('Save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

