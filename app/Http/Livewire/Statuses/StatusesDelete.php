<?php

namespace App\Http\Livewire\Statuses;

use App\Models\Status;
use Livewire\Component;

class StatusesDelete extends Component
{
    public $status;
    function mount($status_id)
    {
        $status = Status::findOrFail($status_id);
        $this->status = $status->toArray();
    }

    public function delete()
    {
        $status = Status::where('id',$this->status['id'])->delete();

        $this->emit('alertSuccess', __('Status removed successfully'));
        $this->emit('refreshStatuses');
        return $this->redirect(route('admin.statuses'));
    }

    public function render()
    {
        return view('livewire.statuses.statuses-delete');
    }
}
