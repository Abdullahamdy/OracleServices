<div class="d-inline">
    @if(auth()->check() and auth()->user()->can('services edit types'))
        <a class="btn btn-primary btn-sm rounded-circle" data-bs-toggle="modal" data-bs-target="#EditTypeModal{{$type['id']}}" title="{{ __('Edit') }}">
            <i class="fa fa-edit"></i>
        </a>

        <div wire:ignore.self class="modal fade text-ddd " id="EditTypeModal{{$type['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content text-center bg-sub">
                    <div class="modal-header text-center bg-sub border-secondary">
                        <h5 class="modal-title text-center" id="exampleModalLongTitle">{{ __('Types') }}</h5>
                        <button type="button" class="close btn" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="text-ddd">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="mt-2" method="post" wire:submit.prevent="update">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">{{ __('Name Ar') }}</label>
                                        <input wire:model.defer="type.name" name="name" class="form-control-2 pe-4e rounded-3 @error('type.name') is-invalid @enderror" type="text">
                                        @error('type.name')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">{{ __('Name En') }}</label>
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
                            <div class="mt-3 text-center">
                                <button wire:loading.attr="disabled" class="btn btn-primary" type="submit">{{ __('Edit') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
