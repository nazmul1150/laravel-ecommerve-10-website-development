<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use Livewire\WithFileUploads;

class AdminEditProductSubCategoryComponent extends Component
{
    use WithFileUploads;

    public $subcategory_id;
    public $image;
    public $name;
    public $category_id;
    public $status;
    public $newimage;
    
    public function mount($subcategory_slug)
    {
        $subcategory = ProductSubCategory::where('slug',$subcategory_slug)->first();
        $this->image = $subcategory->image;
        $this->name = $subcategory->name;
        $this->category_id = $subcategory->category_id;
        $this->status = $subcategory->status;
        $this->subcategory_id = $subcategory->id;
    }

    public function update($fields)
    {
        $this->validateOnly($fields,[
            'name'=> 'required',
            'category_id'=> 'required',
        ]);
    }

    public function editProductSubCategory()
    {
        $this->validate([
            'name'=> 'required',
            'category_id'=> 'required',
        ]);

        $subcategory = ProductSubCategory::find($this->subcategory_id);

        if($this->newimage)
        {
            $imgname = hexdec(uniqid()).'.'.$this->newimage->getClientOriginalExtension();
            $this->newimage->storeAs('shop/subcategory',$imgname);
            $subcategory->image = $imgname;
        }
        else
        {
            $subcategory->image = $this->image;
        }

        $subcategory->name = $this->name;
        $subcategory->slug = strtolower(str_replace(' ','-',$this->name));
        $subcategory->category_id = $this->category_id;
        $subcategory->status = $this->status;
        $subcategory->update();

        return redirect()->route('admin.product.subcategory')->with('message', 'SubCategory Update Succesfully!');
    }

    public function render()
    {
        $categorys = ProductCategory::all();

        return view('livewire.admin.admin-edit-product-sub-category-component',['categorys'=>$categorys])->layout('admin.layouts.base');
    }
}
