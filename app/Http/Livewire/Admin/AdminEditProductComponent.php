<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithFileUploads;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use App\Models\Brand;

class AdminEditProductComponent extends Component
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

    public $newimage;
    public $newimages;
    public $p_id;

    public function mount($product_slug)
    {
        $product = Product::where('slug',$product_slug)->first();
        $this->image = $product->image;
        $this->images = explode(',',$product->images);
        $this->name = $product->name;
        $this->price = $product->price;
        $this->dis_price = $product->dis_price;
        $this->dis_percent = $product->dis_percent;
        $this->warranty = $product->warranty;
        $this->return_policy = $product->return_policy;
        $this->quantity = $product->quantity;
        $this->sku = $product->sku;
        $this->tags = $product->tags;
        $this->short_desc = $product->short_desc;
        $this->description = $product->description;
        $this->additional_info = $product->additional_info;
        $this->category_id = $product->category_id;
        $this->subcategory_id = $product->subcategory_id;
        $this->brand_id = $product->brand_id;
        $this->cash_on_delivery = $product->cash_on_delivery;
        $this->stock_status = $product->stock_status;
        $this->featured = $product->featured;
        $this->status = $product->status;
        $this->p_id = $product->id;
    }

    public function editProduct()
    {
        $this->validate([
            'name' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'sku' => 'required',
            'short_desc' => 'required',
            'description' => 'required',
            'category_id' => 'required',
        ]);

        $product = Product::find($this->p_id);

        if($this->newimage)
        {
            if($product->image)
            {
                unlink(public_path('website/imgs/shop/product/'.$product->image));
            }

            $imgName = hexdec(uniqid()).'.'.$this->newimage->getClientOriginalExtension();
            $this->newimage->storeAs('shop/product',$imgName);
            $product->image = $imgName;
        }

        if($this->newimages)
        {
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

            $newimagesName = '';
            foreach($this->newimages as $key=>$image)
            {
                $imgsName = hexdec(uniqid()).$key.'.'.$image->getClientOriginalExtension();
                $image->storeAs('shop/product',$imgsName);
                $newimagesName = $newimagesName.','.$imgsName;
            }
            $product->images = $newimagesName;
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
        $product->update();

        return redirect()->route('admin.product')->with('message','Product update has been successfully!');
    }

    public function render()
    {
        $categorys = ProductCategory::orderBy('created_at','DESC')->get();

        $subcategorys = ProductSubCategory::orderBy('created_at','DESC')->get();

        $brands = Brand::orderBy('created_at','DESC')->get();

        return view('livewire.admin.admin-edit-product-component',['categorys'=>$categorys,'subcategorys'=>$subcategorys,'brands'=>$brands])->layout('admin.layouts.base');
    }
}
