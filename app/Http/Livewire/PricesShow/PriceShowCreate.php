<?php

namespace App\Http\Livewire\PricesShow;
use Illuminate\Support\Str;
use App\Models\Notification;
use App\Models\Price;
use App\Models\Currency;
use Livewire\Component;

class PriceShowCreate extends Component
{

    public $price;
    public $currency;
    public function ProjectCreateOpenModal() // model
    {
        $this->dispatchBrowserEvent('updateSelect2');
    }
    public function store()
    {
        $data = $this->validate([
            'price.name' => 'required|string|min:5|max:250',
            'price.price' => 'required|integer',
            'price.Time' => 'required|string|min:3|max:50',
            'price.currency_id' => 'required|exists:currencies,id',
 
        ]);
        
   
        $this->token = str::random(20);
        $pricemodel = Price::create($data['price']);
        $message_en = 'A new Show Price And Answer has been added' . ' ' . '('.$pricemodel->name.')';
        $this->emit('alertSuccess');
        Notification::create([
            'title' => $pricemodel->name,
            'message' => $message_en,
            'message_en' => $message_en,
            'user_id' => auth()->id(),
            'price_id' => $pricemodel->id,
            'token' => $this->token,
        ]);
        unset($this->price);
        $this->emit('refreshPriceAdmin');
        return redirect()->back();
    }

    public function render()
    {
        $this->dispatchBrowserEvent('updateSelect2');
        $allcurrency = Currency::all();
        return view('livewire.prices-show.price-show-create',compact('allcurrency'));
    }
}
