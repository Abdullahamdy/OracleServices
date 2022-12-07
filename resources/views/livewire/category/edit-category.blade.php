<div class="d-inline">
    <a class="btn btn-primary btn-sm rounded-circle" data-bs-toggle="modal" data-bs-target="#EditModalcategory{{$category['id']}}" title="{{ __('Edit') }}" wire:click="CategoryEditOpenModal">
        <i class="fa fa-edit"></i>
    </a>
    <div wire:ignore.self class="modal fade"  id="EditModalcategory{{$category['id']}}"  role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                    <input wire:model.defer="category.name" name="name" class="form-control-2 pe-4e rounded-3 @error('category.name') is-invalid @enderror" type="text">
                                    @error('category.name')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group col-md-9 my-2">
                                    <label for="" class="mb-2">تابع ألي</label>
                                    <select class="js-states form-select pe-4e rounded-3 @error('category.parent_id') is-invalid @enderror multipleProjectCreate"  wire:model.defer="category.parent_id" name="category.parent_id" style="backgroundColor:#222b45;">
                                          <option value=""></option>
                                    @foreach($allcategory as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
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
                                                @this.set('category.parent_id', data);
                                                });                                    
                                            </script>
                                  
                                    @error('category.parent_id')
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
