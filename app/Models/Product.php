<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    public function category()
    {
        return $this->belongsTo(ProductCategory::class,'category_id');
    }

    public function subcategory()
    {
        return $this->belongsTo(ProductSubCategory::class,'subcategory_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class,'brand_id');
    }

    public function orderitem()
    {
        return $this->hasMany(OrderItem::class,'product_id');
    }
    
}
