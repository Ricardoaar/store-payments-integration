<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $products = Product::orderBy('id', 'asc')->paginate(8);
        return view('product.productIndex', compact('products'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function store(Request $request)
    {
        $product = new Product();
        //TOdo create product
        return view('product.productEdit', compact('product'));

    }


    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Product $product): view
    {
        return view('product.productEdit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Product $product
     * @return view
     */
    public function update(Request $request, Product $product): view
    {
        return view('product.productEdit', compact('product'));
    }


    /**
     *
     * @param Product $product : Product to delete
     * @return RedirectResponse
     */
    public
    function destroy(Product $product): RedirectResponse
    {
        if (!Auth::user()->isAdmin()) {
            return redirect()->route('product.index')->with('error', 'You are not authorized to delete this product');
        }
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }
}
