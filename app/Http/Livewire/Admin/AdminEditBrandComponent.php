<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Brand;

class AdminEditBrandComponent extends Component
{
    public $name;
    public $status;
    public $brand_id;

    public function mount($brand_slug)
    {
        $brand = Brand::where('slug', $brand_slug)->first();
        $this->name = $brand->name;
        $this->status = $brand->status;
        $this->brand_id = $brand->id;
    }

    public function update($fields)
    {
        $this->validateOnly($fields,[
            'name'=> 'required',
        ]);
    }

    public function editBrand()
    {
        $this->validate([
            'name'=> 'required',
        ]);

        $brand = Brand::find($this->brand_id);

        $brand->name = $this->name;
        $brand->slug = strtolower(str_replace(' ','-',$this->name));
        $brand->status = $this->status;
        $brand->save();

        return redirect()->route('admin.brand')->with('message', 'Brand Update Succesfully!');
    }
    public function render()
    {
        return view('livewire.admin.admin-edit-brand-component')->layout('admin.layouts.base');
    }
}
