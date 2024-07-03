<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'active_region_id');
    }
    public function introduction()
    {
        return $this->hasMany(Introduction::class, 'active_region_id');
    }
    public function event()
    {
        return $this->hasMany(Event::class, 'active_region_id');
    }
    public function category()
    {
        return $this->hasMany(Category::class, 'active_region_id');
    }
    public function product()
    {
        return $this->hasMany(Product::class, 'active_region_id');
    }
}
