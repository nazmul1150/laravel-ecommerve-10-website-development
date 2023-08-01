<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

use App\Models\HomeSlider;
use Livewire\WithPagination;

class AdminSliderHomePageComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function deleteSlider($id)
    {
        $slider = HomeSlider::find($id);
        if($slider->image)
        {
            unlink(public_path('website/imgs/slider/'.$slider->image));
        }
        $slider->delete();

        return redirect()->route('admin.sliderhomepage')->with('message','Slider delete has been successfully!');
    }

    public function render()
    {
        $home_sliders = HomeSlider::orderBy('id','DESC')->paginate(5);

        return view('livewire.admin.admin-slider-home-page-component',['home_sliders'=>$home_sliders])->layout('admin.layouts.base');
    }
}
