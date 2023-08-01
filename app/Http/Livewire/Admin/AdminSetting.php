<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Setting;

class AdminSetting extends Component
{
    public $email;
    public $phone;
    public $phone2;
    public $address;
    public $map;
    public $twiter;
    public $facebook;
    public $pinterest;
    public $instagarm;
    public $youtube;

    public $setting_id;

    public function mount()
    {
        $setting = Setting::find(1);
        $this->email = $setting->email;
        $this->phone = $setting->phone;
        $this->phone2 = $setting->phone2;
        $this->address = $setting->address;
        $this->map = $setting->map;
        $this->twiter = $setting->twiter;
        $this->facebook = $setting->facebook;
        $this->pinterest = $setting->pinterest;
        $this->instagarm = $setting->instagarm;
        $this->youtube = $setting->youtube;
        $this->setting_id = $setting->id;
    }

    public function update($fields)
    {
        $this->validate($fields,[
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'map' => 'required'
        ]);
    }

    public function editSetting()
    {
        $this->validate([
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'map' => 'required'
        ]);

        $setting = Setting::find(1);
        $setting->email = $this->email;
        $setting->phone = $this->phone;
        $setting->phone2 = $this->phone2;
        $setting->address = $this->address;
        $setting->map = $this->map;
        $setting->twiter = $this->twiter;
        $setting->facebook = $this->facebook;
        $setting->pinterest = $this->pinterest;
        $setting->instagarm = $this->instagarm;
        $setting->youtube = $this->youtube;
        $setting->update();

        return redirect()->route('admin.setting')->with('message','Setting save successfully!');
    }

    public function render()
    {
        return view('livewire.admin.admin-setting')->layout('admin.layouts.base');
    }
}
