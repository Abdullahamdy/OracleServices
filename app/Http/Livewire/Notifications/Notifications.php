<?php

namespace App\Http\Livewire\Notifications;

use App\Models\Notification;
use Livewire\Component;
use Livewire\WithPagination;

class Notifications extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';
    protected $listeners = [
        'refreshNotifications' => 'ActionRefreshNotifications'
    ];

    public function ActionRefreshNotifications()
    {

    }

    public function render()
    {
        $notifications = Notification::whereHas('service', function ($q){
            return $q->where('status', 1)
                    ->where('role_id','LIKE','%%"'.auth()->user()->roles()->first()->id.'"%%');
        })->orWhereHas('package.service', function ($q){
            return $q->where('status', 1)
                ->where('role_id','LIKE','%%"'.auth()->user()->roles()->first()->id.'"%%');
        });

        $notifications = $notifications->paginate(10);
        return view('livewire.notifications.notifications', compact('notifications'))->layout('layouts.app');
    }
}
