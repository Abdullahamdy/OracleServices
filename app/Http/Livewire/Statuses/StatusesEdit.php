<?php

namespace App\Http\Livewire\Statuses;

use App\Models\Status;
use Livewire\Component;

class StatusesEdit extends Component
{
    public $status=[];
    function mount($status_id)
    {
        $status = Status::findOrFail($status_id);
        $this->status = $status->toArray();
    }

    public function update()
    {
        $this->validate([
            'status.name' => 'required|string|min:5|max:30|regex:/^[a-zA-Z-ا-ي]{1}/',
            'status.name_en' => 'required|string|min:5|max:30|regex:/^[a-zA-Z-ا-ي]{1}/',
        ]);
        unset($this->status['created_at']);
        unset($this->status['updated_at']);

        $status = Status::where('id',$this->status['id'])->update($this->status);

        $this->emit('refreshComments');
        $this->emit('alertSuccess');
        $this->emit('refreshStatuses');
    }

    public function render()
    {
        return view('livewire.statuses.statuses-edit');
    }
}
