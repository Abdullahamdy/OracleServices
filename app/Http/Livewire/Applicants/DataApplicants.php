<?php

namespace App\Http\Livewire\Applicants;

use App\Models\Cart;
use Livewire\Component;

class DataApplicants extends Component
{
    public $applicant=[];
    protected $listeners = ['refreshData' => 'ActionRefreshData'];

    function mount($applicant_id)
    {
        $this->applicant = Cart::where('id', $applicant_id)->firstOrfail();
    }

    public function ActionRefreshData()
    {

    }

    public function render()
    {
        return view('livewire.applicants.data-applicants')->layout('layouts.app');
    }
}
