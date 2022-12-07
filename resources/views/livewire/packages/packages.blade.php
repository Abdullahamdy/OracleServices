<div class="row justify-content-center">
    <div class="col-md-12 mb-2">
        <div class="p-1">
            <div class="py-2">
                <h4 class="text-ddd"><img src="{{ asset('assets/images/package.png') }}" width="40px" height="40px" alt="" class="mx-1">{{ __('Packages') }}</h4>
            </div>
            @if($service->packages->count())
            <div class="row">
                @foreach($service->packages as $package)
                    <div class="col-md-4 my-4">
                        <div class="position-relative h-100 border border-secondary shadow-sub rounded-30 bg-sub p-3 text-center img-single">
                            @if($image = $package->attachments()->orderBy('id',"DESC")->first())
                                <img src="{{ url('storage/public/'.$image->path) }}" height="200px" class="w-100 bg-white rounded-3 shadow-sm border " alt="">
                            @endif
                            <h4 class="pt-2">{{ $package->name_lang }}</h4>
                            <p class="mb-2">{{ $package->description_lang }}</p>
                            <p class="mb-2">{{ $package->type ? $package->type->name_lang : __('Undefined') }}</p>
                            <p class="badge bg-danger position-absolute top-0 end-0 m-3">الخصم : {{ $package->discount }}%</p>
                            <div class="d-flex justify-content-center mb-3">
                                <div class="mx-1 text-center">
                                    <span class="badge bg-primary">
                                        {{ __('Tax') }} : {{ $package->tax }}
                                    </span>
                                </div>
                                <div class="mx-1 text-center">
                                    <span class="badge bg-success">
                                        {{ __('Price') }} : {{($package->price) >0 ?$package->price  : __('Free') }}{{($package->price) >0 ? ' '.__("SAR"):''}}
                                    </span>
                                </div>
                            </div>
                            <div class="position-relative mb-4">
                                <h6 class="mb-0 p-2 bg-main-1 rounded-3 shadow-sub">{{ __('The final price') }}
                                    : {{($package->price_after) >0 ?$package->price_after  : __('Free') }}{{($package->price_after) >0 ? ' '.__("SAR"):''}}
                                </h6>
                            </div>
                            <livewire:packages.packages-edit :package_id="$package->id" :key="'package-edit-packages-'.$package->id"></livewire:packages.packages-edit>
                            <livewire:packages.packages-delete :package_id="$package->id" :key="'package-delete-packages-'.$package->id"></livewire:packages.packages-delete>

                            <livewire:carts.carts-create :package_id="$package->id" :key="'carts-create-package_id'.$package->id"></livewire:carts.carts-create>
                        </div>
                    </div>
                @endforeach
            </div>
            @else
                <div class="alert alert-danger">{{ __('Empty list') }}</div>
            @endif
        </div>
    </div>
</div>
