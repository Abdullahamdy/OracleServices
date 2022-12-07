<?php

namespace App\Http\Livewire\Applicants;

use App\Models\Cart;
use Livewire\Component;

class ApplicantsPdf extends Component
{
    public  $applicant=[];
    protected $listeners = ['refreshPdf' => 'ActionRefreshPdf'];

    public function mount($applicant_id)
    {
        if(auth()->check() and auth()->user()->can('services edit carts')){
            $this->applicant = Cart::where('id', $applicant_id)->firstOrfail();
        } else {
            $this->applicant = Cart::where('user_id', auth()->id())->where('id', $applicant_id)->firstOrfail();
        }
    }

    public function render()
    {
        return view('livewire.applicants.applicants-pdf')->layout('layouts.applicant-pdf');
    }
}
