<?php

namespace App\Http\Livewire\Carts;

use App\Models\Cart;
use App\Models\Package;
use Illuminate\Routing\Route;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class CartsCreate extends Component
{
    public $service , $package;
    protected $listeners = ['refreshApplicantCreate'];

    public function mount($package_id)
    {
        $this->package= Package::find($package_id);
    }

    public function store()
    {
        if(auth()->check()) {
            Cart::create([
                'user_id' => auth()->id(),
                'package_id' => $this->package->id,
                'service_id' => $this->package->service->id,
                'price_after' => $this->package->price_after,
            ]);
        }
        if (auth()->user()->hasRole('Admin')) {
            return redirect()->route('admin.carts');
        } else {
            return redirect()->route('carts');
        }
    }

    public function render()
    {
        return view('livewire.carts.carts-create');
    }
}
