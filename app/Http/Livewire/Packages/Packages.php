<?php

namespace App\Http\Livewire\Packages;

use App\Models\Cart;
use App\Models\Package;
use App\Models\Service;
use App\Models\Type;
use App\sections;
use Livewire\Component;

class Packages extends Component
{
    public $service , $price ,$type;
    protected $listeners = ['refreshPackages'];

    public function refreshPackages()
    {

    }

    public function mount($service_id)
    {
        $this->service= Service::find($service_id);
    }

    public function render()
    {
        $types = Type::all();
        return view('livewire.packages.packages',compact('types'));
    }
}
