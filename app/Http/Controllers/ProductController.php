<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $products = Product::all();

        return view('products.index', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = Product::create([
            'name' => ucfirst($request->productName),
            'price' => $request->productPrice,
            'quantity' => $request->productQuantity
        ]);

        $product->save();

        return response()->json(compact('product'));
    }

    /**
     * Display the notes from the specified resource.
     */
    public function notes()
    {
        return view('products.notes');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $product->name = ucfirst($request->name);
        $product->price = $request->price;
        $product->quantity = $request->quantity;

        $product->save();

        return response()->json(compact('product'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Product $product)
    {
        $product->delete();
        return response('Message Deleted');
    }
}
