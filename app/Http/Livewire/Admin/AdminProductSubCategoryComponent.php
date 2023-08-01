<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\ProductSubCategory;
use Livewire\WithPagination;

class AdminProductSubCategoryComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function deleteProductSubCategory($id)
    {
        $subcategory = ProductSubCategory::find($id);
        if($subcategory->image)
        {
            unlink(public_path('website/imgs/shop/subcategory/'.$subcategory->image));
        }

        $subcategory->delete();

        return redirect()->route('admin.product.subcategory')->with('message', 'SubCategory Delete Succesfully!');
    }

    public function render()
    {
        $subcategorys = ProductSubCategory::orderBy('id','DESC')->paginate(6);

        return view('livewire.admin.admin-product-sub-category-component',['subcategorys'=>$subcategorys])->layout('admin.layouts.base');
    }
}
