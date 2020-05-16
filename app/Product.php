<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = ['category_id', 'subcategory_id', 'slug', 'user_id', 'productName', 'productPrice', 'productColor', 'productSize', 'productDescription', 'productImage1', 'productImage2', 'productImage3'];


    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function subcategory(){
        return $this->belongsTo(Subcategory::class);
    }
}