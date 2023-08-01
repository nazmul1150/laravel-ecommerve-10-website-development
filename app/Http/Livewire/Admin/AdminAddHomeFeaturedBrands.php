<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\FeaturedBrands;
use Livewire\WithFileUploads;

class AdminAddHomeFeaturedBrands extends Component
{
    use WithFileUploads;

    public $image;
    public $status;

     public function mount()
    {
        
        $this->status = 0;
    }

    public function update($fields)
    {
        $this->validateOnly($fields,[
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);
    }

    public function addFeaturedBrands()
    {
        $this->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);

        $brands = new FeaturedBrands();

        $imgname = hexdec(uniqid()).".".$this->image->getClientOriginalExtension();
        $this->image->storeAs('featured_brands',$imgname);

        $brands->image = $imgname;
        $brands->status = $this->status;
        $brands->save();

        return redirect()->route('admin.homepage')->with('feature_brands', 'Featured Brands add has been successfully!');

    }

    public function render()
    {
        return view('livewire.admin.admin-add-home-featured-brands')->layout('admin.layouts.base');
    }
}
