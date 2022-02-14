<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
    ];

    public function order(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class,
            'products_carts');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getProductsWithDataAttribute(): array
    {
        $productsInCart = $this->products()->select('name', 'price')->distinct()->get();
        $productsWithData = [];
        for ($i = 0; $i < count($productsInCart); $i++) {
            $quantity = $this->products()->where('name', $productsInCart[$i]->name)->count();
            $productsWithData[$i] = [
                'product' => $productsInCart[$i]->name,
                'quantity' => $quantity,
                'price' => $productsInCart[$i]->price,
                'id' => $productsInCart[$i]->id,
            ];
        }
        return $productsWithData;
    }

    public function getTotalAttribute(): float
    {
        $total = 0;
        foreach ($this->products as $product) {
            $total += $product->price;
        }
        return $total;
    }

}
