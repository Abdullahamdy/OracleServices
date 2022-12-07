<?php

namespace App\Http\Livewire\Carts;

use App\Models\Cart;
use Livewire\Component;

class CartsDelete extends Component
{
    public $cart;
    function mount($cart_id)
    {
        $cart = Cart::findOrFail($cart_id);
        $this->cart = $cart->toArray();
    }

    public function delete()
    {
        $cart = Cart::where('id',$this->cart['id'])->delete();

        $this->emit('refreshComments');
        $this->emit('alertSuccess', __('Cart removed successfully'));
        $this->emit('refreshCarts');
    }

    public function render()
    {
        return view('livewire.carts.carts-delete');
    }
}
