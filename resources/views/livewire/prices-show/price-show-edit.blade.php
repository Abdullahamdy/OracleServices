<div class="d-inline">
    <a class="btn btn-primary btn-sm rounded-circle" data-bs-toggle="modal" data-bs-target="#EditModalPrice{{$price['id']}}" title="{{ __('Edit') }}" wire:click="PriceEditOpenModal">
        <i class="fa fa-edit"></i>
    </a>
    <div wire:ignore.self class="modal fade"  id="EditModalPrice{{$price['id']}}"  role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                        <div class="form-group col-md-6 my-2">
                                    <label class="control-label mb-2">اسم المنتج</label>
                                    <input wire:model.defer="price.name" name="name" class="form-control-2 pe-4e rounded-3 @error('price.name') is-invalid @enderror" type="text">
                                    @error('price.name')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>   

                                <div class="form-group col-md-6 my-2">
                                    <label class="control-label mb-2">سعر المنتج</label>
                                    <input wire:model.defer="price.price" name="price" class="form-control-2 pe-4e rounded-3 @error('price.price') is-invalid @enderror" type="text">
                                    @error('price.price')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div> 

                                <div class="form-group col-md-6 my-2">
                                    <label class="control-label mb-2"> المده</label>
                                    <input wire:model.defer="price.Time" name="Time" class="form-control-2 pe-4e rounded-3 @error('price.time') is-invalid @enderror" type="text">
                                    @error('price.time')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div> 
                            
                                <div class="form-group col-md-9 my-2">
                                    <label for="" class="mb-2"> العمله</label>
                                    <select class="js-states form-select pe-4e rounded-3 @error('price.currency_id') is-invalid @enderror multipleProjectCreate"  wire:model.defer="price.currency_id" name="currency_id" style="backgroundColor:#222b45;">
                                          <option value=""></option>
                                    @foreach($allcurrency as $currency)
                                            <option value="{{ $currency->id }}">{{ $currency->name }}</option>
                                        @endforeach
                                    </select>
                                            <script>                 
                                                window.addEventListener('updateSelect2', event => {
                                                    $(".multipleProjectCreate").select2({   
                                                        placeholder: "Select Please....",
                                                            allowClear: true,    
                                                        backgroundColor:"#222b45",     
                                                        placeholder: 'Selecione uma opção',                                      
                                                    });
                                                })
                                                $('.multipleProjectCreate').on('change', function (e) {
                                                    let data = $(this).val();
                                                @this.set('price.currency_id', data);
                                                });                                    
                                            </script>
                                  
                                    @error('price.currency_id')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
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
