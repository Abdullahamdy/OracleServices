<div class="d-inline">
    <a class="btn btn-primary btn-sm rounded-circle" data-bs-toggle="modal" data-bs-target="#EditModalStatus{{$status['id']}}" title="{{ __('Edit') }}">
        <i class="fa fa-edit"></i>
    </a>

    <div wire:ignore.self class="modal fade text-ddd" id="EditModalStatus{{$status['id']}}" tabindex="-1" role="dialog" aria-labelledby="EditModalStatus" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content text-center bg-sub">
                <div class="modal-header text-center bg-sub border-secondary">
                    <h5 class="modal-title text-center" id="exampleModalLongTitle">{{ __('Packages Statuses') }}</h5>
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
                                    <input wire:model.defer="status.name" name="name" class="form-control-2 pe-4e rounded-3 @error('status.name') is-invalid @enderror" type="text">
                                    @error('status.name')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">{{ __('Name En') }}</label>
                                    <input wire:model.defer="status.name_en" name="name_en" class="form-control-2 pe-4e rounded-3 @error('status.name_en') is-invalid @enderror" type="text">
                                    @error('status.name_en')
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
                        <div class="mt-4">
                            <button wire:loading.attr="disabled" class="btn btn-primary" type="submit">{{ __('Edit') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
