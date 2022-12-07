<?php

namespace App\Http\Livewire\Services;

use App\Models\Notification;
use App\Models\Service;
use Livewire\Component;

class ServicesDelete extends Component
{
    public $service ;
    function mount($service_id)
    {
        $service = Service::findOrFail($service_id);
        $this->service = $service->toArray();
    }

    public function delete()
    {
        $service = Service::where('id',$this->service['id'])->delete();
        $notification = Notification::where('service_id', $this->service['id'])->delete();

        $this->emit('alertSuccess', __('Service removed successfully'));
        $this->emit('refreshServicesShowAdmin');
        return redirect()->route('admin.admin');
    }

    public function render()
    {
        return view('livewire.services.services-delete');
    }
}
