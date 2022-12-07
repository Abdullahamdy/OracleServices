<?php

namespace App\Http\Livewire\Statuses;

use App\Models\Status;
use Livewire\Component;
use Livewire\WithPagination;

class Statuses extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';
    protected $listeners = [
        'refreshStatuses' => 'ActionRefreshStatuses'
    ];

    public function ActionRefreshStatuses()
    {

    }

    public function mount()
    {
        if(!auth()->check() or !auth()->user()->hasRole('Admin')){
            abort(403);
        }

        if ( request('search')) {
            $this->search = request('search');
        }
    }

    public function render()
    {
        $statuses = Status::query();

        if ($this->search) {
            $statuses = $statuses->where('name', 'LIKE', "%$this->search%")
                ->orWhere('name_en', 'LIKE', "%$this->search%");
        }

        $statuses = $statuses->orderBy('created_at', 'DESC')->paginate(10);
        return view('livewire.statuses.statuses', compact('statuses'))->layout('layouts.app-admin');
    }
}
