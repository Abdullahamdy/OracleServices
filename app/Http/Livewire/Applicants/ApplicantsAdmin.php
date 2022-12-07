<?php

namespace App\Http\Livewire\Applicants;

use App\Models\Cart;
use App\Models\Package;
use App\Models\Service;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ApplicantsAdmin extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = '', $Status, $package, $status,$service_id, $package_id, $user_id;

    protected $listeners = ['refreshAllApplicantsAdmin' => 'ActionRefreshAllApplicantsAdmin'];

    public function mount()
    {
//        if (request('search')){
//            $this->search = request('search');
//        }

        if (request('service_id')){
            $this->service_id = request('service_id');
        }

        if (request('package_id')){
            $this->package_id = request('package_id');
        }

        if (request('user_id')){
            $this->user_id = request('user_id');
        }
    }

    public function ProjectCreateOpenModal() // model
    {
        $this->dispatchBrowserEvent('updateSelect2');
    }

    public function ActionRefreshAllApplicantsAdmin()
    {

    }

    public function Status($id)
    {
        $this->Status = $id;
    }

    public function new_applicant()
    {
        $status = '1';

        $applicants = Cart::findOrFail($this->Status);
        $applicants->status = $status;
        $applicants->save();

        session()->flash('success', 'Applicant successfully Acceptable ');
        $this->emit('refreshApplicants');
        $this->emit('refreshAllApplicantsAdmin');
        $this->emit('refreshData');
        $this->emit('refreshShow');
    }

    public function applicant_progress()
    {
        $status = '2';

        $applicants = Cart::findOrFail($this->Status);
        $applicants->status = $status;
        $applicants->save();

        session()->flash('success', 'Ad successfully Disabled ');
        $this->emit('refreshApplicants');
        $this->emit('refreshAllApplicantsAdmin');
        $this->emit('refreshData');
        $this->emit('refreshShow');
    }


    public function progress()
    {
        $status = '2';

        $applicants = Cart::findOrFail($this->Status);
        $applicants->status = $status;
        $applicants->save();

        session()->flash('success', 'Applicant successfully Acceptable ');
        $this->emit('refreshApplicants');
        $this->emit('refreshAllApplicantsAdmin');
        $this->emit('refreshData');
        $this->emit('refreshShow');
    }

    public function active_applicant()
    {
        $status = '3';

        $applicants = Cart::findOrFail($this->Status);
        $applicants->status = $status;
        $applicants->save();

        session()->flash('success', 'Edit  successfully Active Applicant ');
        $this->emit('refreshApplicants');
        $this->emit('refreshAllApplicantsAdmin');
        $this->emit('refreshData');
        $this->emit('refreshShow');
    }

    public function render()
    {
        $applicants = Cart::query();
        $applicants = $applicants->whereIn('status', [1, 2, 3, 4, 5, 6]);

//        if ($this->search) {
//            $applicants = $applicants->where(function ($q){
//                return $q->where('price_after', 'LIKE', "%$this->search%")
//                    ->orWhereHas('service', function ($query){
//                        $query->where('name', 'LIKE', "%$this->search%");
//                    })
//                    ->orWhereHas('package', function ($query){
//                        $query->where('name', 'LIKE', "%$this->search%");
//                    });
//            });
//        }

        if ($this->service_id) {
            $applicants = $applicants->whereIn('service_id', $this->service_id);
        }

        if ($this->package_id) {
            $applicants = $applicants->whereIn('package_id', $this->package_id);
        }

        if ($this->user_id) {
            $applicants = $applicants->whereIn('user_id', $this->user_id);
        }

        $services = Service::all();
        $packages = Package::all();
        $users = User::all();

        $applicants = $applicants->orderBy('created_at', 'DESC')->paginate(9);
        $all_applicants = Cart::count();
        return view('livewire.applicants.applicants-admin',compact('applicants','services','packages', 'users', 'all_applicants'))->layout('layouts.app-admin');
    }
}
