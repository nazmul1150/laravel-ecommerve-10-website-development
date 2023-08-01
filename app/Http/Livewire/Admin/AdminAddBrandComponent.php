<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Brand;

class AdminAddBrandComponent extends Component
{
    public $name;
    public $status;

    public function mount()
    {
        $this->status = 0;
    }

    public function update($fields)
    {
        $this->validateOnly($fields,[
            'name'=> 'required',
        ]);
    }

    public function addBrand()
    {
        $this->validate([
            'name'=> 'required',
        ]);

        $brand = new Brand();

        $brand->name = $this->name;
        $brand->slug = strtolower(str_replace(' ','-',$this->name));
        $brand->status = $this->status;
        $brand->save();

        return redirect()->route('admin.brand')->with('message', 'Brand Added Succesfully!');
    }

    public function render()
    {
        return view('livewire.admin.admin-add-brand-component')->layout('admin.layouts.base');
    }
}
