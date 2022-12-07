<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Price;
class ShowPrice extends Component
{
    public $showprices;


    protected $listeners = ['refreshShowPriceFront' => 'ActionRefreshShowPrice'];

    public function ActionRefreshShowPrice()
    {

    }
   

    public function refreshShowPrice()
    {

    }
    public function mount(){
        $this->showprices = Price::with('priceservices')->get();
    }
    public function render()
    {
        return view('livewire.frontend.show-price')->layout('layouts.frontend.layout-frontend');
    }
}
