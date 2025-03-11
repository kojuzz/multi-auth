<?php

namespace App\Livewire\Super;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Dashboard')]
class Dashboard extends Component
{
    public $showAlert = true;
    public function render()
    {
        return view('livewire.super.dashboard');
    }
}
