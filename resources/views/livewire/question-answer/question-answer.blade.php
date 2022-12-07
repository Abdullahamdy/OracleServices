
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
                                <livewire:question-answer.create-question :key="'question-create-question-'"></livewire:question-answer.create-question>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive-sm">
              
                        @if($questions->count() > 0)
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                      

                                            <th class="text-center text-ddd border-secondary"> السؤال</th>
                                            <th class="text-center text-ddd border-secondary"> الاجابة</th>
                                       
                                        <th class="text-center text-ddd border-secondary" width="200">{{ __('Control') }}</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($questions as $key => $question)
                                        <tr>
                                 
                                          
                                         <td class="text-center text-ddd border-secondary align-middle">{{ $question->question }}</td>
                                         <td class="text-center text-ddd border-secondary align-middle">{{ $question->answer }}</td>
                                            
                                            <td class="text-center text-ddd border-secondary align-middle">
                                                <livewire:question-answer.edit-question :question_id="$question->id" :key="'question-edit-question-'.$question->id"></livewire:question-answer.edit-question>
                                                <livewire:question-answer.delete-question :question_id="$question->id" :key="'question-delete-question'.$question->id"></livewire:question-answer.delete-question>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    {{ $questions->links() }}
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
