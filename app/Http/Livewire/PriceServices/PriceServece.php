<?php

namespace App\Http\Livewire\PriceServices;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\PricesService;
class PriceServece extends Component
{
          
    use WithPagination;
    public $search = '';
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['refreshPriceServicesAdmin' => 'ActionRefreshPriceServices'];

    public function ActionRefreshPriceServices()
    {

    }
    public function mount()
    {
        if (request('search')){ 
            
            $this->search = request('search');
        }
    }

    public function refreshPriceServicesAdmin()
    {

    }
    public function render()
    {
        $priceservec = PricesService::query();
        if ($this->search) {
            $priceservices = $priceservec->where(function ($q) {
                return $q->where('name', 'LIKE', "%$this->search%");       
            });
           
        }
        $priceservices = $priceservec->paginate(9);
        return view('livewire.price-services.price-servece',compact('priceservices'));
    }

    public function in_active($priceseve_id)
    {
        $model = PricesService::findOrFail($priceseve_id);


        if ($model->activating == 1) {
            
            
            $model->update(['activating' => '0']);
        } else {
            
            
            $model->update(['activating' => '1']);
          
        }

        $this->emit('refreshPriceServicesAdmin');
        $this->emit('refreshShowPriceFront');
       
        
        $this->emit('alertSuccess');
       
    }

}
