<?php

namespace App\Http\Livewire\OperationServices;

use Livewire\Component;
use App\Models\OperationsService;
use App\Models\Notification;
class OperationServiceDelete extends Component
{
    public $operationservece ; 

    function mount($operation_id)
    {
        $operationservece = OperationsService::findOrFail($operation_id);
        $this->operationservece = $operationservece->toArray();
    }

    public function delete()
    {
        $operationservece = OperationsService::where('id',$this->operationservece['id'])->delete();
         $notification = Notification::where('operation_servic_id', $this->operationservece['id'])->delete();

        $this->emit('alertSuccess', __('Operation removed successfully'));
        $this->emit('refreshOperationAdmin');
        return redirect()->route('admin.admin');
    }
    public function render()
    {
        return view('livewire.operation-services.operation-service-delete');
    }
}
