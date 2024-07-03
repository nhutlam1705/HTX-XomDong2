<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_event',
        'image_event',
        'description_event',
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
}
