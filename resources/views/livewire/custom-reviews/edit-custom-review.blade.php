<div class="d-inline">
    
    <a class="btn btn-primary btn-sm rounded-circle" data-bs-toggle="modal" data-bs-target="#EditModalCustomReviews{{$review['id']}}" title="{{ __('Edit') }}" wire:click="CustomerReviewEditOpenModal">
        <i class="fa fa-edit"></i>
    </a>
    <div wire:ignore.self class="modal fade"  id="EditModalCustomReviews{{$review['id']}}"  role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                    <label class="control-label mb-2">اسم العميل</label>
                                    <input wire:model.defer="review.name" name="name" class="form-control-2 pe-4e rounded-3 @error('review.name') is-invalid @enderror" type="text">
                                    @error('review.name')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>   


                                <div class="form-group col-md-6 my-2">
                                    <label class="control-label mb-2"> طبيعة العمل</label>
                                    <input wire:model.defer="review.work" name="work" class="form-control-2 pe-4e rounded-3 @error('review.work') is-invalid @enderror" type="text">
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
                                    <select class="js-states form-select pe-4e rounded-3 @error('review.rating') is-invalid @enderror"  wire:model.defer="review.rating" name="rating" style="">
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
                                </div>
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
