<?php

namespace App\Http\Livewire\Services;

use App\Models\Service;
use Livewire\Component;

class ServicesShow extends Component
{
    public $service=[], $applicant=[];
    protected $listeners = [
        'refreshServicesShow' => 'ActionRefreshServicesShow'
    ];

    public function ActionRefreshServicesShow()
    {

    }

    function mount($token)
    {
        if (auth()->user()->hasRole('Admin')) {
            $this->service = Service::where('token', $token)->firstOrfail();
        } else {
            $this->service = Service::where('role_id','LIKE','%%"'.auth()->user()->roles()->first()->id.'"%%')->where('token', $token)->first();
        }

        if(!$this->service or (!auth()->user()->hasRole('Admin') and !$this->service['status'] == 1)){
            abort(403);
        }
    }

    public function render()
    {
        return view('livewire.services.services-show')->layout('layouts.app');
    }
}
