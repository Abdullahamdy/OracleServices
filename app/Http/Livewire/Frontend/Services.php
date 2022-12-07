<?php

namespace App\Http\Livewire\Frontend;
use Livewire\Component;

class Services extends Component
{
    public  $collection;
    public function moune($collection)
    {     
    }
    public function render()
    {
        return view('livewire.frontend.services');
    }
  
}
