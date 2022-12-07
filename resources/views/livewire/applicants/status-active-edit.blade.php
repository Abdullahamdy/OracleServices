{{--<div class="d-inline">--}}
{{--    <a class="btn btn-success btn-sm rounded-circle" data-bs-toggle="modal" data-bs-target="#EditStatusModal{{$applicant['id']}}" title="{{ __('Edit') }}">--}}
{{--        <i class="far fa-check-circle"></i>--}}
{{--    </a>--}}

{{--    <div wire:ignore.self class="modal fade text-ddd" id="EditStatusModal{{$applicant['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">--}}
{{--        <div class="modal-dialog" role="document">--}}
{{--            <div class="modal-content text-end bg-sub">--}}
{{--                <div class="modal-header text-end bg-sub border-secondary">--}}
{{--                    <h5 class="modal-title text-end" id="exampleModalLongTitle">{{ __('Applicants') }}</h5>--}}
{{--                    <button type="button" class="close btn" data-bs-dismiss="modal" aria-label="Close">--}}
{{--                        <span aria-hidden="true" class="text-ddd">&times;</span>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--                <div class="modal-body">--}}
{{--                    <div>--}}
{{--                        <div wire:loading>--}}
{{--                            <i class="fas fa-sync fa-spin"></i>--}}
{{--                            {{ __('Loading please wait') }} ...--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <form class="mt-2" method="post" wire:submit.prevent="update">--}}
{{--                        {{ csrf_field() }}--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-md-12">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="control-label mb-2">{{ __('Status') }}</label>--}}
{{--                                    <select wire:model.lazy="applicant.status" class="form-control-2 pe-4e rounded-3 @error('applicant.status') is-invalid @enderror">--}}
{{--                                        <option value="">{{ __('Select Status') }} ...</option>--}}
{{--                                        @foreach(\App\Models\Cart::statusActiveList(false) as $key => $value)--}}
{{--                                            <option value="{{$key}}">{{$value}}</option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
{{--                                    @error('applicant.status')--}}
{{--                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                                @if($status)--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label class="control-label mb-2">{{ __('Text') }}</label>--}}
{{--                                        <textarea wire:model.defer="applicant.text" placeholder="{{ __('Text') }}" name="text" class="form-control-2 pe-4e rounded-3  @error('applicant.text') is-invalid @enderror" type="text"></textarea>--}}
{{--                                        @error('applicant.text')--}}
{{--                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>--}}
{{--                                        @enderror--}}
{{--                                    </div>--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col-md-12 mt-2">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <div class="d-table p-1 m-auto uniform-uploader">--}}
{{--                                                    <input type="file" wire:model.defer="applicant.file" class="form-input-styled form-control-2 pe-4e rounded-3 submit @error('applicant.file') is-invalid @enderror">--}}
{{--                                                    @error('applicant.file')--}}
{{--                                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>--}}
{{--                                                    @enderror--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div>--}}
{{--                            <div wire:loading>--}}
{{--                                <i class="fas fa-sync fa-spin"></i>--}}
{{--                                {{ __('Loading please wait') }} ...--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="mt-3 text-center">--}}
{{--                            <button wire:loading.attr="disabled" class="btn btn-primary" type="submit">{{ __('Edit') }}</button>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
