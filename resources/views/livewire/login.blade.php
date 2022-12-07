<div>
    <form wire:submit.prevent="login">
        <div class="mb-3">
            <input wire:model.defer="user.email" type="email" class="form-control-2 pe-4e rounded-3 py-2" id="Email" placeholder="{{ __('Email') }}" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <input wire:model.defer="user.password" type="password" class="form-control-2 pe-4e rounded-3 py-2" id="password" placeholder="{{ __('Password') }}">
            @error('email')
            <div class="text-warning">{{$message}}</div>
            @enderror
        </div>
        <div class="text-center pb-4 border-bottom border-secondary border-2">
            <button type="submit" class="btn w-100 btn-primary text-ddd"><i wire:loading wire:target="login" class="fa fa-sync fa-spin"></i>
                {{ __('login') }}
            </button>
        </div>
    </form>
</div>
