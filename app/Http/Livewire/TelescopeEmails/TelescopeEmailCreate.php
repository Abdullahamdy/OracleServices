<?php

namespace App\Http\Livewire\TelescopeEmails;

use App\Models\TelescopeEmail;
use Livewire\Component;

class TelescopeEmailCreate extends Component
{
    public $telescope_emails;

    public function store()
    {
        $data = $this->validate([
            'telescope_emails.user_id' => 'required|int|exists:users,id|unique:telescope_emails,user_id',
        ]);

        $telescope_email = TelescopeEmail::create($data['telescope_emails']);

        $this->emit('refreshTelescopeEmailList');
        $this->dispatchBrowserEvent('close-modal');
        $this->reset('telescope_emails');
    }

    public function render()
    {
        return view('livewire.telescope-emails.telescope-email-create');
    }
}
