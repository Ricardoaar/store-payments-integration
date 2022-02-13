<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use softDeletes;

    protected $fillable = [
        'customer_id',
        'total',
        'status',
        'request_id',
        'payment_url',
        'reference',
        'description',
        'gateway',
        'currency'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function cart(): BelongsTo
    {
        return $this->belongsTo(Cart::class);
    }

    public function getTotalAttribute()
    {
        return $this->updateTotal();
    }

    public function updateTotal()
    {

        $products = $this->cart->productsWithData;
        if (empty($products)) {
            return 0;
        }
        $total = array_reduce($products, function ($carry, $product) {
            $carry += $product['price'] * $product['quantity'];
            return $carry;
        });
        $this->total = $total;
        $this->save();
        return $total;
    }


    public static function boot()
    {
        parent::boot();

        self::created(function ($order) {
            if ($order->cart === null) {
                $order->total = 0;
                $order->save();
                return;
            }

            $order->updateTotal();
        });

    }

    public function setCartAttribute()
    {
        $this->updateTotal();
    }


}
