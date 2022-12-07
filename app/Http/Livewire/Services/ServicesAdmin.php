<?php

namespace App\Http\Livewire\Services;

use App\Models\Service;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class ServicesAdmin extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = '', $Status, $status, $role_id, $from, $to;
    protected $listeners = ['refreshServicesAdmin' => 'ActionRefreshServicesAdmin'];

    public function ActionRefreshServicesAdmin()
    {

    }

    public function mount()
    {
        if (request('search')){
            $this->search = request('search');
        }

        $this->from = date('2022-01-01');
        $this->to = date('2024-01-01');

        $this->from = date('Y-m-d', strtotime($this->from));
        $this->to = date('Y-m-d', strtotime($this->to));

        if (request('from')) {
            $this->from = request('from');
        }

        if (request('to')) {
            $this->to = request('to');
        }

        if (array_key_exists(request('status'),Service::statusList(false))){
            $this->status = request('status');
        }

        if ((request('status') or request('from') or request('to') or array_key_exists(request('status'),Service::statusList(false))) and !auth()->user()->hasRole('Admin')) {
            abort(403);
        }

        if (request('role_id')){
            if (auth()->user()->hasRole('Admin')) {
                $this->role_id = request('role_id');
            } else {
                abort(403);
            }
        }
    }

    public function Status($id)
    {
        $this->Status = $id;
    }

    public function in_active($service_id)
    {
        $service = Service::findOrFail($service_id);
        if ($service->status == 1) {
            $service->update(['status' => 0]);
        } else {
            $service->update(['status' => 1]);
            $message = __('تمت اضافة خدمة') . ' ' . '('.$service->name.')' . ' ' . __('بواسطة') . ' ' . auth()->user()->name;
            $users = User::whereHas('roles', function ($q) use($service) {
                return $q->whereIn('id', json_decode($service->role_id));
            })->get();
            foreach ($users as $user) {
                if($user and auth()->id() != $user->id) {
                    $user->email(__('تمت اضافة خدمة') . ' ' . '('.$service->name.')', view('emails.service-email',['service' => $service ,'data' => $message])->render());
                }
            }
        }

        $this->emit('refreshServicesAdmin');
        $this->emit('alertSuccess');
        return $this->redirect(route('admin.admin'));
    }

    public function active($service_id)
    {
        $status = '0';

        $service = Service::findOrFail($service_id);
        $service->status = $status;
        $service->save();

        session()->flash('success', 'service successfully Active ');
        $this->emit('refreshServicesAdmin');
    }

    public function render()
    {
        $services = Service::query();
        $roles = Role::all();

        if (!auth()->user()->hasRole('Admin')) {
            $services = $services->where('status', 1)->where('role_id','LIKE','%%"'.auth()->user()->roles()->first()->id.'"%%');
        }

        if ($this->search) {
            $services = $services->where(function ($q) {
                return $q->where('name', 'LIKE', "%$this->search%")
                    ->orWhereHas('role', function ($query) {
                        $query->where('name', 'LIKE', "%$this->search%");
                    });
            });
        }

        if (array_key_exists($this->status, Service::statusList(false)) and auth()->user()->hasRole('Admin')) {
            $services = $services->where('status', $this->status);
        }

        if ($this->role_id and auth()->user()->hasRole('Admin')) {
            $services = $services->where('role_id','LIKE','%%"'.$this->role_id.'"%%');
        }

        if ($this->from and $this->to and auth()->user()->hasRole('Admin')) {
            $services = $services->where(function ($q){
                return $q->whereBetween('begin', [$this->from.' 00:00:00', $this->to.' 23:59:59'])->orWhereBetween('end', [$this->from.' 00:00:00', $this->to.' 23:59:59']);
            });
        }

        $services = $services->orderBy('status', 'DESC')->orderBy('created_at', 'DESC')->paginate(9);
        return view('livewire.services.services-admin', compact('services', 'roles'))->layout('layouts.app-admin');
    }
}
