<?php

namespace App\Http\Livewire\TelescopeEmails;

use App\Models\TelescopeEmail;
use Livewire\Component;

class TelescopeEmailDelete extends Component
{
    public $telescope_emails;

    public function mount($telescope_email_id)
    {
        $this->telescope_emails = TelescopeEmail::find($telescope_email_id);
    }

    public function delete()
    {
        $telescope_emails = TelescopeEmail::find($this->telescope_emails['id']);
        $telescope_emails->delete();

        $this->emit('refreshTelescopeEmailList');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function render()
    {
        return view('livewire.telescope-emails.telescope-email-delete');
    }
}
