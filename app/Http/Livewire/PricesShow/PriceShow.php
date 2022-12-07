<?php

namespace App\Http\Livewire\PricesShow;

use Livewire\Component;
use App\Models\Notification;
use App\Models\Currency;
use App\Models\Price;
use Livewire\WithPagination;
class PriceShow extends Component
{
       
    use WithPagination;
    public $search = '';
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['refreshPriceAdmin' => 'ActionRefreshPrice'];

    public function ActionRefreshPrice()
    {

    }
    public function mount()
    {
        if (request('search')){ 
            
            $this->search = request('search');
        }
    }

    public function refreshPrice()
    {

    }
    public function render()
    {
        $price = Price::query();
        if ($this->search) {
            $prices = $price->where(function ($q) {
                return $q->where('name', 'LIKE', "%$this->search%");       
            });
           
        }
        $prices = $price->paginate(9);
        return view('livewire.prices-show.price-show',compact('prices'));
    }
}
