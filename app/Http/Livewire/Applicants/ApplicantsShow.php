<?php

namespace App\Http\Livewire\Applicants;

use App\Models\Cart;
use App\Models\Type;
use Livewire\Component;

class ApplicantsShow extends Component
{
    public $applicant=[];
    protected $listeners = ['refreshShow' => 'ActionRefreshShow'];

    function mount($applicant_id)
    {
        $this->applicant = Cart::where('id', $applicant_id)->firstOrfail();
    }

    public function ActionRefreshShow()
    {

    }

    public function render()
    {
        $types = Type::all();
        return view('livewire.applicants.applicants-show', compact('types'))->layout('layouts.app');
    }
}
