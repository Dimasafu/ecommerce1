<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $products = Product::all(); // pagination 12 item
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'description' => 'required',
        'stock' => 'required|integer',
        'price' => 'required|numeric',
        'category_id' => 'required|exists:categories,id',
        'image' => 'required|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    // Upload gambar
    $image = $request->file('image');
    $filename = time() . '_' . $image->getClientOriginalName();
    $image->move(public_path('images'), $filename);

    // Simpan produk
    Product::create([
        'name' => $request->name,
        'description' => $request->description,
        'stock' => $request->stock,
        'price' => $request->price,
        'category_id' => $request->category_id,
        'image' => $filename,
    ]);

    return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan');
}

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
{
    $categories = Category::all();
    return view('products.edit', compact('product', 'categories'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
{
    $request->validate([
        'name' => 'required',
        'description' => 'required',
        'stock' => 'required|integer',
        'price' => 'required|numeric',
        'category_id' => 'required|exists:categories,id',
        'image' => 'required|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    $data = $request->all();

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $filename = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('images'), $filename);
        $data['image'] = $filename;
    }
    $product->update($data);

    return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
{
    $product->delete();
    return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus');
}
}
