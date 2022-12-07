
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
                                <livewire:prices-show.price-show-create :key="'prices-create-prices-'"></livewire:prices-show.price-show-create>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive-sm">
              
                        @if($prices->count() > 0)
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                      
                                            <th class="text-center text-ddd border-secondary"> الأسم </th>
                                            <th class="text-center text-ddd border-secondary"> السعر </th>
                                            <th class="text-center text-ddd border-secondary"> المده الزمنية </th>
                                            <th class="text-center text-ddd border-secondary"> العمله </th>
                                       
                                        <th class="text-center text-ddd border-secondary" width="200">{{ __('Control') }}</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($prices as $key => $price)
                                        <tr>
                                          
                                         <td class="text-center text-ddd border-secondary align-middle">{{ $price->name }}</td>
                                         <td class="text-center text-ddd border-secondary align-middle">{{ $price->price }}</td>
                                         <td class="text-center text-ddd border-secondary align-middle">{{ $price->Time }}</td>
                                         <td class="text-center text-ddd border-secondary align-middle">{{ $price->currency->name }}<span style="color:red">({{$price->currency->symbol }})</span></td>
                                            <td class="text-center text-ddd border-secondary align-middle">
                                                <livewire:prices-show.price-show-edit :price_id="$price->id" :key="'price-edit-price-'.$price->id"></livewire:prices-show.price-show-edit>
                                                <livewire:prices-show.price-show-delete :price_id="$price->id" :key="'price-delete-price'.$price->id"></livewire:prices-show.price-show-delete>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    {{ $prices->links() }}
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
