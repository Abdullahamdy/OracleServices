<div>
    <div class="content-header">
        <div class="row pb-4 mt-4">
            <div class="col-md-12 text-start">
                    <form method="get" class="input-group m-2">
                        <div class="d-block d-md-flex text-center justify-content-center mx-auto" style="width: 90%">
                            <div class="mb-2 px-1 w-20 position-relative">
                                    <div class="col text-start">
                                        <input name="from" type="date" class="form-control-2 py-1 rounded-3 border-trans  pe-4e" value="{{ $from }}">
                                    </div>
                                </div>
                            <div class="mb-2 px-1 w-20 position-relative">
                                    <div class="col text-start">
                                        <input name="to" type="date" class="form-control-2 py-1 rounded-3 border-trans  pe-4e" value="{{ $to }}">
                                    </div>
                                </div>
                            <div class="mb-2 px-1 w-20 position-relative">
                                    <select name="role_id" id="input" class="form-select d-inline-block py-1 rounded-3 border-trans  pe-4e" aria-label="Default select example">
                                        <option value="">{{ __('All Roles') }}</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}" {{request('role_id') == $role->id ? 'selected' : ''}}>{{ $role->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            <div class="mb-2 px-1 w-20 position-relative">
                                    <select name="status" wire:model.defer="status" class="form-select py-1 rounded-3 border-trans  pe-4e" aria-label="Default select example">
                                        <option value="">{{ __('All Statuses') }}</option>
                                        @foreach(\App\Models\Service::statusList(false) as $key => $status)
                                            <option value="{{ $key }}" {{ request('status') == $key ? 'selected' : '' }}>{{ $status }}</option>
                                        @endforeach
                                    </select>
                                </div>
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
                </div>
        </div>
        <div>
            <livewire:services.services-create :key="'services-create-services-admin-'"></livewire:services.services-create>
        </div>
    </div>
    @if($services->count())
        <div class="row mt-2">
            <div class="table-responsive-sm">
                <table class="table table-striped">
                    <thead>
                    @if(app()->getLocale() == 'ar' )
                        <tr>
                            <th class="text-center border-secondary text-ddd">#</th>
                            <th class="text-center border-secondary text-ddd">{{ __('Image') }}</th>
                            <th class="text-center border-secondary text-ddd">{{ __('Name Ar') }}</th>
                            <th class="text-center border-secondary text-ddd">{{ __('Short description Ar') }}</th>
                            <th class="text-center border-secondary text-ddd">{{ __('Full description Ar') }}</th>
                            <th class="text-center border-secondary text-ddd">{{ __('Begin') }}</th>
                            <th class="text-center border-secondary text-ddd">{{ __('End') }}</th>
                            <th class="text-center border-secondary text-ddd">{{ __('Role') }}</th>
                            <th class="text-center border-secondary text-ddd">{{ __('Status') }}</th>
                            <th class="text-center border-secondary text-ddd">{{ __('Created at') }}</th>
                            <th class="text-center border-secondary text-ddd">{{ __('Number of packages') }}</th>
                            <th class="text-center border-secondary text-ddd">{{ __('Control') }}</th>
                        </tr>
                    @else
                        <tr>
                            <th class="text-center border-secondary text-ddd">#</th>
                            <th class="text-center border-secondary text-ddd">{{ __('Image') }}</th>
                            <th class="text-center border-secondary text-ddd">{{ __('Name') }}</th>
                            <th class="text-center border-secondary text-ddd">{{ __('Short description') }}</th>
                            <th class="text-center border-secondary text-ddd">{{ __('Full description') }}</th>
                            <th class="text-center border-secondary text-ddd">{{ __('Begin') }}</th>
                            <th class="text-center border-secondary text-ddd">{{ __('End') }}</th>
                            <th class="text-center border-secondary text-ddd">{{ __('Role') }}</th>
                            <th class="text-center border-secondary text-ddd">{{ __('Status') }}</th>
                            <th class="text-center border-secondary text-ddd">{{ __('Created at') }}</th>
                            <th class="text-center border-secondary text-ddd">{{ __('Number of packages') }}</th>
                            <th class="text-center border-secondary text-ddd">{{ __('Control') }}</th>
                        </tr>
                    @endif
                    </thead>
                    <tbody>
                        @foreach($services as $key => $service)
                            @if(app()->getLocale() == 'ar' )
                                <tr>
                                <td class="text-center border-secondary text-ddd align-middle">{{ $key + $services->firstItem() }}</td>
                                <td class="text-center border-secondary text-ddd align-middle">
                                    @if($image = $service->attachments()->orderBy('id',"DESC")->first())
                                        <img src="{{ url('storage/'.$image->path) }}" data-holder-rendered="true" class="d-inline-block contain" alt="" height=50px" width="60px">
                                    @endif
                                </td>
                                <td class="text-center border-secondary text-ddd align-middle"><a href="{{ route('admin.services.show', ['token' => $service->token]) }}">{{ $service->name }}</a></td>
                                <td class="text-center border-secondary text-ddd align-middle"><a href="{{ route('admin.services.show', ['token' => $service->token]) }}">{{ $service->short_description }}</a></td>
                                <td class="text-center border-secondary text-ddd align-middle"><a href="{{ route('admin.services.show', ['token' => $service->token]) }}">{!! $service->full_description !!}</a></td>
                                <td class="text-center border-secondary text-ddd align-middle">{{ $service->begin }}</td>
                                <td class="text-center border-secondary text-ddd align-middle">{{ $service->end }}</td>
                                <td class="text-center border-secondary text-ddd align-middle">
                                    @if(is_array(json_decode($service->role_id)))
                                        {{ \Spatie\Permission\Models\Role::whereIn('id', json_decode($service->role_id))->pluck('name')->implode(', ') }}
                                    @endif
                                </td>
                                <td class="text-center border-secondary text-ddd align-middle">
                                    <h6><span class="badge @if($service->status == 1) bg-success @else bg-danger @endif">{{ \App\Models\Service::statusList($service->status) }}</span></h6>
                                </td>
                                <td class="text-center border-secondary text-ddd align-middle">{{ $service->updated_at }}</td>
                                <td class="text-center border-secondary text-ddd align-middle">{{ $service->packages ? $service->packages->count() : 0 }}</td>
                                <td class="text-center border-secondary text-ddd align-middle">
                                    <livewire:services.services-edit :service_id="$service->id" :key="'services-edit-services-admin-'.$service->id"></livewire:services.services-edit>
                                    <livewire:services.services-delete :service_id="$service->id" :key="'services-delete-services-admin-'.$service->id"></livewire:services.services-delete>
                                    <a href="{{ route('admin.services.show', ['token' => $service->token]) }}" class="btn btn-info btn-sm rounded-circle">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <div class="form-check form-switch d-inline-block align-middle">
                                        <input class="form-check-input bg-main-1 border-danger" type="checkbox" wire:click.prevent="in_active({{$service->id}})" @if($service->status == 1) checked @endif id="flexSwitchCheckDefault">
                                    </div>
                                </td>
                            </tr>
                            @else
                                <tr>
                                    <td class="text-center border-secondary text-ddd align-middle">{{ $key + $services->firstItem() }}</td>
                                    <td class="text-center border-secondary text-ddd align-middle">
                                        @if($image = $service->attachments()->orderBy('id',"DESC")->first())
                                            <img src="{{ url('storage/public/'.$image->path) }}" data-holder-rendered="true" class="d-inline-block contain" alt="" height=50px" width="60px">
                                        @endif
                                    </td>
                                    <td class="text-center border-secondary text-ddd align-middle"><a href="{{ route('admin.services.show', ['token' => $service->token]) }}">{{ $service->name_en }}</a></td>
                                    <td class="text-center border-secondary text-ddd align-middle"><a href="{{ route('admin.services.show', ['token' => $service->token]) }}">{{ $service->short_description_en }}</a></td>
                                    <td class="text-center border-secondary text-ddd align-middle"><a href="{{ route('admin.services.show', ['token' => $service->token]) }}">{!!  $service->full_description_en !!}</a></td>
                                    <td class="text-center border-secondary text-ddd align-middle">{{ $service->begin }}</td>
                                    <td class="text-center border-secondary text-ddd align-middle">{{ $service->end }}</td>
                                    <td class="text-center border-secondary text-ddd align-middle">
                                        @if(is_array(json_decode($service->role_id)))
                                            {{ \Spatie\Permission\Models\Role::whereIn('id', json_decode($service->role_id))->pluck('name')->implode(', ') }}
                                        @endif
                                    </td>
                                    <td class="text-center border-secondary text-ddd align-middle">
                                        <h6><span class="badge @if($service->status == 1) bg-success @else bg-danger @endif">{{ \App\Models\Service::statusList($service->status) }}</span></h6>
                                    </td>
                                    <td class="text-center border-secondary text-ddd align-middle">{{ $service->updated_at }}</td>
                                    <td class="text-center border-secondary text-ddd align-middle">{{ $service->packages ? $service->packages->count() : 0 }}</td>
                                    <td class="text-center border-secondary text-ddd align-middle">
                                        <livewire:services.services-edit :service_id="$service->id" :key="'services-edit-services-admin-'.$service->id"></livewire:services.services-edit>
                                        <livewire:services.services-delete :service_id="$service->id" :key="'services-delete-services-admin-'.$service->id"></livewire:services.services-delete>
                                        <a href="{{ route('admin.services.show', ['token' => $service->token]) }}" class="btn btn-info btn-sm rounded-circle">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <div class="form-check form-switch d-inline-block align-middle">
                                            <input class="form-check-input bg-main-1 border-danger" type="checkbox" wire:click.prevent="in_active({{$service->id}})" @if($service->status == 1) checked @endif id="flexSwitchCheckDefault">
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-12">
                {{ $services->links() }}
            </div>
        </div>
    @else
        <div class="alert alert-danger mx-2">{{ __('Empty list') }}</div>
    @endif

