<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class EditProfile extends Component
{

    protected $listeners = ['refreshUserProfile' => 'refreshUserProfileFunction'];

    public $user,$roles = [],$permissions = [],$selectedPermissions = [];

    public function refreshUserProfileFunction()
    {

    }

    public function updatedUserRoleId($role_id)
    {

    }

    public function mount()
    {

        $user = User::findOrFail(auth()->id());
        $this->user = $user->toArray();
        $this->user['password'] = '';
     }

    public function update()
    {

        $user = $this->validate([
            'user.id' => 'required|numeric',
            'user.name' => 'required|min:6',
            'user.email' => 'required|email|unique:' . User::class . ',email,'.$this->user['id'],
            'user.password' => 'min:6|confirmed',
            'user.mobile' => '',
            'user.birth_date' => '',
            'user.country' => '',
        ]);

//        if($this->user['email'] == "admin@email.com"){
//            dd("Can't update super user");
//        }

        if(empty($user['user']['mobile'])) {
            $user['user']['mobile'] = null;
        }

        if(empty($user['user']['birth_date'])) {
            $user['user']['birth_date'] = null;
        }


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
            CURLOPT_POSTFIELDS => array('name' => $this->user['name'],'mobile' => $this->user['mobile'],'country' => $this->user['country'],'birth_date' => $this->user['birth_date'],'email' => $this->user['email'],'password' => $this->user['password'], 'avatar' => $this->user['image']),
            CURLOPT_HTTPHEADER => array(
                'token: 564sdasd56as4d6as5d46a5s4',
                'api_token: '.auth()->user()->token,
                'Accept: application/json',
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);

        $json = json_decode($response);

        if (empty($user['user']['password']) or $user['user']['password'] == "") {
            unset($user['user']['password']);
        } else {
            $user['user']['password'] = Hash::make($user['user']['password']);
        }

        $user_update = User::where('id',auth()->id())->first();
        if($user_update) {
            $user_update->update($user['user']);
        }

        $this->emit('refreshProfile');
        $this->dispatchBrowserEvent('close-modal');
        $this->emit('alertSuccess', __('Your profile has been updated successfully'));
    }

    public function render()
    {
        return view('livewire.edit-profile');
    }
}
