<?php

namespace App\Http\Livewire\PricesShow;

use Livewire\Component;
use App\Models\Notification;
use App\Models\Price;
class PriceShowDelete extends Component
{
    
    public $price; 
    function mount($price_id)
    {
        $price = Price::findOrFail($price_id);
        $this->price = $price->toArray();
    }

    public function delete()
    {
        $priceedit = Price::where('id',$this->price['id'])->delete();
        $notification = Notification::where('price_id', $this->price['id'])->delete();

        $this->emit('alertSuccess','Price removed successfully');
        $this->emit('refreshPriceAdmin');
        return redirect()->route('admin.admin');
    }
    public function render()
    {
        return view('livewire.prices-show.price-show-delete');
    }
}
