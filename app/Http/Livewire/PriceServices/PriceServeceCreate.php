<?php

namespace App\Http\Livewire\PriceServices;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Notification;
use App\Models\Price;
use App\Models\PricesService;
class PriceServeceCreate extends Component
{
    public $priceservec;
    public function ProjectCreateOpenModal() 
    {
        $this->dispatchBrowserEvent('updateSelect2');
    }
    public function store()
    {
        $data = $this->validate([
            'priceservec.name' => 'required|string|min:5|max:250',
            'priceservec.price_id' => 'required|integer||exists:prices,id',
            'priceservec.activating' => 'required|integer|in:0,1',
 
        ]);
        
   
        $this->token = str::random(20);
        $priceservices = PricesService::create($data['priceservec']);
        $message_en = 'A new Show Price Services And Answer has been added' . ' ' . '('.$priceservices->name.')';
        $this->emit('alertSuccess');
        Notification::create([
            'title' => $priceservices->name,
            'message' => $message_en,
            'message_en' => $message_en,
            'user_id' => auth()->id(),
            'price_service_id' => $priceservices->id,
            'token' => $this->token,
        ]);
        unset($this->priceservec);
        $this->emit('refreshPriceServicesAdmin');
        $this->emit('refreshShowPriceFront');
        return  redirect()->back();
    }

    public function render()
    {
        $this->dispatchBrowserEvent('updateSelect2');
        $prices = Price::all();
        return view('livewire.price-services.price-servece-create',compact('prices'));
    }
}
