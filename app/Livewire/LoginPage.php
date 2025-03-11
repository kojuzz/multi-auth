<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Login')]
class LoginPage extends Component
{
    public $showAlert = true;
    public $email;
    public $password;
    public $remember;

    public function login()
    {
        $fields = $this->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (Auth::attempt($fields, $this->remember)) {
            if (Auth::user()->role == 'super') {
                session()->flash('success', 'Welcome to super dashboard');
                $this->showAlert = true;
                return $this->redirect(route('super.dashboard'), navigate: true);   // reload ဖျောက်ရေးနည်း
            } elseif (Auth::user()->role == 'admin') {
                session()->flash('success', 'Welcome to admin dashboard');
                $this->showAlert = true;
                return $this->redirect(route('admin.dashboard'), navigate: true);
            } 
            else {
                return $this->redirect(route('home'), navigate: true);
            }
        } else {
            $this->addError('email', 'These credentials do not match our records.');
            session()->flash('failed', 'The provided credentials do not match our records.');
            $this->showAlert = true;
            return $this->redirect(route('login'), navigate: true);
        }
    }

    public function render()
    {
        return view('livewire.login-page');
    }
}
