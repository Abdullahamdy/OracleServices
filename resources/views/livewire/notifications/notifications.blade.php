<div>
    <div class="content">
        <div class="row">
            <div class="col-md-12 mt-2">
                <div class="p-2">
                    <div class="table-responsive-sm">
                        @if($notifications->count() > 0)
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th class="text-center text-ddd border-secondary">#</th>
                                    <th class="text-center text-ddd border-secondary">{{ __('Image') }}</th>
                                    <th class="text-center text-ddd border-secondary">{{ __('Title') }}</th>
                                    <th class="text-center text-ddd border-secondary">{{ __('Description') }}</th>
                                    <th class="text-center text-ddd border-secondary">{{ __('Created at') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($notifications as $key => $notification)
                                    <tr>
                                        <td class="text-center text-ddd border-secondary align-middle">{{ $key + $notifications->firstItem() }}</td>
                                        <td class="text-center text-ddd border-secondary align-middle">
                                            <img src="{{ asset('assets/images/logo.png') }}" data-holder-rendered="true" class="d-inline-block contain" alt="" height=50px" width="60px">
                                        </td>
                                        <td class="text-center text-ddd border-secondary align-middle">{{ $notification->title_lang }}</td>
                                        <td class="text-center text-ddd border-secondary align-middle">
                                            <a href="{{ route('services.show', ['token' => $notification->token]) }}">
                                                {{ $notification->message_lang }}
                                            </a>
                                        </td>
                                        <td class="text-center text-ddd border-secondary align-middle">{{ $notification->created_at->diffForHumans() }}</td>
                                    </tr>
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
