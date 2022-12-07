<div>
    <!-- Button trigger modal -->
    @if(auth()->check() and auth()->user()->hasRole('Admin'))
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalFormCreateTelescopeEmail">
            {{ __('Create Telescope Email') }}
        </button>

        <!-- Modal -->
        <div wire:ignore.self class="modal fade" id="modalFormCreateTelescopeEmail" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content text-center bg-sub">
                    <div class="modal-header text-center bg-sub border-secondary">
                        <h5 class="modal-title" id="modalFormCreateTelescopeEmail">{{ __('Telescope emails') }}</h5>
                        <button type="button" class="close btn ms-0" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="text-ddd">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form wire:submit.prevent="store">
                            <div class="row">
                                <div class="form-group text-end">
                                    <label for="">{{ __('Users') }}</label>
                                    <select wire:model.defer="telescope_emails.user_id" name="user_id" class="form-control-2 pe-4e rounded-3 ">
                                        <option value="">{{ __('Nothing') }}</option>
                                        @foreach(\App\Models\User::all() as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }} - {{ $user->email }}</option>
                                        @endforeach
                                    </select>
                                    @error('telescope_emails.user_id') <span class="text-danger error">{{ $message }}</span>@enderror
                                </div>
                                <div class="mt-4 text-center">
                                    <button wire:loading.attr="disabled" type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
