<?php

namespace App\Http\Livewire\PriceServices;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Notification;
use App\Models\Price;
use App\Models\PricesService;
class PriceServeceEdit extends Component
{
    public $priceservec=[];
    public function mount($priceservice_id){
      $this->priceservice_id = $priceservice_id;
        $priceservec = PricesService::findOrFail($priceservice_id);
        $this->priceservec = $priceservec->toArray();
        $this->update($priceservice_id);
        
    }
    public function PriceServiceEditOpenModal() // model
    {
        $this->dispatchBrowserEvent('updateSelect2');
    }
    public function update()
    {
        $data = $this->validate([
            'priceservec.name' => 'required|string|min:5|max:250',
            'priceservec.price_id' => 'required|integer||exists:prices,id',
            'priceservec.activating' => 'required|integer|in:0,1',
 
        ]);

 
        $priceservices = PricesService::find($this->priceservec['id']);
        $priceservices->update($this->priceservec);
        $message_ar = 'تم تعديل قسم' . ' ' . '('.$priceservices['name'].')';
        $notification = Notification::where('price_service_id', $priceservices['id']);
        $notification->update([
            'title' => $priceservices['name'],
            'title_en' => $priceservices['name_en'],
            'message' => $message_ar,
            'message_en' => $message_ar,
            'user_id' => auth()->id(),
        ]);
        unset($this->priceservec['created_at']);
        $this->emit('alertSuccess');
        $this->emit('refreshPriceServicesAdmin');
        $this->emit('refreshShowPriceFront');


    }

    public function render()
    {
        $this->dispatchBrowserEvent('updateSelect2');
        $prices= Price::all();
        return view('livewire.price-services.price-servece-edit',compact('prices'));
    }
}
