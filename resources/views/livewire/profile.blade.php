<div class="mt-5">
    <div class="row">
        <div class="col-lg-6">
            <table class="table mt-4 mb-4 edit-table-data table-responsive-sm shadow">
                <thead>
                <tr>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td colspan="2" class="text-ddd border-secondary">
                        <livewire:edit-profile :key="'edit-profile-profile-'"></livewire:edit-profile>
                    </td>
                </tr>
                <tr>
                    <td class="text-ddd border-secondary">{{ __('Name') }}</td>
                    <td class="text-center text-ddd border-secondary">{{ auth()->user()->name }}</td>
                </tr>
                <tr>
                    <td class="text-ddd border-secondary">{{ __('Email') }}</td>
                    <td class="text-center text-ddd border-secondary">{{ auth()->user()->email }}</td>
                </tr>
                <tr>
                    <td class="text-ddd border-secondary">{{ __('Role') }}</td>
                    <td class="text-center text-ddd border-secondary">{{ auth()->user()->roles()->pluck("name")->implode(',') }}</td>
                </tr>
                @if(auth()->user()->mobile)
                    <tr>
                        <td class="text-ddd border-secondary">{{ __('Phone') }}</td>
                        <td class="text-center text-ddd border-secondary">{{ auth()->user()->mobile }}</td>
                    </tr>
                @endif
                @if(auth()->user()->birth_date)
                    <tr>
                        <td class="text-ddd border-secondary">{{ __('Birth date') }}</td>
                        <td class="text-center text-ddd border-secondary">{{ auth()->user()->birth_date }}</td>
                    </tr>
                @endif
                @if(auth()->user()->country)
                    <tr>
                        <td class="text-ddd border-secondary">{{ __('Country') }}</td>
                        <td class="text-center text-ddd border-secondary">{{ auth()->user()->country }}</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
        <div class="col-lg-6 text-center my-auto">
            <livewire:avatar :key="'avatar-profile-'"></livewire:avatar>
        </div>
    </div>
</div>
