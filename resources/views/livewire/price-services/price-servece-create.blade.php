<div>
    @if(auth()->check() and auth()->user()->can('services create services'))
        <a style="font-size: 15px" type="button" class="btn btn-success btn-sm  mb-2" data-bs-toggle="modal" data-bs-target="#CreateModal"  wire:click="ProjectCreateOpenModal">
            <i class="fa fa-plus"></i>انشاء جديد
        </a>

        <div wire:ignore.self class="modal fade" id="CreateModal"  role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg bg-sub" role="document">
                <div class="modal-content text-center bg-sub">
                    <div class="modal-header text-center bg-sub border-secondary">
                        <h5 class="modal-title text-center" id="exampleModalLongTitle">انشاء جديد</h5>
                        <button type="button" class="close btn" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="text-ddd">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body bg-sub">
                        <form class="mt-2 text-end" method="post" wire:submit.prevent="store">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="form-group col-md-6 my-2">
                                    <label class="control-label mb-2">اسم الخدمة</label>
                                    <input wire:model.defer="priceservec.name" name="name" class="form-control-2 pe-4e rounded-3 @error('priceservec.name') is-invalid @enderror" type="text">
                                    @error('priceservec.name')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>   

                                <div class="form-group col-md-6 my-2">
                                    <label class="control-label mb-2"> الظهور</label>

                                    <select class="js-states form-select pe-4e rounded-3 @error('priceservec.price_id') is-invalid @enderror" name="activating" wire:model.defer="priceservec.activating" id="">
                                        <option> please select ... </option>
                                        <option value="1">فعال</option>
                                        <option value="0">غير فعال</option>
                                    </select>
                                    @error('priceservec.activating')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror

                                    
                                </div> 

                        

                                <div class="form-group col-md-9 my-2">
                                    <label for="" class="mb-2">تابع الي </label>
                                    <select class="js-states form-select pe-4e rounded-3 @error('priceservec.price_id') is-invalid @enderror multipleProjectCreate"  wire:model.defer="priceservec.price_id" name="price_id" style="backgroundColor:#222b45;">
                                 <option value=""></option>
                                    @foreach($prices as $price)
                                            <option value="{{ $price->id }}">{{ $price->name}}</option>
                                        @endforeach
                                    </select>
                                    <style>
                                        .select2-container--default .select2-selection--single{
                                                   height:   40px;
                                                   color: white;                                                   
                                        }
                                      
                                    </style>
                                    <script>
                                        $(document).ready(function(){
                                        window.addEventListener('updateSelect2', event => {
                                            $(".multipleProjectCreate").select2({     
                                                placeholder: "Select Service....",
                                                 allowClear: true,               
                                                backgroundColor:"#222b45"
                                            });
                                        })
                                        $('.multipleProjectCreate').on('change', function (e) {
                                            let data = $(this).val();
                                        @this.set('priceservec.price_id', data);
                                        });
                                    });
                                    </script>
                                  
                                    @error('priceservec.price_id')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                
                                

                                <div>
                                    <div wire:loading>
                                        <i class="fas fa-sync fa-spin"></i>
                                        {{ __('Loading please wait') }} ...
                                    </div>
                                </div>
                                <div class="mt-1 text-center">
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
