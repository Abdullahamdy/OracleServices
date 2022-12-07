<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Avatar extends Component
{
    use WithFileUploads;

    protected $listeners = ['refreshAvatar' => '$refresh'];

    public $photo,$imageTemp, $user;

    public function mount()
    {

    }
    public function updatedPhoto()
    {
        $user = User::findOrFail(auth()->id());
        $this->user = $user->toArray();
        $this->user['password'] = '';
        $base64 = "";
        $type = "";

        if($this->photo) {

            $this->validate([
                'photo' => 'image|mimes:jpeg,png',
            ]);

            $path = $this->photo->store('avatar', 'public');
            $type = pathinfo(Storage::path('public/'.$path), PATHINFO_EXTENSION);
            $data = Storage::get('public/'.$path);
            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

        }

        $user1 = User::where('id',auth()->id())->first();

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => env('DeraSocialite_ACCOUNTS_URL').'/api/profile',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('avatar' => $base64, 'base64' => true, 'type' => $type),
            CURLOPT_HTTPHEADER => array(
                'token: 564sdasd56as4d6as5d46a5s4',
                'api_token: '.auth()->user()->token,
                'Accept: application/json',
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);

        $json = json_decode($response);
//        if (!empty($json) and !empty($json->avatar)) {
            $user1->image = $json->avatar;
            $user1->save();
//        }

        $this->emit('refreshAvatar');
        $this->emit('alertSuccess', __('Your profile has been updated successfully'));
    }

    public function render()
    {
        return view('livewire.avatar');
    }
}
