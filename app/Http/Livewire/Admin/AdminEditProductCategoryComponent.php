<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\ProductCategory;
use Livewire\WithFileUploads;

class AdminEditProductCategoryComponent extends Component
{
    use WithFileUploads;

    public $image;
    public $newimage;
    public $name;
    public $status;
    public $cat_id;

    public function mount($category_slug)
    {
        $category = ProductCategory::where('slug',$category_slug)->first();
        $this->image = $category->image;
        $this->name = $category->name;
        $this->status = $category->status;
        $this->cat_id = $category->id;
    }

    public function update($fields)
    {
        $this->validateOnly($fields,[
            'name'=> 'required',
        ]);
    }

    public function editProductCategory()
    {
        $this->validate([
            'name'=> 'required',
        ]);

        $category = ProductCategory::find($this->cat_id);

        if($this->newimage)
        {
            if($this->image)
            {
                unlink(public_path('website/imgs/shop/category/'.$this->image));
            }
            $imgname = hexdec(uniqid()).'.'.$this->newimage->getClientOriginalExtension();
            $this->newimage->storeAs('shop/category',$imgname);
            $category->image = $imgname;
        }
        else
        {
            $category->image = $this->image;
        }

        $category->name = $this->name;
        $category->slug = strtolower(str_replace(' ','-',$this->name));
        $category->status = $this->status;
        $category->update();

        return redirect()->route('admin.product.category')->with('message', 'Category Update Succesfully!');
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-product-category-component')->layout('admin.layouts.base');
    }
}
