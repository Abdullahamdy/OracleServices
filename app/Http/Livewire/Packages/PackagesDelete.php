<?php

namespace App\Http\Livewire\Packages;

use App\Models\Notification;
use App\Models\Package;
use Livewire\Component;

class PackagesDelete extends Component
{
    public $package;
    function mount($package_id)
    {
        $package = Package::findOrFail($package_id);
        $this->package = $package->toArray();
    }

    public function delete()
    {
        $package = Package::where('id',$this->package['id'])->delete();
        $notification = Notification::where('package_id', $this->package['id'])->delete();

        $this->emit('refreshComments');
        $this->emit('alertSuccess', __('Package removed successfully'));
        $this->emit('refreshPackages');
    }

    public function render()
    {
        return view('livewire.packages.packages-delete');
    }
}
