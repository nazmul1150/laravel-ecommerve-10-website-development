<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithFileUploads;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use App\Models\Brand;

class AdminAddProductComponent extends Component
{
    use WithFileUploads;

    public $image;
    public $images;
    public $name;
    public $price;
    public $dis_price;
    public $dis_percent;
    public $warranty;
    public $return_policy;
    public $quantity;
    public $sku;
    public $tags;
    public $short_desc;
    public $description;
    public $additional_info;
    public $category_id;
    public $subcategory_id;
    public $brand_id;
    public $cash_on_delivery;
    public $stock_status;
    public $featured;
    public $status;

    public function mount()
    {
        $this->cash_on_delivery = 0;
        $this->stock_status = 'instock';
        $this->featured = 0;
        $this->status = 0;
    }

    public function addProduct()
    {
        $this->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'name' => 'required|uniqid:products',
            'price' => 'required',
            'quantity' => 'required',
            'sku' => 'required',
            'short_desc' => 'required',
            'description' => 'required',
            'category_id' => 'required',
        ]);
        $product = new Product();

        if($this->image)
        {
            $imgName = hexdec(uniqid()).'.'.$this->image->getClientOriginalExtension();
            $this->image->storeAs('shop/product',$imgName);
            $product->image = $imgName;
        }

        if($this->images)
        {
            $imagesName = '';
            foreach($this->images as $key=>$image)
            {
                $imgName = hexdec(uniqid()).$key.'.'.$image->getClientOriginalExtension();
                $image->storeAs('shop/product',$imgName);
                $imagesName = $imagesName.','.$imgName;
            }
            $product->images = $imagesName;
        }

        $product->name = $this->name;
        $product->slug = strtolower(str_replace(' ','-',$this->name));
        $product->price = $this->price;
        $product->dis_price = $this->dis_price;
        $product->dis_percent = $this->dis_percent;
        $product->warranty = $this->warranty;
        $product->return_policy = $this->return_policy;
        $product->quantity = $this->quantity;
        $product->sku = $this->sku;
        $product->tags = $this->tags;
        $product->short_desc = $this->short_desc;
        $product->description = $this->description;
        $product->additional_info = $this->additional_info;
        $product->category_id = $this->category_id;
        if($this->subcategory_id){
            $product->subcategory_id = $this->subcategory_id;
        }
        if($this->brand_id){
            $product->brand_id = $this->brand_id;
        }
        $product->cash_on_delivery = $this->cash_on_delivery;
        $product->stock_status = $this->stock_status;
        $product->featured = $this->featured;
        $product->status = $this->status;
        $product->save();

        return redirect()->route('admin.product')->with('message','Product add has been successfully!');
    }

    public function render()
    {
        $categorys = ProductCategory::orderBy('created_at','DESC')->get();

        $subcategorys = ProductSubCategory::orderBy('created_at','DESC')->get();

        $brands = Brand::orderBy('created_at','DESC')->get();

        return view('livewire.admin.admin-add-product-component',['categorys'=>$categorys,'subcategorys'=>$subcategorys,'brands'=>$brands])->layout('admin.layouts.base');
    }
}
