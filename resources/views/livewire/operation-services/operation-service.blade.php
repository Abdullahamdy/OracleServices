
<div>
    <div class="content">
    <form method="get" class="input-group m-2">
                        <div class="d-block d-md-flex text-center justify-content-center mx-auto" style="width: 90%">
                            
                            <div class="mb-2 px-1 w-20 position-relative">
                                <input name="search" type="text" class="form-control-2 py-1 rounded-3 border-trans pe-4e" placeholder="{{ __('Search by name') }}" value="{{ $search }}">
                            </div>
                            <div class="mb-2 px-1 w-20 position-relative">
                                <button wire:loading.attr="disabled" class="btn bg-primary py-1 shadow text-ddd rounded-3 px-4" type="submit">
                                    <i wire:loading class="fas fa-sync fa-spin"></i> {{ __('Search') }}
                                </button>
                            </div>
                        </div>
                    </form>
        <div class="row">
            <div class="col-md-12 mt-2">
                <div class="p-2">
                    <div class="row my-2">
                        <div class="col-6">
                            <div class="text-end">
                                <livewire:operation-services.operation-service-create :key="'operation-create-operations-'"></livewire:operation-services.operation-service-create>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive-sm">
              
                        @if($operations->count() > 0)
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                      
                                    <th class="text-center text-ddd border-secondary">  الصوره</th>
                                            <th class="text-center text-ddd border-secondary"> اسم العملية</th>
                                            <th class="text-center text-ddd border-secondary"> نص العملية</th>
                                       
                                        <th class="text-center text-ddd border-secondary" width="200">{{ __('Control') }}</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($operations as $key => $operation)
                                        <tr>
                                        <td class="text-center border-secondary text-ddd align-middle">
                                    @if($image = $operation->attachments()->orderBy('id',"DESC")->first())
                                        <img src="{{ url('storage/'.$image->path) }}" data-holder-rendered="true" class="d-inline-block contain" alt="" height=50px" width="60px">
                                    @endif
                                </td>
                                          
                                         <td class="text-center text-ddd border-secondary align-middle">{{ $operation->name }}</td>
                                         <td class="text-center text-ddd border-secondary align-middle">{{ $operation->text }}</td>
                                            
                                            <td class="text-center text-ddd border-secondary align-middle">
                                                <livewire:operation-services.operation-service-edit :operation_id="$operation->id" :key="'operation-edit-operation-'.$operation->id"></livewire:operation-services.operation-service-edit>
                                                <livewire:operation-services.operation-service-delete :operation_id="$operation->id" :key="'operation-delete-operation'.$operation->id"></livewire:operation-services.operation-service-delete>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    {{ $operations->links() }}
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
