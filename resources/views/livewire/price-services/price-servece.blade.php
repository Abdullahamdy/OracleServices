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
                                <livewire:price-services.price-servece-create :key="'pricesservice-create-pricesservice-'"></livewire:price-services.price-servece-create>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive-sm">
              
                        @if($priceservices->count() > 0)
                            <table class="table table-striped">
                                <thead>
                                    <tr>                   
                                            <th class="text-center text-ddd border-secondary"> الأسم </th>
                                            <th class="text-center text-ddd border-secondary"> تابع الي </th>
                                            <th class="text-center text-ddd border-secondary"> الظهور </th>
                                       
                                        <th class="text-center text-ddd border-secondary" width="200">{{ __('Control') }}</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($priceservices as $key => $priceseve)
                            <tr>
                                          
                                         <td class="text-center text-ddd border-secondary align-middle">{{ $priceseve->name }}</td>
                                         <td class="text-center text-ddd border-secondary align-middle">{{ $priceseve->price->name }}</td>
                                         <td class="text-center text-ddd border-secondary align-middle">
                                                <h6>
                                                    <span class="badge @if($priceseve->activating == '1') bg-success @else bg-danger @endif">
                                                        {{ \App\Models\Service::statusList($priceseve->activating) }}
                                                    </span>
                                                </h6>
                                          </td>
                                            <td class="text-center text-ddd border-secondary align-middle">
                                                <livewire:price-services.price-servece-edit :priceservice_id="$priceseve->id" :key="'priceservece-edit-priceservece-'.$priceseve->id"></livewire:price-services.price-servece-edit>
                                                <livewire:price-services.price-servece-delete :priceservice_id="$priceseve->id" :key="'priceservece-delete-priceservece'.$priceseve->id"></livewire:price-services.price-servece-delete>
                                                    <div class="form-check form-switch d-inline-block align-middle">
                                                        <input class="form-check-input bg-main-1 border-danger" type="checkbox" wire:click.prevent="in_active({{$priceseve->id}})" @if($priceseve->activating == 1) checked @endif id="flexSwitchCheckDefault">
                                                    </div>
                                            </td>
                            </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    {{ $priceservices->links() }}
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
