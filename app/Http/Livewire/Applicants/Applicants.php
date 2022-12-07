<?php

namespace App\Http\Livewire\Applicants;

use App\Models\Cart;
use App\Models\Package;
use App\Models\Service;
use Livewire\Component;
use Livewire\WithPagination;

class Applicants extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = '', $Status, $package, $status,$service_id, $package_id;

    protected $listeners = ['refreshAllApplicants' => 'ActionRefreshAllApplicants'];

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
    }

    public function ProjectCreateOpenModal() // model
    {
        $this->dispatchBrowserEvent('updateSelect2');
    }

    public function ActionRefreshAllApplicants()
    {

    }

    public function render()
    {
        $applicants = Cart::query();
        $applicants = $applicants->where('user_id',auth()->id())->whereIn('status', [1,2,3,4,5,6]);

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

        $services = Service::where('status', 1)->where('role_id','LIKE','%%"'.auth()->user()->roles()->first()->id.'"%%')->get();
        $service_id = Service::where('status', 1)->where('role_id','LIKE','%%"'.auth()->user()->roles()->first()->id.'"%%')->pluck('id')->toArray();
        $packages = Package::whereIn('service_id', $service_id)->get();

        $applicants = $applicants->orderBy('created_at', 'DESC')->paginate(9);
        $all_applicants = Cart::where('user_id', auth()->id())->count();
        return view('livewire.applicants.applicants',compact('applicants','services','packages', 'all_applicants'))->layout('layouts.app');
    }
}
