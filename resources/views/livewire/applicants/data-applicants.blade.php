<div class="d-inline">
    <a class="btn btn-sm btn-secondary rounded-3 px-1" data-bs-toggle="modal" data-bs-target="#DataApplicantModal{{$applicant->id}}" title="{{ __('Data') }}">
        <small class="fa fa-eye" aria-hidden="true"></small>
        <small>{{ __('Data') }}</small>
    </a>

    <div wire:ignore.self class="modal fade" id="DataApplicantModal{{$applicant->id}}" tabindex="-1" role="dialog" aria-labelledby="DataApplicantModal{{$applicant->id}}Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-sub">
                <div class="modal-header bg-sub border-secondary">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('Data') }}</h5>
                    <button type="button" class="btn ms-0 text-ddd" data-bs-dismiss="modal" aria-label="Close">x</button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <img src="{{ asset('assets/images/invoice.jpeg') }}" class="mb-2 shadow-sm rounded-2 border" width="180px" alt="">
                    </div>
                    <table class="table table-striped border-secondary table-bordered w-100">
                        <thead></thead>
                        <tbody>
                            <tr>
                                <td class="text-ddd border-secondary">{{ __('User Name') }}</td>
                                <td class="text-ddd border-secondary">{{ $applicant->user ? $applicant->user->name : '' }}</td>
                            </tr>
                            <tr>
                                <td class="text-ddd border-secondary">{{ __('Service Name') }}</td>
                                <td class="text-ddd border-secondary">{{ $applicant->service ? $applicant->service->name_lang : '' }}</td>
                            </tr>
                            <tr>
                                <td class="text-ddd border-secondary">{{ __('Package Name') }}</td>
                                <td class="text-ddd border-secondary">{{ $applicant->package ? $applicant->package->name_lang : '' }}</td>
                            </tr>
                            <tr>
                                <td class="text-ddd border-secondary">{{ __('Price SAR') }}</td>
                                <td class="text-ddd border-secondary">{{ $applicant->price_after }}</td>
                            </tr>
                            <tr>
                                <td class="text-ddd border-secondary">{{ __('Status') }}</td>
                                <td class="text-ddd border-secondary">
                                    @if($applicant->status == 1)
                                        <span class="text-ddd px-3 py-1">{{ \App\Models\Cart::statusList($applicant->status) }}</span>
                                    @elseif($applicant->status == 2)
                                        <span class="text-ddd px-3 py-1">{{ \App\Models\Cart::statusList($applicant->status) }}</span>
                                    @elseif($applicant->status == 3)
                                        <span class="text-ddd px-3 py-1">{!! \App\Models\Cart::statusList($applicant->status) !!}</span>
                                    @elseif($applicant->status == 4)
                                        <span class="text-ddd px-3 py-1">{!! \App\Models\Cart::statusList($applicant->status) !!}</span>
                                    @elseif($applicant->status == 5)
                                        <span class="text-ddd px-3 py-1">{!! \App\Models\Cart::statusList($applicant->status) !!}</span>
                                    @elseif($applicant->status == 6)
                                        <span class="text-ddd px-3 py-1">{!! \App\Models\Cart::statusList($applicant->status) !!}</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                @if($applicant->status == 3)
                                    <td class="text-ddd border-secondary">{{ __('Text') }}</td>
                                    <td class="text-ddd border-secondary">{{ $applicant->text_lang }}</td>
                                @endif
                            </tr>
                            <tr>
                                @if($applicant->file)
                                    @if( $applicant->status == 3)
                                        <td class="text-ddd border-secondary">{{ __('Attachments') }}</td>
                                        <td class="text-ddd border-secondary">
                                            <a href="{{$applicant->file}}" class="btn btn-sm btn-primary">{{ __('Attachments') }}</a>
                                        </td>
                                    @endif
                                @endif
                            </tr>
                            <tr>
                                @if($applicant->status == 5)
                                    <td class="text-ddd border-secondary">{{ __('Reason Cancellation') }}</td>
                                    <td class="text-ddd border-secondary"><p class="mb-0">{{ $applicant->reason_cancellation_lang }}</p></td>
                                @endif
                            </tr>
                            <tr>
                                <td class="text-ddd border-secondary">{{ __('Type') }}</td>
                                <td class="text-ddd border-secondary">{{ ($applicant->package and $applicant->package->type) ? $applicant->package->type->name_lang : __('Undefined') }}</td>
                            </tr>
                            <tr>
                                <td class="text-ddd border-secondary">{{ __('Begin Date') }}</td>
                                <td class="text-ddd border-secondary">{{ \Carbon\Carbon::parse($applicant->created_at)->format('d/m/Y') }}</td>
                            </tr>
                            @if($applicant->status == 3)
                                <tr>
                                    <td class="text-ddd border-secondary">{{ __('End Date') }}</td>
                                    <td class="text-ddd border-secondary">{{ \Carbon\Carbon::parse($applicant->end_date)->format('d/m/Y') }}</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer border-secondary">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{ __('Closed') }}</button>
                </div>
            </div>
        </div>
    </div>
</div>
