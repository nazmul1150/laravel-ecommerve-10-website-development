<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Logo;
use App\Models\Setting;

class FooterComponent extends Component
{
    public function render()
    {
        $logo = Logo::find(1);

        $setting = Setting::find(1);

        return view('livewire.footer-component',['logo'=>$logo,'setting'=>$setting]);
    }
}
