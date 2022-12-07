<div>
    <div class="content">
        <div class="row">
            <div class="col-md-12 mt-2">
                <div class="p-2">
                    <div class="table-responsive-sm">
                        @if($notifications->count() > 0)
                            <table class="table table-striped">
                                <thead>
                                @if(app()->getLocale() == 'ar' )
                                    <tr>
                                        <th class="text-center text-ddd border-secondary">#</th>
                                        <th class="text-center text-ddd border-secondary">{{ __('Image') }}</th>
                                        <th class="text-center text-ddd border-secondary">{{ __('Title') }}</th>
                                        <th class="text-center text-ddd border-secondary">{{ __('Description') }}</th>
                                        <th class="text-center text-ddd border-secondary">{{ __('Creator') }}</th>
                                        <th class="text-center text-ddd border-secondary">{{ __('Created at') }}</th>
                                        <th class="text-center text-ddd border-secondary" width="200">{{ __('Control') }}</th>
                                    </tr>
                                @else
                                    <tr>
                                        <th class="text-center text-ddd border-secondary">#</th>
                                        <th class="text-center text-ddd border-secondary">{{ __('Image') }}</th>
                                        <th class="text-center text-ddd border-secondary">{{ __('Title') }}</th>
                                        <th class="text-center text-ddd border-secondary">{{ __('Description') }}</th>
                                        <th class="text-center text-ddd border-secondary">{{ __('Creator') }}</th>
                                        <th class="text-center text-ddd border-secondary">{{ __('Created at') }}</th>
                                        <th class="text-center text-ddd border-secondary" width="200">{{ __('Control') }}</th>
                                    </tr>
                                @endif
                                </thead>
                                <tbody>
                                @foreach($notifications as $key => $notification)
                                    @if(app()->getLocale() == 'ar' )
                                        <tr>
                                            <td class="text-center text-ddd border-secondary align-middle">{{ $key + $notifications->firstItem() }}</td>
                                            <td class="text-center text-ddd border-secondary align-middle">
                                                <img src="{{ asset('assets/images/logo.png') }}" data-holder-rendered="true" class="d-inline-block contain" alt="" height=50px" width="60px">
                                            </td>
                                            <td class="text-center text-ddd border-secondary align-middle">{{ $notification->title }}</td>
                                            <td class="text-center text-ddd border-secondary align-middle">
                                                <a href="{{ route('admin.services.show', ['token' => $notification->token]) }}">
                                                    {{ $notification->message }}
                                                </a>
                                            </td>
                                            <td class="text-center text-ddd border-secondary align-middle">{{ $notification->user ? $notification->user->name : '' }}</td>
                                            <td class="text-center text-ddd border-secondary align-middle">{{ $notification->created_at }}</td>
                                            <td class="text-center text-ddd border-secondary align-middle">
                                                <livewire:notifications.notification-delete :notification_id="$notification->id" :key="'notification-delete-notifications-'.$notification->id"></livewire:notifications.notification-delete>
                                            </td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td class="text-center text-ddd border-secondary align-middle">{{ $key + $notifications->firstItem() }}</td>
                                            <td class="text-center text-ddd border-secondary align-middle">
                                                <img src="{{ asset('assets/images/logo.png') }}" data-holder-rendered="true" class="d-inline-block contain" alt="" height=50px" width="60px">
                                            </td>
                                            <td class="text-center text-ddd border-secondary align-middle">{{ $notification->title_en }}</td>
                                            <td class="text-center text-ddd border-secondary align-middle">
                                                <a href="{{ route('admin.services.show', ['token' => $notification->token]) }}">
                                                    {{ $notification->message_en }}
                                                </a>
                                            </td>
                                            <td class="text-center text-ddd border-secondary align-middle">{{ $notification->user ? $notification->user->name : '' }}</td>
                                            <td class="text-center text-ddd border-secondary align-middle">{{ $notification->created_at }}</td>
                                            <td class="text-center text-ddd border-secondary align-middle">
                                                <livewire:notifications.notification-delete :notification_id="$notification->id" :key="'notification-delete-notifications-'.$notification->id"></livewire:notifications.notification-delete>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    {{ $notifications->links() }}
                                </div>
                            </div>
                        @else
                            <div class="alert alert-danger">{{ __('Empty list') }}</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