<!-- Modal in_activeModal -->
    <div wire:ignore.self class="modal fade" id="in_activeModal" tabindex="-1" role="dialog" aria-labelledby="in_activeModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="in_activeModalLabel">{{ __('Inactive') }}</h5>
                    <button type="button" class="close btn ms-0" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true close-btn"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="mb-0">{{ __('Are you sure want to Inactive ?') }}</p>
                </div>
                <div class="modal-footer border-top-0 mt-0">
                    <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">{{ __('Close') }}</button>
                    <button type="button" wire:click.prevent="in_active()" class="btn btn-danger close-modal" data-bs-dismiss="modal">{{ __('Yes, Inactive') }}</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal in_activeModal -->

    <!-- Modal activeModal -->
    <div wire:ignore.self class="modal fade" id="activeModal" tabindex="-1" role="dialog" aria-labelledby="activeModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="activeModalLabel">{{ __('Active') }}</h5>
                    <button type="button" class="close btn ms-0" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true close-btn"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="mb-0">{{ __('Are you sure want to active ?') }}</p>
                </div>
                <div class="modal-footer border-top-0 mt-0">
                    <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">{{ __('Close') }}</button>
                    <button type="button" wire:click.prevent="active()" class="btn btn-success close-modal" data-bs-dismiss="modal">{{ __('Yes, Active') }}</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal activeModal -->
</div>

