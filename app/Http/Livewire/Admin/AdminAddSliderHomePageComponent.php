<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\HomeSlider;

class AdminAddSliderHomePageComponent extends Component
{
    use WithFileUploads;

    public $image;
    public $subtitle;
    public $title1;
    public $title2;
    public $short_desc;
    public $link;
    public $status;

    public function mount()
    {
        $this->status = 0;
    }

    public function update($fields)
    {
        $this->validateOnly($fields,[
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'subtitle' => 'required',
            'title1' => 'required',
            'title2' => 'required',
            'short_desc' => 'required',
            'link' => 'required'
        ]);
    }

    public function addSliderHome()
    {
        $this->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'subtitle' => 'required',
            'title1' => 'required',
            'title2' => 'required',
            'short_desc' => 'required',
            'link' => 'required'
        ]);

        $slider = new HomeSlider();

        if($this->image)
        {
            $imgname = hexdec(uniqid()).".".$this->image->getClientOriginalExtension();
            $this->image->storeAs('slider',$imgname);
            $slider->image = $imgname;
        }

        $slider->subtitle = $this->subtitle;
        $slider->title1 = $this->title1;
        $slider->title2 = $this->title2;
        $slider->short_desc = $this->short_desc;
        $slider->link = $this->link;
        $slider->status = $this->status;
        $slider->save();

        return redirect()->route('admin.sliderhomepage')->with('message', 'Slider add has been successfully!');

    }

    public function render()
    {
        return view('livewire.admin.admin-add-slider-home-page-component')->layout('admin.layouts.base');
    }
}
