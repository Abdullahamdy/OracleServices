<div class="d-inline">
    <a class="btn btn-primary btn-sm rounded-circle" data-bs-toggle="modal" data-bs-target="#EditModalOperation{{$operationservece['id']}}" title="{{ __('Edit') }}" wire:click="OperationEditOpenModal">
        <i class="fa fa-edit"></i>
    </a>
    <div wire:ignore.self class="modal fade"  id="EditModalOperation{{$operationservece['id']}}"  role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                    <input wire:model.defer="operationservece.name" name="name" class="form-control-2 pe-4e rounded-3 @error('operationservece.name') is-invalid @enderror" type="text">
                                    @error('operationservece.name')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">نص المعامله</label>
                                    <input wire:model.defer="operationservece.text" name="text" class="form-control-2 pe-4e rounded-3 @error('operationservece.text') is-invalid @enderror" type="text">
                                    @error('operationservece.text')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12 mt-4" >
                                    <div class="form-group col-md-6 mx-auto">
                                        <div class="d-table p-1 m-auto uniform-uploader">
                                            <input type="file" wire:model.defer="operationservece.path" class="form-input-styled form-control-2 pe-4e rounded-3 submit @error('operationservece.path') is-invalid @enderror" data-bs-fouc="">
                                            @error('operationservece.path')
                                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
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
