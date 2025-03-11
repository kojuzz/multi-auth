<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Password extends Component
{
    public $showAlert = false;
    public $user;
    public $password;
    public $new_password;
    public $password_confirmation;

    public function mount() {
        $this->user = Auth::user();
    }
    public function changePassword() {
        $this->validate([
            'password' => 'required',
            'new_password' => 'required',
            'password_confirmation' => 'required|same:new_password',
        ]);
        if (Hash::check($this->password, $this->user->password)) {
            $this->user->update([
                'password' => Hash::make($this->new_password)
            ]);
            $this->reset(['password', 'new_password', 'password_confirmation']);
            session()->flash('update', 'Password Updated Successfully.');            
            $this->showAlert = true;
            return $this->redirect(route($this->user->role . '.dashboard'), navigate: true);
        } else {
            $this->reset(['password', 'new_password', 'password_confirmation']);
            session()->flash('failed', 'The provided old password does not match our records.');
            $this->showAlert = true;
        }
    }
    public function render()
    {
        return view('livewire.auth.password');
    }
}
