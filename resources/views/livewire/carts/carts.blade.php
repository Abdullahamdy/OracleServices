<div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div>
                        @if($carts->count())
                            <div>
                                <table class="table border-secondary">
                                    <thead>
                                        <tr>
                                            <th class="text-center text-ddd border-secondary">#</th>
                                            @if(auth()->check() and auth()->user()->hasRole('Admin'))
                                                <th class="text-center text-ddd border-secondary">{{ __('User Name') }}</th>
                                            @endif
                                            <th class="text-center text-ddd border-secondary">{{ __('Package Name') }}</th>
                                            <th class="text-center text-ddd border-secondary">{{ __('Package Price') }}</th>
                                            <th class="text-center text-ddd border-secondary">{{ __('Status') }}</th>
                                            <th class="text-center text-ddd border-secondary">{{ __('Created at') }}</th>
                                            <th class="text-center text-ddd border-secondary" width="300">{{ __('Control') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($carts as $key => $cart)
                                        <tr>
                                            <td class="align-middle text-ddd border-secondary text-center">{{ $key + $carts->firstItem() }}</td>
                                            @if(auth()->check() and auth()->user()->hasRole('Admin'))
                                                <td class="align-middle text-center text-ddd border-secondary">{{ $cart->user ? $cart->user->name : '' }}</td>
                                            @endif
                                            <td class="align-middle text-ddd border-secondary text-center">{{ $cart->package ? $cart->package->name_lang  : '' }}</td>
                                            <td class="align-middle text-ddd border-secondary text-center">{{ $cart->package ? $cart->package->price_after  : '' }}</td>
                                            <td class="align-middle text-ddd border-secondary text-center">
                                                @if($cart->status == 0)
                                                    <span class="bg-dark rounded-3 px-3 py-1">{{ \App\Models\Cart::statusList($cart->status) }}</span>
                                                @elseif($cart->status == 0)
                                                    <span class="bg-info rounded-3 px-3 py-1">{{ \App\Models\Cart::statusList($cart->status) }}</span>
                                                @elseif($cart->status == 1)
                                                    <span class="bg-warning rounded-3 px-3 py-1">{{ \App\Models\Cart::statusList($cart->status) }}</span>
                                                @elseif($cart->status == 2)
                                                    <span class="bg-success rounded-3 px-3 py-1">{!! \App\Models\Cart::statusList($cart->status) !!}</span>
                                                @elseif($cart->status == 3)
                                                    <span class="bg-primary rounded-3 px-3 py-1">{!! \App\Models\Cart::statusList($cart->status) !!}</span>
                                                @elseif($cart->status == 4)
                                                    <span class="bg-danger rounded-3  px-3 py-1">{!! \App\Models\Cart::statusList($cart->status) !!}</span>
                                                @elseif($cart->status == 5)
                                                    <span class="bg-secondary rounded-3 px-3 py-1">{!! \App\Models\Cart::statusList($cart->status) !!}</span>
                                                @endif
                                            </td>
                                            <td class="align-middle text-ddd border-secondary text-center">{{ \Carbon\Carbon::createFromTimestamp(strtotime($cart->created_at))->format('d-m-Y') }}</td>
                                            <td class="align-middle text-ddd border-secondary text-center">
                                                <a class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#PayModal{{$cart['id']}}">
                                                    {{ __('Pay Now') }}
                                                </a>
                                                <div wire:ignore.self class="modal fade" id="PayModal{{$cart['id']}}" tabindex="-1" role="dialog" aria-labelledby="PayModal{{$cart['id']}}Label" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content  bg-sub">
                                                            <div class="modal-header  bg-sub border-secondary">
                                                                <h5 class="modal-title" id="PayModal{{$cart['id']}}Label">{{ __('Pay Confirm') }}</h5>
                                                                <button type="button" class="close btn" data-bs-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true" class="text-ddd">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body text-end">
                                                                <p class="mb-0">{{ __('Are you sure want to pay?') }}</p>
                                                            </div>
                                                            <div class="modal-footer border-top-0 mt-0">
                                                                <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">{{ __('Close') }}</button>
                                                                <button type="button" wire:click.prevent="change_status({{ $cart->id }})" class="btn btn-danger close-modal" data-bs-dismiss="modal">{{ __('Yes, Pay') }}</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <livewire:carts.carts-delete :cart_id="$cart->id" :key="'carts-delete-carts-'.$cart->id"></livewire:carts.carts-delete>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="row mt-4">
                                    <div class="col-md-12">
                                        {{ $carts->links() }}
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="alert alert-danger mx-3 mt-3">{{ __('Empty list') }}</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

