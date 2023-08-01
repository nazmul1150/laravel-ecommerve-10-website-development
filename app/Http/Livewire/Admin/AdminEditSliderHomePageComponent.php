<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\HomeSlider;

class AdminEditSliderHomePageComponent extends Component
{
    use WithFileUploads;

    public $sliderhome_id;
    public $image;
    public $newimage;
    public $subtitle;
    public $title1;
    public $title2;
    public $short_desc;
    public $link;
    public $status;

    public function mount($sliderhome_id)
    {
        $slider = HomeSlider::where('id',$sliderhome_id)->first();
        $this->image = $slider->image;
        $this->subtitle = $slider->subtitle;
        $this->title1 = $slider->title1;
        $this->title2 = $slider->title2;
        $this->short_desc = $slider->short_desc;
        $this->link = $slider->link;
        $this->status = $slider->status;
        $this->sliderhome_id = $slider->id;
    }

    public function update($fields)
    {
        $this->validateOnly($fields,[
            'newimage' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'subtitle' => 'required',
            'title1' => 'required',
            'title2' => 'required',
            'short_desc' => 'required',
            'link' => 'required'
        ]);
    }

    public function updateSliderHome()
    {
        $this->validate([
            'newimage' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'subtitle' => 'required',
            'title1' => 'required',
            'title2' => 'required',
            'short_desc' => 'required',
            'link' => 'required'
        ]);

        $slider = HomeSlider::find($this->sliderhome_id);

        if($this->newimage)
        {
            if($slider->image)
            {
                unlink(public_path('website/imgs/slider/'.$slider->image));
            }

            $newimgname = hexdec(uniqid()).".".$this->newimage->getClientOriginalExtension();
            $this->newimage->storeAs('slider',$newimgname);
            $slider->image = $newimgname;
        }
        else
        {
            $slider->image = $this->image;
        }

        $slider->subtitle = $this->subtitle;
        $slider->title1 = $this->title1;
        $slider->title2 = $this->title2;
        $slider->short_desc = $this->short_desc;
        $slider->link = $this->link;
        $slider->status = $this->status;
        $slider->update();

        return redirect()->route('admin.sliderhomepage')->with('message', 'Slider update has been successfully!');

    }

    public function render()
    {
        return view('livewire.admin.admin-edit-slider-home-page-component')->layout('admin.layouts.base');
    }
}
