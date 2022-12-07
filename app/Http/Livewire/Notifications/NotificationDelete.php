<?php

namespace App\Http\Livewire\Notifications;

use App\Models\Notification;
use Livewire\Component;

class NotificationDelete extends Component
{
    public $notifications;

    public function mount($notification_id)
    {
        $this->notifications = Notification::find($notification_id);
    }

    public function delete()
    {
        $notifications = Notification::find($this->notifications['id']);
        $notifications->delete();

        $this->emit('alertSuccess', __('Notification removed successfully'));
        $this->emit('refreshNotificationsAdmin');
        return redirect()->route('admin.notifications');
    }

    public function render()
    {
        return view('livewire.notifications.notification-delete')->layout('layouts.app-admin');
    }
}
