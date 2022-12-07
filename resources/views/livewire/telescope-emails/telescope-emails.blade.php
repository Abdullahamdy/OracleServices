<div>
    @if(auth()->check() and auth()->user()->hasRole('Admin'))
        <div class="row mb-3">
            <div class="col-md-3 text-end">
                <livewire:telescope-emails.telescope-email-create :key="'telescope-email-create-telescope-emails-'"></livewire:telescope-emails.telescope-email-create>
            </div>
        </div>
        @if($telescope_emails->count())
            <div class="row">
                <div class="table-responsive-sm">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col" class="text-center border-secondary text-ddd">#</th>
                            <th scope="col" class="text-center border-secondary text-ddd">{{ __('Name') }}</th>
                            <th scope="col" class="text-center border-secondary text-ddd">{{ __('Email') }}</th>
                            <th scope="col" class="text-center border-secondary text-ddd">{{ __('Control') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($telescope_emails as $key => $telescope_email)
                            <tr>
                                <td class="text-center border-secondary text-ddd align-middle">{{ $key + $telescope_emails->firstItem() }}</td>
                                <td class="text-center border-secondary text-ddd align-middle">{{ $telescope_email->user ? $telescope_email->user->name : '' }}</td>
                                <td class="text-center border-secondary text-ddd align-middle">{{ $telescope_email->user ? $telescope_email->user->email : '' }}</td>
                                <td class="text-center border-secondary text-ddd align-middle">
                                    @if(auth()->check() and auth()->user()->hasRole('Admin'))
                                        <livewire:telescope-emails.telescope-email-delete :telescope_email_id="$telescope_email->id" :key="'telescope-email-delete-telescope-emails-'.$telescope_email->id"></livewire:telescope-emails.telescope-email-delete>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row mt-4">
                    <div class="col-md-12">
                        {{ $telescope_emails->links() }}
                    </div>
                </div>
            </div>
        @else
            <div class="alert alert-danger m-3">{{ __('Empty list') }}</div>
        @endif
    @endif
</div>

