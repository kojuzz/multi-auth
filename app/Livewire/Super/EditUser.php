<?php

namespace App\Livewire\Super;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class EditUser extends Component
{
    public $showAlert = false;
    public $user;
    public $new_password;
    public $password_confirmation;

    public function mount ($id) {
        $this->user = User::findOrFail($id);
    }

    public function change() {
        $this->validate([
            'new_password' => 'required',
            'password_confirmation' => 'required|same:new_password',
        ]);
        $this->user->update([
            'password' => Hash::make($this->new_password)
        ]);
        $this->reset(['new_password', 'password_confirmation']);
        session()->flash('update', 'Password Reset Successfully.');
        $this->showAlert = true;
    }
    public function status() {
        $this->user->status = !$this->user->status;
        $this->user->save();
        session()->flash('update', 'User Status Updated Successfully.');
        $this->showAlert = true;
        return $this->redirect(route('super.users'), navigate: true);
    }

    public function render()
    {
        return view('livewire.super.edit-user');
    }
}
