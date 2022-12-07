<div class="col-md-0">
    <div class="px-2 py-3 mt-3 mb-3">
        <div class="row">
            @foreach(\App\Models\Cart::statusList() as $key => $applicant)
                <div class="col-md-4">
                    <div class="p-2 position-relative  border-bottom border-secondary">
                        <h6>{{ __(\App\Models\Cart::statusList($key)) }}</h6>
                        <div class="progress bg-main-1">
                            @php
                                $applicants0 = App\Models\Cart::where('status', $key)->where('user_id', auth()->id())->count();
                                if($key == 0){
                                    $bg = "info";
                                 } elseif($key == 1){
                                    $bg = "info";
                                 } elseif($key == 2){
                                    $bg = "warning";
                                 } elseif($key == 3){
                                    $bg = "success";
                                 } elseif($key == 4){
                                    $bg = "primary";
                                 } elseif($key == 5){
                                    $bg = "danger";
                                 } elseif($key == 6){
                                    $bg = "secondary";
                                } else{
                                    $bg = "info";
                                }
                            @endphp
                            <div class="progress-bar bg-{{$bg}} text-ddd position-relative" role="progressbar"
                                 style="width: {{$applicants0?$applicants0/$all_applicants *100 : '' }}%;"
                                 aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                            <div class="position-absolute w-100 text-center {{$applicants0 >0 ? 'text-ddd' : ''}}">
                                @if($all_applicants > 0)  {{ number_format($applicants0/$all_applicants *100) }} @else
                                    0 @endif%
                            </div>
                        </div>
                        <div class="position-absolute top-0 start-0 m-1">
                            <h6>{{ $applicants0 }}</h6>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="px-2 py-3">
        <div class="row">
            <div class="col-md-12">
                    <form>
                        <div class="row">
                            <div class="col-md-4 my-auto">
                                <h5 class=" px-2 mb-0">
                                    <img src="{{ asset('assets/images/applicants.png') }}" width="35px" height="35px" class="contain ms-2" alt="">{{ __('My Applicants') }} : ({{ $applicants->count() }})
                                </h5>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-8 my-auto text-center">
                                    <div class="dropdown w-75 d-inline-block text-start mb-3">
                                        <a class="btn dropdown-toggle text-muted w-100 shadow text-end position-relative border-2 border border-secondary rounded-2 shadow-sm" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                            {{ __('Choose') }} ..
                                        </a>
                                        <div class="dropdown-menu mx-auto text-center w-100 rounded-2 mt-1 shadow-sub bg-sub border-0" aria-labelledby="dropdownMenuLink">
                                            <div class="row drop-applicants drop-applicant-js w-100 mx-auto p-2">
                                                <div class="col-6 border-start border-2 border-secondary">
                                                    <div class="px-3 text-end">
                                                        <h5 class="text-ddd">{{ __('Services') }} :</h5>
                                                        @foreach($services as $service)
                                                            <div class="form-check pb-1 my-2 border-bottom  border-secondary border-2">
                                                                <input class="form-check-input float-start" type="checkbox" name="service_id[]" value="{{ $service->id }}" {{in_array($service->id, (array)request('service_id')) ? 'checked' : ''}}>
                                                                <label class="form-check-label text-ddd h6 mb-0 me-4">{{ $service->name_lang }}</label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="px-3 text-end">
                                                        <h5 class="text-ddd">{{ __('Packages') }} :</h5>
                                                        @foreach($packages as $package)
                                                            <div class="form-check pb-1 my-2 border-bottom border-secondary border-2">
                                                                <input class="form-check-input float-start" type="checkbox" name="package_id[]" value="{{ $package->id }}" {{in_array($package->id, (array)request('package_id')) ? 'checked' : ''}}>
                                                                <label class="form-check-label text-ddd h6 mb-0 me-4">{{ $package->name_lang }}</label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-center mt-3 d-inline-block">
                                                <button wire:loading.attr="disabled"
                                                        class="btn rounded-3 btn-primary px-4" type="submit">
                                                    <i wire:loading class="fas fa-sync fa-spin"></i> {{ __('Search') }}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </form>

                </div>
                <div class="col-md-12">
                    <div class="p-3 mx-2">
                        <div class="table-responsive-sm">
                            @if($applicants->count() > 0)
                                <table class="table table-striped border-secondary table-hover text-center">
                                    <thead>
                                    <tr>
                                        <th class="text-center text-ddd" scope="col">#</th>
                                        <th class="text-center text-ddd" scope="col">{{ __('Applicant Name') }}</th>
                                        <th class="text-center text-ddd" scope="col">{{ __('Service Name') }}</th>
                                        <th class="text-center text-ddd" scope="col">{{ __('Package Name') }}</th>
                                        <th class="text-center text-ddd" scope="col">{{ __('Status') }}</th>
                                        <th class="text-center text-ddd" scope="col">{{ __('Created at') }}</th>
                                        <th class="text-center text-ddd" scope="col">{{ __('Price') }}</th>
                                        <th class="text-center text-ddd" scope="col">{{ __('Bill') }}</th>
                                        <th class="text-center text-ddd" scope="col">{{ __('Data') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $total = 0
                                    @endphp
                                    @foreach($applicants as $key => $applicant)
                                        @php
                                            $total = $total + $applicant->price_after;
                                        @endphp
                                        <tr>
                                            <td class="align-middle text-ddd text-center">{{ $key + $applicants->firstItem() }}</td>
                                            <td class="align-middle text-ddd text-center">{{ $applicant->user ? $applicant->user->name : '' }}</td>
                                            <td class="align-middle text-ddd text-center">{{ ($applicant->package and $applicant->package->service) ? $applicant->package->service->name_lang : 'لا يوجد' }}</td>
                                            <td class="align-middle text-ddd text-center">{{ $applicant->package ? $applicant->package->name_lang  : '' }}</td>
                                            <td class="align-middle text-ddd text-center">
                                                @if($applicant->status == 1)
                                                    <span
                                                        class="badge bg-info px-3 py-1 rounded-3">{{ \App\Models\Cart::statusList($applicant->status) }}</span>
                                                @elseif($applicant->status == 2)
                                                    <span
                                                        class="badge bg-warning px-3 py-1 rounded-3 rounded-3">{{ \App\Models\Cart::statusList($applicant->status) }}</span>
                                                @elseif($applicant->status == 3)
                                                    <span
                                                        class="badge bg-success px-3 py-1 rounded-3 rounded-3">{!! \App\Models\Cart::statusList($applicant->status) !!}</span>
                                                @elseif($applicant->status == 4)
                                                    <span
                                                        class="badge bg-primary px-3 py-1 rounded-3 rounded-3">{!! \App\Models\Cart::statusList($applicant->status) !!}</span>
                                                @elseif($applicant->status == 5)
                                                    <span
                                                        class="badge bg-danger px-3 py-1 rounded-3 rounded-3">{!! \App\Models\Cart::statusList($applicant->status) !!}</span>
                                                @elseif($applicant->status == 6)
                                                    <span
                                                        class="badge bg-secondary px-3 py-1 rounded-3">{!! \App\Models\Cart::statusList($applicant->status) !!}</span>
                                                @endif
                                            </td>
                                            <td class="align-middle text-ddd text-center">{{ \Carbon\Carbon::parse($applicant->created_at)->format('d/m/Y') }}</td>
                                            <td class="align-middle text-ddd text-center">
                                                {{ $applicant->price_after }}
                                            </td>
                                            <td class="align-middle text-ddd text-center">
                                                <livewire:applicants.applicants-show :applicant_id="$applicant->id" :key="'applicants-show-applicants-'.$applicant->id"></livewire:applicants.applicants-show>
                                            </td>
                                            <td class="align-middle text-ddd text-center">
                                                <livewire:applicants.data-applicants :applicant_id="$applicant->id" :key="'data-applicants-applicants-'.$applicant->id"></livewire:applicants.data-applicants>
                                            </td>
                                        </tr>
                                    @endforeach
                                        <tr class="bg-sub">
                                            <td colspan="6" class=" border-0 bg-sub"></td>

                                            <td colspan="3" class="bg-main-1 border-0">
                                                <table class="w-100 table-hover">
                                                    <tbody>
                                                    <tr>
                                                        <td class="align-middle text-ddd text-center w-75">{{ __('Total') }}</td>
                                                        <td class="align-middle text-ddd text-end">{{ $total }}</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr class="bg-sub">
                                            <td colspan="6" class="border-0 bg-sub"></td>

                                            <td colspan="3" class="bg-main-1 border-0">
                                                <table class="w-100">
                                                    <tbody>
                                                    <tr>
                                                        <td class="align-middle text-ddd text-center w-75">{{ __('Total summation') }}</td>
                                                        <td class="align-middle text-ddd text-end">{{ \App\Models\Cart::where('user_id',auth()->id())->whereIn('status', [1,2,3,4,5,6])->sum('price_after') }}</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="row mt-4">
                                    <div class="col-md-12">
                                        {{ $applicants->links() }}
                                    </div>
                                </div>
                            @else
                                <div class="alert alert-danger mt-4">{{ __('Empty list') }}</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal new_applicantModal -->
        <div wire:ignore.self class="modal fade" id="new_applicantModal" tabindex="-1" role="dialog"
             aria-labelledby="new_applicantModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content bg-sub ">
                    <div class="modal-header bg-sub border-secondary">
                        <h5 class="modal-title" id="new_applicantModalLabel">{{ __('New Applicant') }}</h5>
                        <button type="button" class="close btn" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="text-ddd">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>{{ __('Are you sure want to New Applicant ?') }}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary close-btn"
                                data-bs-dismiss="modal">{{ __('Close') }}</button>
                        <button type="button" wire:click.prevent="new_applicant()" class="btn btn-info close-modal"
                                data-bs-dismiss="modal">{{ __('Yes, New Applicant') }}</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal new_applicantModal -->

        <!-- Modal in_progressModal -->
        <div wire:ignore.self class="modal fade" id="in_progressModal" tabindex="-1" role="dialog"
             aria-labelledby="in_progressModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content bg-sub">
                    <div class="modal-header bg-sub border-secondary">
                        <h5 class="modal-title" id="in_progressModalLabel">{{ __('Progress') }}</h5>
                        <button type="button" class="close btn" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="text-ddd">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="mb-0">{{ __('Are you sure want to progress ?') }}</p>
                    </div>
                    <div class="modal-footer border-top-0 mt-0">
                        <button type="button" class="btn btn-secondary close-btn"
                                data-bs-dismiss="modal">{{ __('Close') }}</button>
                        <button type="button" wire:click.prevent="applicant_progress()"
                                class="btn btn-warning text-ddd close-modal"
                                data-bs-dismiss="modal">{{ __('Yes, Progress') }}</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal in_progressModal -->

        <!-- Modal progressModal -->
        <div wire:ignore.self class="modal fade" id="progressModal" tabindex="-1" role="dialog"
             aria-labelledby="progressModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content bg-sub">
                    <div class="modal-header bg-sub border-secondary">
                        <h5 class="modal-title" id="progressModalLabel">{{ __('Progress') }}</h5>
                        <button type="button" class="close btn" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="text-ddd">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="mb-0">{{ __('Are you sure want to progress ?') }}</p>
                    </div>
                    <div class="modal-footer border-top-0 mt-0">
                        <button type="button" class="btn btn-secondary close-btn"
                                data-bs-dismiss="modal">{{ __('Close') }}</button>
                        <button type="button" wire:click.prevent="progress()"
                                class="btn btn-warning text-ddd close-modal"
                                data-bs-dismiss="modal">{{ __('Yes, Progress') }}</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal progressModal -->
    </div>
