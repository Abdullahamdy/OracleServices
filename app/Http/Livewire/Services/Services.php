<?php

namespace App\Http\Livewire\Services;

use App\Models\Service;
use Livewire\Component;
use Livewire\WithPagination;

class Services extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = '';
    protected $listeners = ['refreshServices' => 'ActionRefreshServices'];

    public function ActionRefreshServices()
    {

    }

    public function mount()
    {
        if (request('search')){
            $this->search = request('search');
        }

        if ((request('status') or request('from') or request('to') or array_key_exists(request('status'),Service::statusList(false))) and !auth()->user()->hasRole('Admin')) {
            abort(403);
        }
    }

    public function render()
    {
        $services = Service::query();

        if (!auth()->user()->hasRole('Admin')) {
            $services = $services->where('status', 1)->where('role_id','LIKE','%%"'.auth()->user()->roles()->first()->id.'"%%');
        }

        if ($this->search) {
            $services = $services->where(function ($q) {
                return $q->where('name', 'LIKE', "%$this->search%");
                    
            });
        }

        $services = $services->orderBy('status', 'DESC')->orderBy('created_at', 'DESC')->paginate(9);
        return view('livewire.services.services', compact('services'))->layout('layouts.app');
    }
}
