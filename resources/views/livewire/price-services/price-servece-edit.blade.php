<div class="d-inline">
    <a class="btn btn-primary btn-sm rounded-circle" data-bs-toggle="modal" data-bs-target="#EditModalPriceServicess{{$priceservec['id']}}" title="{{ __('Edit') }}" wire:click="PriceServiceEditOpenModal">
        <i class="fa fa-edit"></i>
    </a>
    <div wire:ignore.self class="modal fade"  id="EditModalPriceServicess{{$priceservec['id']}}"  role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                    <label class="control-label mb-2">اسم الخدمه</label>
                                    <input wire:model.defer="priceservec.name" name="name" class="form-control-2 pe-4e rounded-3 @error('priceservec.name') is-invalid @enderror" type="text">
                                    @error('priceservec.name')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>   
                                <div class="form-group col-md-6 my-2">
                                    <label class="control-label mb-2"> الظهور</label>

                                    <select class="js-states form-select pe-4e rounded-3 @error('priceservec.price_id') is-invalid @enderror" name="activating" wire:model.defer="priceservec.activating" id="">
                                        <option></option>
                                        <option value="1">فعال</option>
                                        <option value="0">غير فعال</option>
                                    </select>
                                    @error('priceservec.activating')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div> 
                                <div class="form-group col-md-9 my-2">
                                    <label for="" class="mb-2"> تابع الي</label>
                                    <select class="js-states form-select pe-4e rounded-3 @error('priceservec.price_id') is-invalid @enderror multipleProjectCreate"  wire:model.defer="priceservec.price_id" name="price_id" style="backgroundColor:#222b45;">
                                          <option value=""></option>
                                    @foreach($prices as $price)
                                            <option value="{{ $price->id }}">{{ $price->name }}</option>
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
                                                @this.set('priceservec.price_id', data);
                                                });                                    
                                            </script>
                                  
                                    @error('priceservec.price_id')
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
