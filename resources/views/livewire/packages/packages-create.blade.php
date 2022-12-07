<div>
    @if(auth()->check() and auth()->user()->can('services create packages'))
        <a type="button" class="btn btn-success btn-sm rounded-pill font-12 rounded-3" data-bs-toggle="modal" data-bs-target="#CreatePackage{{$service->id}}">
            <i class="fa fa-plus"></i> {{ __('Create Package') }}
        </a>

        <div wire:ignore.self class="modal fade" id="CreatePackage{{$service->id}}" tabindex="-1" role="dialog" aria-labelledby="CreatePackage" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content text-center bg-sub">
                    <div class="modal-header text-center bg-sub border-secondary">
                        <h5 class="modal-title text-center" id="exampleModalLongTitle">{{ __('Create Package') }}</h5>
                        <button type="button" class="close btn" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="text-ddd">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="mt-2 text-end" method="post" wire:submit.prevent="store">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="control-label my-2">{{ __('Name Ar') }}</label>
                                    <input wire:model.defer="name" name="name" class="form-control-2 pe-4e rounded-3 @error('name') is-invalid @enderror" type="text">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label my-2">{{ __('Name En') }}</label>
                                    <input wire:model.defer="name_en" name="name_en" class="form-control-2 pe-4e rounded-3 @error('name_en') is-invalid @enderror" type="text">
                                    @error('name_en')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label my-2">{{ __('Price') }}</label>
                                    <input wire:model="price" maxlength="6" name="price" class="form-control-2 pe-4e rounded-3 @error('price') is-invalid @enderror" type="text">
                                    @error('price')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label my-2">{{ __('Tax') }}</label>
                                    <input disabled value="" wire:model.lazy="tax" name="tax" class="form-control-2 pe-4e rounded-3 @error('tax') is-invalid @enderror" type="text">
                                    @error('tax')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label my-2">{{ __('Discount') }}</label>
                                    <input wire:model="discount" maxlength="2" name="discount" class="form-control-2 pe-4e rounded-3 @error('discount') is-invalid @enderror" type="text">
                                    @error('discount')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label my-2">{{ __('The final price') }}</label>
                                    <input disabled value="" wire:model.lazy="price_after" name="price_after" class="form-control-2 pe-4e rounded-3 @error('price_after') is-invalid @enderror" type="text">
                                    @error('price_after')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label my-2">{{ __('Type') }}</label>
                                    <select wire:model.defer="type_id" class="form-control-2 pe-4e rounded-3 @error('type_id') is-invalid @enderror">
                                        <option value="0">غير محدد</option>
                                        @foreach( $types as $type)
                                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('type_id')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label my-2">{{ __('Days') }}</label>
                                    <input wire:model.defer="days" maxlength="2" name="days" class="form-control-2 pe-4e rounded-3 @error('days') is-invalid @enderror" type="text">
                                    @error('days')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">{{ __('Description Ar') }}</label>
                                    <textarea wire:model.defer="description" id="description" data-service_editor="@this" class="form-control-2 pe-4e rounded-3 @error('description') is-invalid @enderror"></textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">{{ __('Description En') }}</label>
                                    <textarea wire:model.defer="description_en" id="description_en" data-service_editor="@this" class="form-control-2 pe-4e rounded-3 @error('description_en') is-invalid @enderror"></textarea>
                                    @error('description_en')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="col-md-12 mt-4">
                                    <div class="form-group col-md-6 mx-auto">
                                        <div class="d-table p-1 m-auto uniform-uploader">
                                            <input type="file" wire:model.defer="path" class="form-input-styled form-control-2 pe-4e rounded-3 submit @error('path') is-invalid @enderror" data-bs-fouc="">
                                            @error('path')
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
                                <div class="mt-2 text-center">
                                    <button wire:loading.attr="disabled" class="btn btn-primary" type="submit">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
