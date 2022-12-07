<div class="d-inline">
    @if(auth()->check() and auth()->user()->can('services edit packages'))
        <a class="btn btn-primary btn-sm rounded-circle mb-2" data-bs-toggle="modal" data-bs-target="#EditModalPackage{{$package['id']}}" title="{{ __('Edit') }}">
            <i class="fa fa-edit"></i>
        </a>

        <div wire:ignore.self class="modal fade " id="EditModalPackage{{$package['id']}}" tabindex="-1" role="dialog" aria-labelledby="EditModalPackage" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content text-center bg-sub">
                    <div class="modal-header text-center bg-sub border-secondary">
                        <h5 class="modal-title text-center" id="exampleModalLongTitle">{{ __('Packages') }}</h5>
                        <button type="button" class="close btn" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="text-ddd">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="mt-2" method="post" wire:submit.prevent="update">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="control-label my-2">{{ __('Name Ar') }}</label>
                                    <input wire:model.defer="package.name" name="package.name" class="form-control-2 pe-4e rounded-3 @error('package.name') is-invalid @enderror" type="text">
                                    @error('package.name')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label my-2">{{ __('Name En') }}</label>
                                    <input wire:model.defer="package.name_en" name="package.name_en" class="form-control-2 pe-4e rounded-3 @error('package.name_en') is-invalid @enderror" type="text">
                                    @error('package.name_en')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label my-2">{{ __('Price') }}</label>
                                    <input wire:model="package.price" maxlength="6" name="package.price" class="form-control-2 pe-4e rounded-3 @error('package.price') is-invalid @enderror" type="text">
                                    @error('package.price')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label my-2">{{ __('Tax') }}</label>
                                    <input disabled value="" wire:model.lazy="package.tax" name="package.tax" class="form-control-2 pe-4e rounded-3 @error('package.tax') is-invalid @enderror" type="text">
                                    @error('package.tax')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label my-2">{{ __('Discount') }}</label>
                                    <input wire:model="package.discount" maxlength="2" name="package.discount" class="form-control-2 pe-4e rounded-3 @error('package.discount') is-invalid @enderror" type="text">
                                    @error('package.discount')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label my-2">{{ __('The final price') }}</label>
                                    <input disabled wire:model.lazy="package.price_after" name="price_after" class="form-control-2 pe-4e rounded-3 @error('package.price_after') is-invalid @enderror" type="text">
                                    @error('package.price_after')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label my-2">{{ __('Type') }}</label>
                                    <select wire:model.defer="package.type_id" class="form-control-2 pe-4e rounded-3 @error('package.type_id') is-invalid @enderror">
                                        <option value="0">غير محدد</option>
                                        @foreach($types as $type)
                                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('package.type_id')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label my-2">{{ __('Days') }}</label>
                                    <input wire:model.defer="package.days" maxlength="2" name="package.days" class="form-control-2 pe-4e rounded-3 @error('package.days') is-invalid @enderror" type="text">
                                    @error('package.days')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">{{ __('Description Ar') }}</label>
                                    <textarea wire:model.defer="package.description" id="description" data-service_editor="@this" class="form-control-2 pe-4e rounded-3 @error('package.description') is-invalid @enderror"></textarea>
                                    @error('package.description')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">{{ __('Description En') }}</label>
                                    <textarea wire:model.defer="package.description_en" id="description" data-service_editor="@this" class="form-control-2 pe-4e rounded-3 @error('package.description_en') is-invalid @enderror"></textarea>
                                    @error('package.description_en')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="col-md-12 mt-4">
                                    <label class="control-label my-2">{{ __('Image') }}</label>
                                    <div class="form-group col-md-6 mx-auto">
                                        <div class="d-table p-1 m-auto uniform-uploader">
                                            <input type="file" wire:model.defer="package.path" class="form-input-styled form-control-2 pe-4e rounded-3 submit @error('package.path') is-invalid @enderror" data-bs-fouc="">
                                            @error('package.path')
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
                                <div class="mt-1">
                                    <button wire:loading.attr="disabled" class="btn btn-primary" type="submit">{{ __('Edit') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
