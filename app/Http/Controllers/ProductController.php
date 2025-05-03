<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // Hiển thị dashboard
    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }
        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        $products = $query->paginate(4);
        return view('products.dashboard', compact('products'));
    }

    // Hiển thị form thêm
    public function create()
    {
        return view('products.create');
    }

    // Xử lý thêm
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category' => 'required|string|max:255',
            'description' => 'nullable|string',
            'stock' => 'required|integer',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        // Xử lý ảnh
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/images'), $filename);
            $validated['image'] = $filename;
        }

        Product::create($validated);
        return redirect()->route('products.index')->with('success', 'Thêm sản phẩm thành công!');
    }

    // Hiển thị form sửa
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }
    
    // Cập nhật sản phẩm
    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category' => 'required|string',
            'description' => 'required|string',
            'stock' => 'required|integer',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        // Xử lý upload ảnh (nếu có)
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/images'), $filename);
            $validatedData['image'] = $filename;
        }

        $product->update($validatedData);

        return redirect()->route('products.index')->with('success', 'Sản phẩm được cập nhật thành công!');
    }

    // Xoá sản phẩm
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Sản phẩm đã bị xóa!');
    }
}
