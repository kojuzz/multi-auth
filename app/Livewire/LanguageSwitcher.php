<?php

namespace App\Livewire;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class LanguageSwitcher extends Component
{
    public $currentLanguage;

    public function mount()
    {
        $this->currentLanguage = Session::get('locale', App::getLocale());
    }

    public function switchLanguage($lang)
    {
        Session::put('locale', $lang);
        App::setLocale($lang);
        $this->currentLanguage = $lang;
        return $this->redirect(back()->getTargetUrl(), navigate: true);
    }    
    public function render()
    {
        return view('livewire.language-switcher');
    }
}
