<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ProductCategory;
use App\Models\Brand;
use Illuminate\Support\Facades\Auth;
use Cart;
use App\Models\Product;

class ProductDetails extends Component
{
    public $pro_id;
    public $qty;

    public function mount($p_slug)
    {
        $products = Product::where('slug',$p_slug)->first();
        $this->pro_id = $products->id;
        $this->qty = 1;
    }

    public function incressQuantity()
    {
        $this->qty++;
    }

    public function decressQuantity()
    {
        if($this->qty > 1)
        {
            $this->qty--;
        }
    }

    public function stor($product_id,$product_name,$product_price)
    {
        Cart::instance('cart')->add($product_id,$product_name,$this->qty,$product_price)->associate('\App\Models\Product');
        return redirect()->route('cart')->with('message','Item added in cart');
    }

    public function addToWishList($product_id,$product_name,$product_price)
    {
        Cart::instance('wishlist')->add($product_id,$product_name,1,$product_price)->associate('\App\Models\Product');
        $this->emitTo('wishlist-count-component','refreshComponent');
        return;
    }

    public function removeWishList($product_id)
    {
        foreach(Cart::instance('wishlist')->content() as $wishlist)
        {
            if($wishlist->id == $product_id)
            {
                Cart::instance('wishlist')->remove($wishlist->rowId);
                $this->emitTo('wishlist-count-component','refreshComponent');
                return redirect();
            }
        }
    }

    public function render()
    {
        $product = Product::find($this->pro_id);
        

        $related_Products = Product::where('category_id',$product->category_id)->where('subcategory_id',$product->subcategory_id)->take(6)->get();

        $popular_products = Product::inRandomOrder()->take(4)->get();

        $categories = ProductCategory::orderBy('created_at','DESC')->take(7)->get();

        $brands = Brand::orderBy('id','DESC')->take(5)->get();

        if(Auth::check())
        {
            Cart::instance('cart')->store(Auth::user()->email);
            Cart::instance('wishlist')->store(Auth::user()->email);
        }

        return view('livewire.product-details',['product'=>$product,'related_Products'=>$related_Products,'popular_products'=>$popular_products,'categories'=>$categories,'brands'=>$brands])->layout('website.layouts.base');
    }
}
