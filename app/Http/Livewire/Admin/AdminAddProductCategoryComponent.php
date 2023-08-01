<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\ProductCategory;
use Livewire\WithFileUploads;

class AdminAddProductCategoryComponent extends Component
{
    use WithFileUploads;

    public $image;
    public $name;
    public $status;

    public function mount()
    {
        $this->status = 0;
    }

    public function update($fields)
    {
        $this->validateOnly($fields,[
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'name'=> 'required',
        ]);
    }

    public function addProductCategory()
    {
        $this->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'name'=> 'required',
        ]);

        $category = new ProductCategory();

        if($this->image)
        {
            $imgname = hexdec(uniqid()).'.'.$this->image->getClientOriginalExtension();
            $this->image->storeAs('shop/category',$imgname);
            $category->image = $imgname;
        }

        $category->name = $this->name;
        $category->slug = strtolower(str_replace(' ','-',$this->name));
        $category->status = $this->status;
        $category->save();

        return redirect()->route('admin.product.category')->with('message', 'Category Added Succesfully!');
    }

    public function render()
    {
        return view('livewire.admin.admin-add-product-category-component')->layout('admin.layouts.base');
    }
}
