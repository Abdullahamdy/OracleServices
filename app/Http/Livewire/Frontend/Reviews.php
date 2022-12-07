<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\CustomerReview;
class Reviews extends Component
{
    public $reviews;
    public $i;
    public function mount(){
        $this->reviews = CustomerReview::get();
    }
    public function render()
    {
        return view('livewire.frontend.reviews')->layout('layouts.frontend.layout-frontend');;
    }

   
}
