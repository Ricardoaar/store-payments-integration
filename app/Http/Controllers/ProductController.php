<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
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
     * @param ProductRequest $request
     * @return RedirectResponse
     */
    public function store(ProductRequest $request): RedirectResponse
    {
        $product = $this->saveProduct($request);

//        $request->validated();
//        $path = $request->file('image')->store('public/images');
//
//        $temp = explode('/', $path);
//        $path = "storage/$temp[1]/$temp[2]";
//        $product = new Product();
//        $product->name = $request->name;
//        $product->image_route = $path;
//        $product->price = $request->price;
//        $product->save();
        return redirect()->route('products.edit', $product->id);
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
     * @param ProductRequest $request
     * @param Product $product
     * @return RedirectResponse
     */
    public function update(ProductRequest $request, Product $product): RedirectResponse
    {
        $product = $this->saveProduct($request, $product);
        return redirect()->route('products.edit', $product->id);
    }


    private function saveProduct(ProductRequest $request, Product $product = null): Product
    {
        $request->validated();
        $path = $request->file('image')->store('public/images');
        if (is_null($product)) {
            $product = new Product();
        }
        $temp = explode('/', $path);
        $path = "storage/$temp[1]/$temp[2]";
        $product->name = $request->name;
        $product->image_route = $path;
        $product->price = $request->price;
        $product->save();
        return $product;
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
