<div>
    @if(auth()->check() and auth()->user()->can('services edit types'))
        <a type="button" class="btn btn-success btn-sm rounded-3 mb-2" data-bs-toggle="modal" data-bs-target="#CreateTypeModal">
            <i class="fa fa-plus"></i> {{ __('Create Package Type ') }}
        </a>

        <div wire:ignore.self class="modal fade  text-ddd" id="CreateTypeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content text-center bg-sub">
                    <div class="modal-header text-center bg-sub border-secondary">
                        <h5 class="modal-title text-center" id="exampleModalLongTitle">{{ __('Create Package Type ') }}</h5>
                        <button type="button" class="close btn" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="text-ddd">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="mt-2" method="post" wire:submit.prevent="store">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group text-end">
                                        <label class="control-label  mb-2">{{ __('Name Ar') }}</label>
                                        <input wire:model.defer="type.name" name="name" class="form-control-2 pe-4e rounded-3 @error('type.name') is-invalid @enderror" type="text">
                                        @error('type.name')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group text-end">
                                        <label class="control-label  mb-2">{{ __('Name En') }}</label>
                                        <input wire:model.defer="type.name_en" name="name_en" class="form-control-2 pe-4e rounded-3 @error('type.name_en') is-invalid @enderror" type="text">
                                        @error('type.name_en')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div wire:loading>
                                    <i class="fas fa-sync fa-spin"></i>
                                    {{ __('Loading please wait') }} ...
                                </div>
                            </div>
                            <div class="mt-3">
                                <button wire:loading.attr="disabled" class="btn btn-primary" type="submit">{{ __('Save') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
