<?php

namespace App\Http\Livewire\Statuses;

use App\Models\Status;
use Livewire\Component;

class StatusesCreate extends Component
{
    public $status;
    function mount()
    {

    }

    public function store()
    {
        $this->validate([
            'status.name' => 'required|string|min:5|max:30|regex:/^[a-zA-Z-ا-ي]{1}/',
            'status.name_en' => 'required|string|min:5|max:30|regex:/^[a-zA-Z-ا-ي]{1}/',
        ]);
        unset($this->status['created_at']);
        unset($this->status['updated_at']);

        $status = Status::create($this->status);

        $this->emit('refreshStatuses');
        $this->emit('alertSuccess');
        unset($this->status);
    }

    public function render()
    {
        return view('livewire.statuses.statuses-create')->layout('layouts.app');
    }
}
