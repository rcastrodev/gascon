<?php

namespace App;

use App\Color;
use App\Product;
use App\Category;
use App\ProductPicture;
use App\ProductAttributes;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['category_id',  'name', 'description', 'order', 'extra', 'extra2', 'outstanding', 'image'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(ProductPicture::class);
    }

    public function productAttributes()
    {
        return $this->hasOne(ProductAttributes::class);
    }

    public function variableProducts()
    {
        return $this->hasMany(VariableProduct::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_product', 'product_id', 'product_id_related');
    }
}
