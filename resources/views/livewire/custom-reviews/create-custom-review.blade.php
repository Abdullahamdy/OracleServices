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
                                    <label class="control-label mb-2">اسم العميل</label>
                                    <input wire:model.defer="review.name" name="name" class="form-control-2 pe-4e rounded-3 @error('review.name') is-invalid @enderror" type="text">
                                    @error('review.name')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>   

                                <div class="form-group col-md-6 my-2">
                                    <label class="control-label mb-2">طبيعة العمل</label>
                                    <input wire:model.defer="review.work" name="review" class="form-control-2 pe-4e rounded-3 @error('review.work') is-invalid @enderror" type="text">
                                    @error('review.work')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div> 

                                <div class="form-group col-md-6 my-2">
                                    <label class="control-label mb-2"> الوصف</label>
                                    <input wire:model.defer="review.text" name="text" class="form-control-2 pe-4e rounded-3 @error('review.text') is-invalid @enderror" type="text">
                                    @error('review.text')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div> 

                                <div class="form-group col-md-9 my-2">
                                    <label for="" class="mb-2">التقييم </label>
                                    <select class="js-states form-select pe-4e rounded-3 @error('review.rating') is-invalid @enderror multipleProjectCreate"  wire:model.defer="review.rating" name="rating" style="backgroundColor:#222b45;">
                                              <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                       
                                    </select>
                                    <!-- <style>
                                        .select2-container--default .select2-selection--single{
                                                   height:   40px;
                                                   color: white;                                                   
                                        }
                                      
                                    </style> -->
                                    @error('review.rating')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                    <div class="col-md-12 mt-4">
                                    <div class="form-group col-md-6 mx-auto">
                                        <div class="d-table p-1 m-auto uniform-uploader">
                                            <input type="file" wire:model.defer="review.path" class="form-input-styled form-control-2 pe-4e rounded-3 submit @error('review.path') is-invalid @enderror" data-bs-fouc="">
                                            @error('review.path')
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
