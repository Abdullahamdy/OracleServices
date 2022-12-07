<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\OrederServices;
class OrderService extends Component

{
    public $order;

    public function store(){
        $data = $this->validate([
            'order.servece_type'=>'required|string|min:3|max:50',
            'order.country'=>'required|string|min:3|max:50',
            'order.calling_phone'=>'required|string |min:10|max:12',
            'order.whatsapp'=>'required|string |min:10|max:12',
            'order.name'=>'required|string|min:3|max:50',
            'order.email'=>'required|email|max:100',
            'order.phone'=>'required|string|min:10|max:12',
            'order.message'=>'required|string|min:5|max:1000',
        ]);
        $order = OrederServices::create($data['order']);
        $this->emit('alertSuccess');
        unset($this->order);
        return redirect()->back();
    }
    public function render()
    {
        return view('livewire.frontend.order-service')->layout('layouts.frontend.layout-frontend');
    }
}
