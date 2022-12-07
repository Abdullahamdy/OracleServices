<div class="d-inline">
    <a class="btn btn-sm btn-secondary rounded-3 px-1" data-bs-toggle="modal" data-bs-target="#addModal{{$applicant->id}}" title="{{ __('Bill') }}">
        <small class="fa fa-eye" aria-hidden="true"></small>
        <small>{{ __('Bill') }}</small>
    </a>

    <div wire:ignore.self class="modal fade" id="addModal{{$applicant->id}}" tabindex="-1" role="dialog" aria-labelledby="addModal{{$applicant->id}}Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-sub">
                <div class="modal-header  bg-sub border-secondary">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('Bill') }}</h5>
                    <button type="button" class="text-ddd btn ms-0" data-bs-dismiss="modal" aria-label="Close">x</button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <img src="{{ asset('assets/images/invoice.jpeg') }}" class="mb-2 shadow-sm rounded-2 border" width="180px" alt="">
                    </div>
                    <table class="table table-striped border-secondary table-bordered">
                        <thead></thead>
                        <tbody>
                            <tr>
                                <td class="text-ddd border-secondary">{{ __('Service Name') }}</td>
                                <td class="text-ddd border-secondary">{{ $applicant->service ? $applicant->service->name_lang : ''}}</td>
                            </tr>
                            <tr>
                                <td class="text-ddd border-secondary">{{ __('Package Name') }}</td>
                                <td class="text-ddd border-secondary">{{ $applicant->package ? $applicant->package->name_lang : ''}}</td>
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
                                <td class="text-ddd border-secondary">{{ __('Control') }}</td>
                                <td class="text-ddd border-secondary">
                                    <a href="{{ route('applicants.pdf', $applicant->id) }}" class="btn btn-sm btn-success">{{ __('Export PDF') }}</a>
                                </td>
                            </tr>
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
