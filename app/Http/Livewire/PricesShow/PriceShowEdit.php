<?php

namespace App\Http\Livewire\PricesShow;

use Livewire\Component;
use App\Models\Currency;
use App\Models\Notification;
use App\Models\Price;
class PriceShowEdit extends Component
{
    public $price=[];
    public function mount($price_id){
      $this->price_id = $price_id;
     
        $price = Price::findOrFail($price_id);
        $this->price = $price->toArray();
        $this->update($price_id);
        
    }
    public function PriceEditOpenModal() // model
    {
        $this->dispatchBrowserEvent('updateSelect2');
    }
    public function update()
    {
        $data = $this->validate([
            'price.name' => 'required|string|min:5|max:250',
            'price.price' => 'required|integer',
            'price.Time' => 'required|string|min:3|max:50',
            'price.currency_id' => 'required|exists:currencies,id',
        ]);

 
        $price = Price::find($this->price['id']);
        $price->update($this->price);
        $message_ar = 'تم تعديل قسم' . ' ' . '('.$price['name'].')';
        $notification = Notification::where('price_id', $price['id']);
        $notification->update([
            'title' => $price['name'],
            'title_en' => $price['name_en'],
            'message' => $message_ar,
            'message_en' => $message_ar,
            'user_id' => auth()->id(),
        ]);
        unset($this->price['created_at']);
        $this->emit('alertSuccess');
        $this->emit('refreshPriceAdmin');


    }

    public function render()
    {
        $this->dispatchBrowserEvent('updateSelect2');
        $allcurrency= Currency::all();
        return view('livewire.prices-show.price-show-edit',compact('allcurrency'));
    }
}
