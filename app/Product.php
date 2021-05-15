<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }

    public function tags()
    {

        //bảng trung gian product_tags khoá ngoại product_id of table product_tags and tag_id on table product_tags
        return $this->belongsToMany(Tag::class, 'product_tags', 'product_id', 'tag_id')->withTimestamps();
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function productImages()
    {
        //A product has many on ProductImage link by foreinnkey product_id of ProductImage
        return $this->hasMany(ProductImage::class, 'product_id');
    }
}
