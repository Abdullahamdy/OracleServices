<div>
    <div class="content">
    <form method="get" class="input-group m-2">
                        <div class="d-block d-md-flex text-center justify-content-center mx-auto" style="width: 90%">
                            
                            <div class="mb-2 px-1 w-20 position-relative">
                                <input name="search" type="text" class="form-control-2 py-1 rounded-3 border-trans pe-4e" placeholder="{{ __('Search by name') }}" value="{{ $search }}">
                            </div>
                            <div class="mb-2 px-1 w-20 position-relative">
                                <button wire:loading.attr="disabled" class="btn bg-primary py-1 shadow text-ddd rounded-3 px-4" type="submit">
                                    <i wire:loading class="fas fa-sync fa-spin"></i> {{ __('Search') }}
                                </button>
                            </div>
                        </div>
                    </form>
        <div class="row">
            <div class="col-md-12 mt-2">
                <div class="p-2">
                    <div class="row my-2">
                        <div class="col-6">
                            <div class="text-end">
                                <livewire:custom-reviews.create-custom-review :key="'custom-reviews-create-'"></livewire:custom-reviews.create-custom-review>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive-sm">
              
                        @if($reviews->count() > 0)
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                      
                                    <th class="text-center text-ddd border-secondary">  الصوره</th>
                                            <th class="text-center text-ddd border-secondary"> اسم العميل</th>
                                            <th class="text-center text-ddd border-secondary"> العمل</th>
                                            <th class="text-center text-ddd border-secondary"> التقييم</th>
                                            <th class="text-center text-ddd border-secondary"> الوصف</th>

                                       
                                        <th class="text-center text-ddd border-secondary" width="200">{{ __('Control') }}</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($reviews as $key => $review)
                                        <tr>
                                        <td class="text-center border-secondary text-ddd align-middle">
                                    @if($image = $review->attachments()->orderBy('id',"DESC")->first())
                                        <img src="{{ url('storage/'.$image->path) }}" data-holder-rendered="true" class="d-inline-block contain" alt="" height="50px" width="60px">
                                    @endif
                                </td>
                                          
                                         <td class="text-center text-ddd border-secondary align-middle">{{ $review->name }}</td>
                                         <td class="text-center text-ddd border-secondary align-middle">{{ $review->work }}</td>
                                         <td class="text-center text-ddd border-secondary align-middle">{{ $review->rating }}</td>
                                         <td class="text-center text-ddd border-secondary align-middle">{{ $review->text }}</td>
                                            
                                            <td class="text-center text-ddd border-secondary align-middle">
                                                <livewire:custom-reviews.edit-custom-review :review_id="$review->id" :key="'reviews-edit-operation-'.$review->id"></livewire:custom-reviews.edit-custom-review>
                                                <livewire:custom-reviews.delete-custom-review :review_id="$review->id" :key="'reviews-delete-operation'.$review->id"></livewire:custom-reviews.delete-custom-review>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    {{ $reviews->links() }}
                                </div>
                            </div>
                        @else
                            <div class="alert alert-danger">{{ __('Empty list') }}</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
