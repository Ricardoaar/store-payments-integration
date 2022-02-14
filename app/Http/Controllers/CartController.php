<?php

namespace App\Http\Controllers;

use App\Http\Livewire\CartComponent;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function index()
    {
        $cart = Auth::user()->currentCart;
        return view('cart.cart-index', ["cart" => $cart]);
    }


    public function addToCart(Product $product): RedirectResponse
    {
        $cart = Auth::user()->currentCart;
        $cart->products()->attach($product);
        return back();
    }

    public function removeFromCart(Product $product): RedirectResponse
    {
        $cart = Auth::user()->currentCart;
        $cart->products()->detach($product);
        return back();

    }


    public static function createCart()
    {
        $cart = Cart::create();
        $cart->user()->associate(Auth::user());
        $cart->save();
        return $cart;
    }
}
