<?php

//namespace App\Http\Livewire\Carts;
//
//use App\Models\Cart;
//use Livewire\Component;
//
//class CartsEdit extends Component
//{
//    public $cart, $quantity = 1;
//    function mount($cart_id)
//    {
//        $cart = Cart::findOrFail($cart_id);
//        $this->cart = $cart->toArray();
//    }
//
//    public function increment()
//    {
//        $this->quantity++;
//    }
//
//    public function decrement()
//    {
//        $this->quantity--;
//    }
//
//    public function update()
//    {
//        $this->validate([
//            'quantity' => '',
//        ]);
//        unset($this->cart['created_at']);
//        unset($this->cart['updated_at']);
//
//        $cart = Cart::where('id',$this->cart['id'])->update($this->cart);
//
//        $this->emit('alertSuccess');
//        $this->emit('refreshApplicants');
//        $this->emit('refreshAllApplicantsAdmin');
//    }
//
//    public function render()
//    {
//        return view('livewire.carts.carts-edit');
//    }
//}
