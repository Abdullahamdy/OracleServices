<?php

namespace App\Http\Livewire\Notifications;

use App\Models\Notification;
use Livewire\Component;
use Livewire\WithPagination;

class NotificationsAdmin extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';
    protected $listeners = [
        'refreshNotificationsAdmin' => 'ActionRefreshNotificationsAdmin'
    ];

    public function ActionRefreshNotificationsAdmin()
    {

    }

    public function render()
    {
        $notifications = Notification::paginate(10);
        return view('livewire.notifications.notifications-admin', compact('notifications'))->layout('layouts.app-admin');
    }
}
