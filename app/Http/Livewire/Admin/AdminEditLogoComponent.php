<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Logo;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class AdminEditLogoComponent extends Component
{
    use WithFileUploads;

    public $logo_id;
    public $logo;
    public $fab_icon;

    public function mount($logo_id)
    {
        $logo = Logo::where('id',$logo_id)->first();
        $this->logo = $logo->logo;
        $this->fab_icon = $logo->fab_icon;
        $this->logo_id = $logo->id;
    }

    public $newlogo;
    public $newfab_icon;

    public function updateLogo()
    {
        $logo = Logo::find($this->logo_id);

        if($this->newlogo){

            if($logo->logo)
            {
                unlink(public_path('website/imgs/logo/'.$logo->logo));
            }

            $logoName = hexdec(uniqid()).'.'.$this->newlogo->getClientOriginalExtension();
            $this->newlogo->storeAs('logo',$logoName);

            $logo->logo = $logoName;

        }
        else
        {
            $logo->logo = $this->logo;
        }

        if($this->newfab_icon){

            if($logo->fab_icon)
            {
                unlink(public_path('website/imgs/logo/'.$logo->fab_icon));
            }

            $fab_iconName = hexdec(uniqid()).'.'.$this->newfab_icon->getClientOriginalExtension();
            $this->newfab_icon->storeAs('logo',$fab_iconName);

            $logo->fab_icon = $fab_iconName;

        }
        else
        {
            $logo->fab_icon = $this->fab_icon;
        }

        $logo->update();
        
        return redirect()->to('/admin/edit/log/1')->with('logo_update','Logo & Fabicon update has been successfully!');
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-logo-component')->layout('admin.layouts.base');
    }
}
