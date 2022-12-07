<div class="px-2 py-2 mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8 mb-4">
            <div class="bg-main-1 shadow-sm rounded-10 position-relative mb-3">
                <div class="position-relative d-inline-block rounded-10 w-40">
                    <div class="position-absolute rounded-10-right w-100 h-100 overlay-2"></div>
                    @if($image = $service->attachments()->orderBy('id',"DESC")->first())
                        <img src="{{ url('storage/public/'.$image->path) }}" data-holder-rendered="true" class="cover d-inline-block rounded-10-right w-100" alt="" height="220px">
                    @endif
                    @if($service->status == 0)
                        <div class="position-absolute bottom-0 end-0 shadow m-2 bg-danger text-ddd rounded-top-bottom-30 z-1200 px-3 py-1">
                            <h6 class="mb-0">
                                {{ \App\Models\Service::statusList($service->status) }}
                            </h6>
                        </div>
                    @elseif($service->status == 1)
                        <div class="position-absolute bottom-0 end-0 shadow m-2 bg-success text-ddd rounded-top-bottom-30 z-1200 px-3 py-1">
                            <h6 class="mb-0">
                                {{ \App\Models\Service::statusList($service->status) }}
                            </h6>
                        </div>
                    @endif
                    <div class="position-absolute top-0 end-0 bg-success text-ddd rounded-top-right z-1200 px-3 py-1">
                        <h6 class="mb-0">
                            @if(is_array(json_decode($service->role_id)))
                                {{ \Spatie\Permission\Models\Role::whereIn('id', json_decode($service->role_id))->pluck('name')->implode(', ') }}
                            @endif
                        </h6>
                    </div>
                </div>
                <div class="w-60 d-inline-block align-top px-3 pb-4 pt-5e position-relative">
                    <h5 class="text-ddd">{{ $service->name_lang }}</h5>
                    <h6 class="text-ddd">{{ $service->short_description_lang }}</h6>
                    <div class="position-absolute top-0 end-0 m-1">
                        <div class="text-end text-ddd">
                            <img src="{{ asset('assets/images/planner.png') }}" width="15px" height="15px"  alt=""><h6 class="mb-0 mx-1 font-12 align-middle d-inline-block">{{ $service->begin }}</h6>
                            <img src="{{ asset('assets/images/planner.png') }}" width="15px" height="15px"  alt=""><h6 class="mb-0 mx-1 font-12 align-middle d-inline-block">{{ $service->end }}</h6>
                        </div>
                    </div>
                </div>
                <div class="position-absolute start-0 bottom-0 m-2">
                    <div class="position-relative rounded-pill d-inline-block  bg-sub px-3 py-1 border border-secondary">
                        <h6 class="mb-0">{{ __('Number of packages') }} :  <span class="text-ddd">{{ $service->packages ? $service->packages->count() : 0 }}</span></h6>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <livewire:packages.packages :service_id="$service->id" :key="'packages-services-show-'. $service->id"></livewire:packages.packages>
</div>



