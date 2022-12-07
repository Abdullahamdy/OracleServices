<?php

namespace App\Http\Livewire\Frontend;
use App\Models\Service;
use App\Models\Category;
use App\Models\Contacts;
use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    public $search = '';
    public $category;
    public $users ;
    public $contact_us ;
    public $countservices;
    public function mount()
    {
        $this->countservices = Service::count();
        $this->category = Category::count();
        $this->contact_us = Contacts::count();
        $this->users = User::count();
        if (request('search')){                    
           $this->search = request('search');
        }
    }
    public function render()
    {   
        if ($this->search != '') {
            $service = Service::query();
            $services = $service->where(function ($q) {
                return $q->where('name', 'LIKE', "%$this->search%");       
            })->get();
           
        }else{
            $services = Service::all();

        }
        return view('livewire.frontend.index',compact('services'))->layout('layouts.frontend.layout-frontend');
    }
}
