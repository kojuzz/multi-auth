<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Profile extends Component
{
    public $showAlert = false;
    public $user;
    public $name;
    public $email;
    public $phone;
    public $address;

    public function mount() {
        $this->user = Auth::user();
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->phone = $this->user->phone;
        $this->address = $this->user->address;
    }

    public function update() {
        $fields = $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|string',
            'address' => 'required|string',
        ]);
        $this->user->update($fields);
        session()->flash('update', 'Profile updated successfully.');
        $this->showAlert = true;
    }

    public function render()
    {
        return view('livewire.auth.profile');
    }
}
