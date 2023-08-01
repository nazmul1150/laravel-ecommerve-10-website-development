<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;

class AdminProductComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function deleteProduct($id)
    {
        $product = Product::find($id);

        if($product->image)
        {
            unlink(public_path('website/imgs/shop/product/'.$product->image));
        }

        if($product->images)
        {
            $images = explode(',',$product->images);
                foreach($images as $image)
            {
                if($image)
                {
                     unlink(public_path('website/imgs/shop/product/'.$image));
                }
            }
        }

        $product->delete();

        return redirect()->route('admin.product')->with('message','Product delete has been successfully!');
    }

    public function render()
    {
        $products = Product::orderBy('created_at','DESC')->paginate(10);

        return view('livewire.admin.admin-product-component',['products'=>$products])->layout('admin.layouts.base');
    }
}
