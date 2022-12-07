
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
                                <livewire:category.create-category :key="'categories-create-categories-'"></livewire:category.create-category>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive-sm">
              
                        @if($categories->count() > 0)
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                      
                                            <th class="text-center text-ddd border-secondary"> اسم القسم</th>
                                       
                                        <th class="text-center text-ddd border-secondary" width="200">{{ __('Control') }}</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($categories as $key => $category)
                                        <tr>
                                          
                                         <td class="text-center text-ddd border-secondary align-middle">{{ $category->name }}</td>
                                            
                                            <td class="text-center text-ddd border-secondary align-middle">
                                                <livewire:category.edit-category :cat_id="$category->id" :key="'category-edit-category-'.$category->id"></livewire:category.edit-category>
                                                <livewire:category.delete-category :cat_id="$category->id" :key="'category-delete-category'.$category->id"></livewire:category.delete-category>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    {{ $categories->links() }}
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
