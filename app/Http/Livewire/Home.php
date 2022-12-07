<?php

namespace App\Http\Livewire;


use Livewire\Component;

class Home extends Component
{

    public $dashboard = [] ;

    public function mount(){

    }

    public function render()
    {
        return view('livewire.home')->layout('layouts.app');
    }
}
