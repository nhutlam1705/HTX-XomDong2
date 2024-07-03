<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';

    protected $fillable = [
        'title_category',
        'image_category',
        'description_category',
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
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}
