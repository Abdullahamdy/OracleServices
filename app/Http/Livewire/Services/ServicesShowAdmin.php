<?php

namespace App\Http\Livewire\Services;

use App\Models\Service;
use Livewire\Component;

class ServicesShowAdmin extends Component
{
    public $service=[], $applicant=[];
    protected $listeners = [
        'refreshServicesShowAdmin' => 'ActionRefreshServicesShowAdmin'
    ];

    public function ActionRefreshServicesShowAdmin()
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

    public function in_active($service_id)
    {
        $applicants = Service::findOrFail($service_id);
        if ($applicants->status == 1) {
            $applicants->update(['status' => 0]);
        } else {
            $applicants->update(['status' => 1]);
        }

        $this->emit('refreshServicesShowAdmin');
        return $this->redirect(route('admin.services.show',['token' => $this->service['token']]));
    }

    public function render()
    {
        return view('livewire.services.services-show-admin')->layout('layouts.app-admin');
    }
}
