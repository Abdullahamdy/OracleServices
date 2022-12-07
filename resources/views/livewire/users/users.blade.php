{{--<div style="display: contents">--}}
{{--    <div class="content-header">--}}
{{--        <div class="container-fluid">--}}
{{--            <div class="row mb-2">--}}
{{--                <div class="col-sm-6">--}}
{{--                    <h1 class="m-0">{{ __('Members') }}</h1>--}}
{{--                </div>--}}
{{--                <div class="col-sm-6">--}}
{{--                    <ol class="breadcrumb float-sm-right">--}}
{{--                        <li class="breadcrumb-item"><a href="{{ route('home') }}"> {{ __('Home') }}</a></li>--}}
{{--                        <li class="breadcrumb-item active">{{ __('Members') }}</li>--}}
{{--                    </ol>--}}
{{--                </div><!-- /.col -->--}}
{{--            </div>--}}
{{--            <div class="text-right">--}}
{{--                <a style="font-size: 15px" type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#CreateUser">--}}
{{--                    <i class="fa fa-plus"></i> {{ __('Create Member') }}--}}
{{--                </a>--}}
{{--            </div>--}}
{{--        </div><!-- /.container-fluid -->--}}
{{--    </div>--}}

{{--    <!-- Content area -->--}}
{{--    <div class="content">--}}
{{--        <div class="container-fluid">--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-12">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-header">--}}
{{--                            <form class="col-md-12" wire:submit.prevent="search">--}}
{{--                                <div class="input-group mb-3 " style="justify-content: center">--}}
{{--                                    <div>--}}
{{--                                        <input type="text" class="form-control form-control-sm" style="border-radius: .1875rem !important; margin-left: 10px !important" placeholder="{{ __('Name') }}" wire:model.defer="name">--}}
{{--                                    </div>--}}
{{--                                    <div>--}}
{{--                                        <input type="text" class="form-control form-control-sm" style="border-radius: .1875rem !important; margin-left: 10px !important" placeholder="{{ __('Email') }}" wire:model.defer="email">--}}
{{--                                    </div>--}}
{{--                                    <div>--}}
{{--                                        <input type="text" class="form-control form-control-sm" style="border-radius: .1875rem !important; margin-left: 10px !important" placeholder="{{ __('Mobile') }}" wire:model.defer="mobile">--}}
{{--                                    </div>--}}
{{--                                    <div style="width: 170px; ">--}}
{{--                                        <select wire:model.defer="status" class="form-control form-control-sm ">--}}
{{--                                            <option value="0">{{ __('Select Status') }} ...</option>--}}
{{--                                            @foreach(\App\Models\User::statusList(false) as $key => $value)--}}
{{--                                                <option value="{{ $key }}">{{ $value }}</option>--}}
{{--                                            @endforeach--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                    <div class="input-group-append ">--}}
{{--                                        <button wire:loading.attr="disabled" class="btn btn-block btn-primary btn-sm" type="submit">--}}
{{--                                            <i wire:loading class="fas fa-sync fa-spin"></i> {{ __('Search') }}--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                        <div class="card-body p-0">--}}
{{--                            @if($users->count() > 0)--}}
{{--                                <table class="table color-bordered-table info-table  info-bordered-table">--}}
{{--                                    <thead>--}}
{{--                                        <tr>--}}
{{--                                            <th class="text-center">#</th>--}}
{{--                                            <th class="text-center" style="width: -1px;">{{ __('Name') }}</th>--}}
{{--                                            <th class="text-center">{{ __('Mobile') }}</th>--}}
{{--                                            <th class="text-center">{{ __('Email') }}</th>--}}
{{--                                            <th class="text-center">{{ __('Birth Date') }}</th>--}}
{{--                                            <th class="text-center">{{ __('Age') }}</th>--}}
{{--                                            <th class="text-center">{{ __('id_number') }}</th>--}}
{{--                                            <th class="text-center">{{ __('country') }}</th>--}}
{{--                                            <th class="text-center">{{ __('Status') }}</th>--}}
{{--                                            <th class="text-center">{{ __('Role') }}</th>--}}
{{--                                            <th class="text-center" width="300">{{ __('Control') }}</th>--}}
{{--                                        </tr>--}}
{{--                                    </thead>--}}
{{--                                    <tbody>--}}
{{--                                        @foreach($users as $key => $user)--}}
{{--                                            <tr>--}}
{{--                                                <td class="align-middle text-center">{{ ++$key }}</td>--}}
{{--                                                <td class="align-middle text-center">{{ $user->name }}</td>--}}
{{--                                                <td class="align-middle text-center">{{ $user->mobile }}</td>--}}
{{--                                                <td class="align-middle text-center">{{ $user->email }}</td>--}}
{{--                                                <td class="align-middle text-center">{{ $user->birth_date }}</td>--}}
{{--                                                <td class="align-middle text-center">{{ \Carbon\Carbon::parse($user->birth_date)->diff(\Carbon\Carbon::now())->format('%y سنة') }}</td>--}}
{{--                                                <td class="align-middle text-center">{{ $user->id_number }}</td>--}}
{{--                                                <td class="align-middle text-center">{{ $user->country }}</td>--}}
{{--                                                <td class="align-middle text-center">--}}
{{--                                                    @if($user->status == 1  )--}}
{{--                                                        <span class="btn btn-success btn-sm">{{ $user->statusList($user->status) }}</span>--}}
{{--                                                    @elseif($user->status == 2)--}}
{{--                                                        <span class="btn btn-danger btn-sm">{{ $user->statusList($user->status) }}</span>--}}
{{--                                                    @elseif($user->status == 0)--}}
{{--                                                        <span class="btn btn-info btn-sm">{!! $user->statusList($user->status) !!}</span>--}}
{{--                                                    @else--}}
{{--                                                        <span class="btn btn-primary btn-sm">{!! $user->statusList($user->status) !!}</span>--}}
{{--                                                    @endif--}}
{{--                                                </td>--}}
{{--                                                <td class="align-middle text-center">--}}
{{--                                                    @foreach($user->roles as $role)--}}
{{--                                                        {{ __($role->name) }}--}}
{{--                                                    @endforeach--}}
{{--                                                </td>--}}
{{--                                                <td class="align-middle text-center">--}}
{{--                                                    @if($user->hasRole('Student'))--}}
{{--                                                        <a class="btn btn-sm btn-info" href="{{route('users.show', $user->id) }}" title="{{ __('Show') }}">--}}
{{--                                                            <i class="fa fa-eye"></i>--}}
{{--                                                        </a>--}}
{{--                                                    @endif--}}

{{--                                                    <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#EditUser" wire:click="EditUser({{$user->id}})" title="{{ __('Edit') }}">--}}
{{--                                                        <i class="fa fa-edit"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <a class="btn btn-sm btn-danger" wire:click.prevent="deleteId({{$user->id}})" data-toggle="modal" data-target="#deleteModal" title="{{ __('Delete') }}">--}}
{{--                                                        <i class="fa fa-trash"></i>--}}
{{--                                                    </a>--}}
{{--                                                </td>--}}
{{--                                            </tr>--}}
{{--                                        @endforeach--}}
{{--                                    </tbody>--}}
{{--                                </table>--}}
{{--                                <div class="pt-2">--}}
{{--                                    {{ $users->links() }}--}}
{{--                                </div>--}}
{{--                            @else--}}
{{--                                <div class="alert alert-danger m-4">{{ __('Empty list') }}</div>--}}
{{--                            @endif--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <!-- Modal deleteModal -->--}}
{{--    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">--}}
{{--        <div class="modal-dialog" role="document">--}}
{{--            <div class="modal-content">--}}
{{--                <div class="modal-header">--}}
{{--                    <h5 class="modal-title" id="deleteModalLabel">{{ __('Delete Confirm') }}</h5>--}}
{{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                        <span aria-hidden="true close-btn">×</span>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--                <div class="modal-body text-end">--}}
{{--                    <p class="mb-0">{{ __('Are you sure want to delete?') }}</p>--}}
{{--                </div>--}}
{{--                <div class="modal-footer border-top-0 mt-0">--}}
{{--                    <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">{{ __('Close') }}</button>--}}
{{--                    <button type="button" wire:click.prevent="delete()" class="btn btn-danger close-modal" data-dismiss="modal">{{ __('Yes, Delete') }}</button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- Modal deleteModal -->--}}

{{--    <!--  Modal CreateUser -->--}}
{{--    <div wire:ignore.self class="modal fade " id="CreateUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">--}}
{{--        <div class="modal-dialog modal-lg" role="document">--}}
{{--            <div class="modal-content text-center bg-sub">--}}
{{--                <div class="modal-header text-center bg-sub border-secondary">--}}
{{--                    <h5 class="modal-title text-center" id="exampleModalLongTitle">{{ __('Create User') }}</h5>--}}
{{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
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
{{--                    @if($role_id)--}}
{{--                        @livewire('users.users-create',[--}}
{{--                        [--}}
{{--                        'role_id' => $role_id,--}}
{{--                        ]--}}
{{--                        ])--}}
{{--                    @endif--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!--  Modal CreateUser -->--}}

{{--    <!--  Modal EditUser -->--}}
{{--    <div wire:ignore.self class="modal fade " id="EditUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">--}}
{{--        <div class="modal-dialog modal-lg" role="document">--}}
{{--            <div class="modal-content text-center bg-sub">--}}
{{--                <div class="modal-header text-center bg-sub border-secondary">--}}
{{--                    <h5 class="modal-title text-center" id="exampleModalLongTitle">{{ __('Edit Member') }}</h5>--}}
{{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
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
{{--                    @if($user_id)--}}
{{--                        @livewire('users.users-edit',[--}}
{{--                            $user_id,--}}
{{--                            [--}}
{{--                                'role_id' => $role_id,--}}
{{--                            ]--}}
{{--                        ])--}}
{{--                    @endif--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!--  Modal EditUser -->--}}
{{--</div>--}}

