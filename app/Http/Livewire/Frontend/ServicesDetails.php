<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Service;
class ServicesDetails extends Component
{
    public $model;
    public function mount(Service $model)
    {
        $this->model = $model;
    }
 
    public function render()
    {
      
        return view('livewire.frontend.services-details')->layout('layouts.frontend.layout-frontend');
    }
}
