<?php

namespace App\Livewire\Super;

use App\Models\User;
use Livewire\Component;

class AddUser extends Component
{
    public $showAlert = false;
    public $name, $email, $password, $role;
    public function store() {
        $fields = $this->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);
        User::create($fields);
        session()->flash('success', 'User created successfully');
        $this->showAlert = true;
        return $this->redirect(route('super.users'), navigate: true);
    }

    public function render()
    {
        return view('livewire.super.add-user');
    }
}
