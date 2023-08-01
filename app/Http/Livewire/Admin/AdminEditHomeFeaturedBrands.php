<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\FeaturedBrands;
use Livewire\WithFileUploads;

class AdminEditHomeFeaturedBrands extends Component
{
    use WithFileUploads;

    public $featuredbrands_id;
    public $newimage;
    public $image;
    public $status;

     public function mount($featuredbrands_id)
    {
        $brand = FeaturedBrands::where('id',$featuredbrands_id)->first();
        $this->image = $brand->image;
        $this->status = $brand->status;
        $this->featuredbrands_id = $brand->id;
    }

    public function update($fields)
    {
        $this->validateOnly($fields,[
            'newimage' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);
    }

    public function editFeaturedBrands()
    {
        $this->validate([
            'newimage' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);

        $brands = FeaturedBrands::find($this->featuredbrands_id);

        if($this->newimage)
        {
            if($brands->image)
            {
                unlink(public_path('website/imgs/featured_brands/'.$brands->image));
            }

            $newimgname = hexdec(uniqid()).".".$this->newimage->getClientOriginalExtension();
            $this->newimage->storeAs('featured_brands',$newimgname);
            $brands->image = $newimgname;
        }
        else
        {
            $brands->image = $this->image;
        }

        $brands->status = $this->status;
        $brands->update();

        return redirect()->route('admin.homepage')->with('feature_brands', 'Featured Brands update has been successfully!');

    }

    public function render()
    {
        return view('livewire.admin.admin-edit-home-featured-brands')->layout('admin.layouts.base');
    }
}
