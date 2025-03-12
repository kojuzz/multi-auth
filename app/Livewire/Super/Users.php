<?php

namespace App\Livewire\Super;

use App\Models\User;
use Livewire\Component;

class Users extends Component
{
    public $showAlert = true;
    public function render()
    {
        $users = User::where('role', '!=' ,'super')->get();
        return view('livewire.super.users', [
            'users' => $users
        ]);
    }
}
