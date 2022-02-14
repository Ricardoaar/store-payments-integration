<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'image_route',
    ];


    /**
     * @return BelongsToMany
     */
    public function carts(): BelongsToMany
    {
        return $this->belongsToMany(Cart::class,
            'products_carts');
    }

    public function getImageRouteAttribute(): string
    {
        if (str_starts_with($this->attributes['image_route'], 'http')) {
            return $this->attributes['image_route'];
        }
        return asset($this->attributes['image_route']);
    }
}
