<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    

    protected $fillable = [
        'title_product',
        'category_id',
        'image_product',
        'image_product1',
        'image_product2',
        'image_product3',
        'description_product',
        'price',
        'active_region_id',
        'user_id',
    ];

    public function activeRegion()
    {
        return $this->belongsTo(Region::class, 'active_region_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
