<div>
    <div class="content">
        <div class="row">
            <div class="col-md-12 mt-2">
                <div class="p-2">
                    <div class="row my-2">
                        <div class="col-6">
                            <div class="text-end">
                                <livewire:types.types-create :key="'types-create-types-'"></livewire:types.types-create>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive-sm">
                        @if($types->count() > 0)
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center border-secondary text-ddd">#</th>
                                        @if(app()->getLocale() == 'ar')
                                            <th class="text-center border-secondary text-ddd">{{ __('Name Ar') }}</th>
                                        @else
                                            <th class="text-center border-secondary text-ddd">{{ __('Name') }}</th>
                                        @endif
                                        <th class="text-center border-secondary text-ddd">{{ __('Created at') }}</th>
                                        <th class="text-center border-secondary text-ddd" width="200">{{ __('Control') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($types as $key => $type)
                                        <tr>
                                            <td class="text-center border-secondary text-ddd align-middle">{{ $key + $types->firstItem() }}</td>
                                            @if(app()->getLocale() == 'ar')
                                                <td class="text-center border-secondary text-ddd align-middle">{{ $type->name }}</td>
                                            @else
                                                <td class="text-center border-secondary text-ddd align-middle">{{ $type->name_en }}</td>
                                            @endif
                                            <td class="text-center border-secondary text-ddd align-middle">{{ $type->updated_at }}</td>
                                            <td class="text-center align-middle border-secondary">
                                                <livewire:types.types-edit :type_id="$type->id" :key="'types-edit-types-'.$type->id"></livewire:types.types-edit>
                                                <livewire:types.types-delete :type_id="$type->id" :key="'types-delete-types'.$type->id"></livewire:types.types-delete>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    {{ $types->links() }}
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

