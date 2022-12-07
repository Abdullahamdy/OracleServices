<?php

namespace App\Http\Livewire\TelescopeEmails;

use App\Models\TelescopeEmail;
use Livewire\Component;
use Livewire\WithPagination;

class TelescopeEmails extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'refreshTelescopeEmailList' => 'ActionRefreshTelescopeEmailList'
    ];

    public function ActionRefreshTelescopeEmailList()
    {

    }

    public function render()
    {
        $telescope_emails = TelescopeEmail::paginate(5);
        return view('livewire.telescope-emails.telescope-emails', compact('telescope_emails'))->layout('layouts.app-admin');
    }
}
