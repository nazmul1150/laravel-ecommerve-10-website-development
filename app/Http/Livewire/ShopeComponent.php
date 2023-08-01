<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Brand;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Cart;

class ShopeComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $pagesize = 12;
    public $orderBy = "Default Sorting";

    public $min_value = 0;
    public $max_value = 1000;

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

    public function changePagesize($size)
    {
        $this->pagesize = $size;
    }

    public function changeOrderBy($order)
    {
        $this->orderBy = $order;
    }

    public function render()
    {
        if($this->orderBy == 'Price: Low to High')
        {
            $products = Product::whereBetween('price',[$this->min_value,$this->max_value])->orderBy('price','ASC')->paginate($this->pagesize);
        }
        else if($this->orderBy == 'Price: High to Low')
        {
            $products = Product::whereBetween('price',[$this->min_value,$this->max_value])->orderBy('price','DESC')->paginate($this->pagesize);
        }
        else if($this->orderBy == 'Sort By Newness')
        {
            $products = Product::whereBetween('price',[$this->min_value,$this->max_value])->orderBy('id','DESC')->paginate($this->pagesize);
        }
        else
        {
            $products = Product::whereBetween('price',[$this->min_value,$this->max_value])->orderBy('created_at','DESC')->paginate($this->pagesize);
        }

        $categories = ProductCategory::orderBy('created_at','DESC')->take(7)->get();
        $popular_products = Product::inRandomOrder()->take(3)->get();
        $brands = Brand::orderBy('id','DESC')->take(5)->get();

        if(Auth::check())
        {
            Cart::instance('cart')->store(Auth::user()->email);
            Cart::instance('wishlist')->store(Auth::user()->email);
        }

        return view('livewire.shope-component',['products'=>$products,'categories'=>$categories,'brands'=>$brands,'popular_products'=>$popular_products])->layout('website.layouts.base');
    }
}
