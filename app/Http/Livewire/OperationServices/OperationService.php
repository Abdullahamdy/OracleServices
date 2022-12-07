<?php

namespace App\Http\Livewire\OperationServices;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\OperationsService;
class OperationService extends Component
{
    use WithPagination;
    public $search = '';
    protected $paginationTheme = 'bootstrap';
    public $operationservece ; 
    protected $listeners = ['refreshOperationAdmin' => 'ActionRefreshOperation'];

    public function mount()
    {
        if (request('search')){ 
            
            $this->search = request('search');
        }
    }
    public function ActionRefreshOperation()
    {

    }

    public function refreshOperation()
    {

    }
    public function render()
    {
        $operation = OperationsService::query();
        if ($this->search) {
            $operations = $operation->where(function ($q) {
                return $q->where('name', 'LIKE', "%$this->search%");       
            });
           
        }
        $operations = $operation->paginate(9);
        return view('livewire.operation-services.operation-service',compact('operations'));
    }
}
