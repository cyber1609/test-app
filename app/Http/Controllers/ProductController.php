<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Http\Requests\{ProductStoreRequest, ProductUpdateRequest};
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $sum = $products->sum('total_price');
        return view('index', compact('products', 'sum'));
    }

    public function store(ProductStoreRequest $request)
    {
        $data = [
            'name' => $request->get('name'),
            'quantity' => $request->get('quantity'),
            'price' => $request->get('price'),
            'total_price' => $request->get('quantity') * $request->get('price'),
            'submitted_at' => now(),
        ];
        Storage::disk('public')->put("{$request->get('name')}.json", json_encode($data));

        Product::create($data);
        return redirect()->route('index');
    }

    public function edit(int $id)
    {
        $product = Product::findOrFail($id);
        return view('edit', compact('product'));
    }

    public function update(ProductUpdateRequest $request)
    {
        $product = Product::findOrFail($request->route('id'));
        $product->update(
            [
                'name' => $request->get('name'),
                'quantity' => $request->get('quantity'),
                'price' => $request->get('price'),
                'total_price' => $request->get('quantity') * $request->get('price'),
                'submitted_at' => now(),
            ]
        );
        return redirect()->route('index');
    }
}
