<div class="p-2">
    <div class="row justify-content-center">
        <div class="col-md-4 mb-4">
            <div class="border shadow rounded-3 p-2 shadow-sub border-secondary">
                <img src="{{ asset('assets/images/logo-white.png') }}" width="60px" height="60px" class="d-inline-block contain shadow-sm" alt="">
                <div class="d-inline-block w-75 align-middle text-center">
                    <h5 class="font-11">{{ __('Total number of users') }}</h5>
                    <h4 class="text-primary fw-bold">{{ \App\Models\User::count() }}</h4>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="border shadow rounded-3 p-2 shadow-sub border-secondary">
                <img src="{{ asset('assets/images/logo-white.png') }}" width="60px" height="60px" class="d-inline-block contain shadow-sm" alt="">
                <div class="d-inline-block w-75 align-middle text-center">
                    <h5 class="font-11">{{ __('Total number of services') }}</h5>
                    <h4 class="text-primary fw-bold">{{ \App\Models\Service::count() }}</h4>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="border shadow rounded-3 p-2 shadow-sub border-secondary">
                <img src="{{ asset('assets/images/logo-white.png') }}" width="60px" height="60px" class="d-inline-block contain shadow-sm" alt="">
                <div class="d-inline-block w-75 align-middle text-center">
                    <h5 class="font-11">{{ __('Number of active services') }}</h5>
                    <h4 class="text-primary fw-bold">{{ \App\Models\Service::where('status', 1)->count() }}</h4>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="border shadow rounded-3 p-2 shadow-sub border-secondary">
                <img src="{{ asset('assets/images/logo-white.png') }}" width="60px" height="60px" class="d-inline-block contain shadow-sm" alt="">
                <div class="d-inline-block w-75 align-middle text-center">
                    <h5 class="font-11">{{ __('Number of inactive services') }}</h5>
                    <h4 class="text-primary fw-bold">{{ \App\Models\Service::where('status', 0)->count() }}</h4>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="border shadow rounded-3 p-2 shadow-sub border-secondary">
                <img src="{{ asset('assets/images/logo-white.png') }}" width="60px" height="60px" class="d-inline-block contain shadow-sm" alt="">
                <div class="d-inline-block w-75 align-middle text-center">
                    <h5 class="font-11">{{ __('Total number of applicants') }}</h5>
                    <h4 class="text-primary fw-bold">{{ \App\Models\Applicant::count() }}</h4>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="border shadow rounded-3 p-2 shadow-sub border-secondary">
                <img src="{{ asset('assets/images/logo-white.png') }}" width="60px" height="60px" class="d-inline-block contain shadow-sm" alt="">
                <div class="d-inline-block w-75 align-middle text-center">
                    <h5 class="font-11">{{ __('Total number of packages') }}</h5>
                    <h4 class="text-primary fw-bold">{{ \App\Models\Package::count() }}</h4>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="border shadow rounded-3 p-2 shadow-sub border-secondary">
                <img src="{{ asset('assets/images/logo-white.png') }}" width="60px" height="60px" class="d-inline-block contain shadow-sm" alt="">
                <div class="d-inline-block w-75 align-middle text-center">
                    <h5 class="font-11">{{ __('Total number of package types') }}</h5>
                    <h4 class="text-primary fw-bold">{{ \App\Models\Type::count() }}</h4>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="border shadow rounded-3 p-2 shadow-sub border-secondary">
                <img src="{{ asset('assets/images/logo-white.png') }}" width="60px" height="60px" class="d-inline-block contain shadow-sm" alt="">
                <div class="d-inline-block w-75 align-middle text-center">
                    <h5 class="font-11">{{ __('Total number of package cases') }}</h5>
                    <h4 class="text-primary fw-bold">{{ \App\Models\Status::count() }}</h4>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="border shadow rounded-3 p-2 shadow-sub border-secondary">
                <img src="{{ asset('assets/images/logo-white.png') }}" width="60px" height="60px" class="d-inline-block contain shadow-sm" alt="">
                <div class="d-inline-block w-75 align-middle text-center">
                    <h5 class="font-11">{{ __('Total number of notifications') }}</h5>
                    <h4 class="text-primary fw-bold">{{ \App\Models\Notification::count() }}</h4>
                </div>
            </div>
        </div>
    </div>
</div>
