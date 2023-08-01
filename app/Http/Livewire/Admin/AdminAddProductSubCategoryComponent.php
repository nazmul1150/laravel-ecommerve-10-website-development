<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use Livewire\WithFileUploads;

class AdminAddProductSubCategoryComponent extends Component
{
    use WithFileUploads;

    public $image;
    public $name;
    public $category_id;
    public $status;
    
    public function mount()
    {
        $this->status = 0;
    }

    public function update($fields)
    {
        $this->validateOnly($fields,[
            'name'=> 'required',
            'category_id'=> 'required',
        ]);
    }

    public function addProductSubCategory()
    {
        $this->validate([
            'name'=> 'required',
            'category_id'=> 'required',
        ]);

        $subcategory = new ProductSubCategory();

        if($this->image)
        {
            $imgname = hexdec(uniqid()).'.'.$this->image->getClientOriginalExtension();
            $this->image->storeAs('shop/subcategory',$imgname);
            $subcategory->image = $imgname;
        }

        $subcategory->name = $this->name;
        $subcategory->slug = strtolower(str_replace(' ','-',$this->name));
        $subcategory->category_id = $this->category_id;
        $subcategory->status = $this->status;
        $subcategory->save();

        return redirect()->route('admin.product.subcategory')->with('message', 'SubCategory Added Succesfully!');
    }

    public function render()
    {
        $categorys = ProductCategory::all();

        return view('livewire.admin.admin-add-product-sub-category-component',['categorys'=>$categorys])->layout('admin.layouts.base');
    }
}
