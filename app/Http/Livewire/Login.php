<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Login extends Component
{
    public $user;

    public function mount()
    {
        if (auth()->check()) {
            auth()->logout();
            return $this->redirect('login');
        }
    }

    public function login()
    {
        $user = $this->validate([
            'user.email' => 'required|email',
            'user.password' => 'required|min:6',
        ]);

        if (auth()->attempt($user['user'])) {

            $user = User::where('id', auth()->id())->first();

            if($user->status  != 1){
                if($user->status  == "2") {
                    $this->addError('email'," تم حظر حسابك من قبل الادارة");
                }else{
                    $this->addError('email', "هذا الحساب معلق حاليا");
                }
                auth()->logout();
                return false;
            }

            return $this->redirect('/');
        } else {
            $this->addError("user.email", "خطأ في اسم المستخدم أو كلمة المرور");
        }
    }

    public function render()
    {
        return view('livewire.login');
    }
}
