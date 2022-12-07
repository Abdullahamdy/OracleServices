<?php

namespace App\Http\Livewire\PriceServices;

use Livewire\Component;
use App\Models\Notification;
use App\Models\PricesService;
class PriceServeceDelete extends Component
{
    public $priceservec; 
    function mount($priceservice_id)
    {
        $priceservec = PricesService::findOrFail($priceservice_id);
        $this->priceservec = $priceservec->toArray();
    }

    public function delete()
    {
        $priceservec = PricesService::where('id',$this->priceservec['id'])->delete();
        $notification = Notification::where('price_service_id', $this->priceservec['id'])->delete();

        $this->emit('alertSuccess','Price Service removed successfully');
        $this->emit('refreshPriceServicesAdmin');
        $this->emit('refreshShowPriceFront');
        return redirect()->route('admin.admin');
    }
    public function render()
    {
        return view('livewire.price-services.price-servece-delete');
    }
}
