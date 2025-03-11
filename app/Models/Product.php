<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function brand(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Brand::class,'brand_id','id');
    }
    public function productCategory(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(ProductCategory::class,'product_category_id','id');
    }
    public function productImages(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ProductImage::class,'product_id','id');
    }
    public function productDetails(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ProductDetail::class,'product_id','id');
    }
    public function productComments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ProductComment::class,'product_id','id');
    }
    public function orderDetails(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(OrderDetail::class,'product_id','id');
    }
}

