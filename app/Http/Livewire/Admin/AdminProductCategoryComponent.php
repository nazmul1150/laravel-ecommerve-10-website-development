<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\ProductCategory;
use Livewire\WithPagination;

class AdminProductCategoryComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function deleteProductCategory($id)
    {
        $category = ProductCategory::find($id);
        if($category->image)
        {
            unlink(public_path('website/imgs/shop/category/'.$category->image));
        }
        $category->delete();

        return redirect()->route('admin.product.category')->with('message', 'Category Delete Succesfully!');
    }

    public function render()
    {
        $categorys = ProductCategory::orderBy('id','DESC')->paginate(6);

        return view('livewire.admin.admin-product-category-component',['categorys'=>$categorys])->layout('admin.layouts.base');
    }
}
