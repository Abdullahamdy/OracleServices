<div>
    <div class="content-header">
        <div class="row pb-4 mt-4">
            <div class="col-md-12">
                <form method="get" class="input-group m-2">
                    <div class="d-block d-md-flex text-center justify-content-center mx-auto" style="width: 90%">
                        <div class="mb-2 px-1 w-25 position-relative">
                            <input name="search" type="text" class="form-control-2 py-1 rounded-3 border-trans pe-4e" placeholder="{{ __('Search by name') }}" value="{{ $search }}">
                        </div>
                        <div class="mb-2 px-1 d-inline-block position-relative text-end">
                            <button wire:loading.attr="disabled" class="btn bg-primary py-1 shadow text-ddd rounded-3 px-4" type="submit">
                                <i wire:loading class="fas fa-sync fa-spin"></i> {{ __('Search') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @if($services->count())
        <div class="row mt-2">
            @foreach($services as  $key => $service)
                <div class="col-md-6 mb-4">
                    <div class="bg-main-1 shadow-sm rounded-10 position-relative mb-3">
                        <div class="position-relative d-inline-block rounded-10 w-40">
                            <a href="{{ route('services.show', ['token' => $service->token]) }}">
                                <div class="position-absolute rounded-10-right w-100 h-100 overlay-2"></div>
                            </a>
                            @if($image = $service->attachments()->orderBy('id',"DESC")->first())
                                <img src="{{ url('storage/public/'.$image->path) }}" data-holder-rendered="true" class="cover d-inline-block rounded-10-right w-100" alt="" height="190px">
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
                            <a href="{{ route('services.show', ['token' => $service->token]) }}"><h5 class="text-ddd">{{ $service->name_lang }}</h5></a>
                            <a href="{{ route('services.show', ['token' => $service->token]) }}"><h6 class="text-ddd">{{ $service->short_description_lang }}</h6></a>
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
            @endforeach
        </div>
        <div class="row mt-4">
            <div class="col-md-12">
                {{ $services->links() }}
            </div>
        </div>
    @else
        <div class="alert alert-danger mx-2">{{ __('Empty list') }}</div>
    @endif
</div>

