<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Service;
class AllServices extends Component
{
    public $services;
    public function mount(){
        $this->services  = Service::all();
       

    }
    public function render()
    {
        
        return view('livewire.frontend.all-services')->layout('layouts.frontend.layout-frontend');
    }
}
