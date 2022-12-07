<?php

namespace App\Http\Livewire\Carts;

use App\Models\Cart;
use Livewire\Component;
use Livewire\WithPagination;

class CartsAdmin extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $service;
    protected $listeners = ['refreshCarts'];

    function mount()
    {

    }

    public function refreshCarts()
    {

    }

    public function change_status($cart_id)
    {
        $cart = Cart::where('id', $cart_id)->where('status', 0)->update(['status' => 1]);
        $this->emit('alertSuccess', 'تم الدفع بنجاح');
        $this->redirect(route('admin.applicants'));
    }

    public function render()
    {
        $carts = Cart::whereIn('status', [0])->paginate(10);
        return view('livewire.carts.carts-admin', compact('carts'))->layout('layouts.app-admin');
    }
}
