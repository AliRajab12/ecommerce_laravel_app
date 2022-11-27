<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // use HasFactory;

    /*
    **
     * The table associated with the model.
     *
     * @var string
     */

    protected $table = 'products';

    public $timestamps = false;

    protected $fillable = [
        'product_id','title','description','category', 'image', 'price','rate','count'
    ];

    // product may belongs to more than one category
    // many to many relationship (product_categories)
    // public function categories()
    // {
    //     return $this->belongsToMany(Category::class, 'product_categories', 'product_id', 'category_id');
    // }

}
