<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\HomeSlider;
use App\Models\Product;
use App\Models\ProductCategory;
use Cart;
use App\Models\HomeBanner;
use App\Models\FeaturedBrands;

class HomeComponent extends Component
{
    public function store($product_id,$product_name,$product_price)
    {
        Cart::instance('cart')->add($product_id,$product_name,1,$product_price)->associate('\App\Models\Product');

        return redirect()->route('cart')->with('message','Item added in cart');
    }

    public function addToWishList($product_id,$product_name,$product_price)
    {
        Cart::instance('wishlist')->add($product_id,$product_name,1,$product_price)->associate('\App\Models\Product');
        $this->emitTo('wishlist-count-component','refreshComponent');
        return redirect();
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
        $home_sliders = HomeSlider::orderBy('id','DESC')->take(5)->get();

        $products = Product::orderBy('created_at','DESC')->take(8)->get();

        $featured_products = Product::where('featured',1)->orderBy('created_at','DESC')->take(8)->get();

        $popular_products = Product::inRandomOrder()->take(8)->get();

        $product_category = ProductCategory::orderBy('created_at','DESC')->get();

        $banner_1 = HomeBanner::where('id',1)->where('status', 0)->first();
        $banner_2 = HomeBanner::where('id',2)->where('status', 0)->first();
        $banner_3 = HomeBanner::where('id',3)->where('status', 0)->first();
        $banner_4 = HomeBanner::where('id',4)->where('status', 0)->first();

        $featured_brands = FeaturedBrands::where('status', 0)->orderBy('created_at','DESC')->take(8)->get();


        return view('livewire.home-component',['home_sliders'=>$home_sliders,'products'=>$products,'popular_products'=>$popular_products,'featured_products'=>$featured_products,'product_category'=>$product_category,'banner_1'=>$banner_1,'banner_2'=>$banner_2,'banner_3'=>$banner_3,'banner_4'=>$banner_4,'featured_brands'=>$featured_brands])->layout('website.layouts.base');
    }
}
