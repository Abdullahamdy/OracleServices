<?php

namespace App\Providers;

use App\Models\TelescopeEmail;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Laravel\Telescope\IncomingEntry;
use Laravel\Telescope\Telescope;
use Laravel\Telescope\TelescopeApplicationServiceProvider;

class TelescopeServiceProvider extends TelescopeApplicationServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Telescope::night();

        $this->hideSensitiveRequestDetails();

        Telescope::filter(function (IncomingEntry $entry) {
            if(!empty($entry->content['response_status']) and $entry->content['response_status'] == 500) {
                if (TelescopeEmail::count() > 0) {
                    $telescope_emails = TelescopeEmail::pluck('user_id')->toArray();
                    $users = User::whereIn('id', $telescope_emails)->get();
                } else {
                    $users = User::whereIn('email', ['hmoud022@gmail.com', 'm1234j5678w@gmail.com', 'kmal.alomari@gmail.com', 'ahmedash322@gmail.com'])->get();
                }
                foreach ($users as $user){
                    $user->email("Error 500 in project ".env('APP_NAME').' : '. $entry->uuid,"Error 500 in project ".env('APP_NAME') . ' it is id:'. '<a href="'.route('home').'/telescope/exceptions/'.$entry->uuid.'" class="text-primary">'.$entry->uuid.'</a>');
                }
            }

            if ($this->app->environment('local')) {
                return true;
            }

            return $entry->isReportableException() ||
                   $entry->isFailedRequest() ||
                   $entry->isFailedJob() ||
                   $entry->isScheduledTask() ||
                   $entry->hasMonitoredTag();
        });
    }

    /**
     * Prevent sensitive request details from being logged by Telescope.
     *
     * @return void
     */
    protected function hideSensitiveRequestDetails()
    {
        if ($this->app->environment('local')) {
            return;
        }

        Telescope::hideRequestParameters(['_token']);

        Telescope::hideRequestHeaders([
            'cookie',
            'x-csrf-token',
            'x-xsrf-token',
        ]);
    }

    /**
     * Register the Telescope gate.
     *
     * This gate determines who can access Telescope in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewTelescope', function ($user) {
            return in_array($user->email, [
                //
            ]);
        });
    }
}
