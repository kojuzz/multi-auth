<?php

namespace App\Livewire\Partials;

use Livewire\Component;

class DarkModeToggle extends Component
{
    
    public $darkMode;    
    public function mount()
    {
        $this->darkMode = session('dark_mode', false);
    }

    public function toggleDarkMode()
    {
        $this->darkMode = !$this->darkMode;
        session(['dark_mode' => $this->darkMode]);
        $this->dispatch('dark-mode-toggled', darkMode: $this->darkMode);
    }

    public function render()
    {
        return view('livewire.partials.dark-mode-toggle');
    }
}
