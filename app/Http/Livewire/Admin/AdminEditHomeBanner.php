<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\HomeBanner;

class AdminEditHomeBanner extends Component
{
    use WithFileUploads;

    public $banner_id;
    public $image;
    public $newimage;
    public $subtitle;
    public $title1;
    public $title2;
    public $link_name;
    public $link;
    public $status;

     public function mount($banner_id)
    {
        $banner = HomeBanner::where('id',$banner_id)->first();
        $this->image = $banner->image;
        $this->subtitle = $banner->subtitle;
        $this->title1 = $banner->title1;
        $this->title2 = $banner->title2;
        $this->link_name = $banner->link_name;
        $this->link = $banner->link;
        $this->status = $banner->status;
        $this->banner_id = $banner->id;
    }

    public function update($fields)
    {
        $this->validateOnly($fields,[
            'newimage' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'subtitle' => 'required',
            'title1' => 'required',
            'title2' => 'required',
            'link_name' => 'required',
            'link' => 'required'
        ]);
    }

    public function updateHomebanner()
    {
        $this->validate([
            'newimage' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'subtitle' => 'required',
            'title1' => 'required',
            'title2' => 'required',
            'link_name' => 'required',
            'link' => 'required'
        ]);

        $banner = HomeBanner::find($this->banner_id);

        if($this->newimage)
        {
            if($bannerbanner->image)
            {
                unlink(public_path('website/imgs/banner/'.$banner->image));
            }

            $newimgname = hexdec(uniqid()).".".$this->newimage->getClientOriginalExtension();
            $this->newimage->storeAs('slider',$newimgname);
            $banner->image = $newimgname;
        }
        else
        {
            $banner->image = $this->image;
        }

        $banner->subtitle = $this->subtitle;
        $banner->title1 = $this->title1;
        $banner->title2 = $this->title2;
        $banner->link_name = $this->link_name;
        $banner->link = $this->link;
        $banner->status = $this->status;
        $banner->update();

        //return redirect()->route('admin.homepage')->with('home_banner', 'Banner update has been successfully!');
        return redirect();

    }

    public function render()
    {
        return view('livewire.admin.admin-edit-home-banner')->layout('admin.layouts.base');
    }
}
