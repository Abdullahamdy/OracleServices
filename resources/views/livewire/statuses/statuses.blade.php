<div>
    <div class="content">
        <div class="row">
            <div class="col-md-12 mt-2">
                <div class="p-2">
                    <div class="row my-2">
                        <div class="col-6">
                            <div class="text-end">
                                <livewire:statuses.statuses-create :key="'statuses-create-statuses-'"></livewire:statuses.statuses-create>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive-sm">
                        @if($statuses->count() > 0)
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center text-ddd border-secondary">#</th>
                                        @if(app()->getLocale() == 'ar')
                                            <th class="text-center text-ddd border-secondary">{{ __('Name Ar') }}</th>
                                        @else
                                            <th class="text-center text-ddd border-secondary">{{ __('Name') }}</th>
                                        @endif
                                        <th class="text-center text-ddd border-secondary">{{ __('Created at') }}</th>
                                        <th class="text-center text-ddd border-secondary" width="200">{{ __('Control') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($statuses as $key => $status)
                                        <tr>
                                            <td class="text-center text-ddd border-secondary align-middle">{{ $key + $statuses->firstItem() }}</td>
                                            @if(app()->getLocale() == 'ar')
                                                <td class="text-center text-ddd border-secondary align-middle">{{ $status->name }}</td>
                                            @else
                                                <td class="text-center text-ddd border-secondary align-middle">{{ $status->name_en }}</td>
                                            @endif
                                            <td class="text-center text-ddd border-secondary align-middle">{{ $status->updated_at }}</td>
                                            <td class="text-center text-ddd border-secondary align-middle">
                                                <livewire:statuses.statuses-edit :status_id="$status->id" :key="'statuses-edit-statuses-'.$status->id"></livewire:statuses.statuses-edit>
                                                <livewire:statuses.statuses-delete :status_id="$status->id" :key="'statuses-delete-statuses'.$status->id"></livewire:statuses.statuses-delete>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    {{ $statuses->links() }}
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
