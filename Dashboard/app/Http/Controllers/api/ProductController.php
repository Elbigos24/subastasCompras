<?php

namespace App\Http\Controllers\Api;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $Products = Product::all();
        return response()->json([
            "data" => $Products,
            "status" => "success"
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
        ]);
        $Products = Product::create([
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,
            'price' => $validated['price'],
        ]);
        return response()->json(['status' => 'success', 'data' => $Products], 201);
    }

    public function show($id)
    {
        $Products = Product::where('slug', $id)->get()->first();
        if (!$Products) {
            return response()->json(['message' => 'Product not found'], 404);
        }
        return response()->json(['status' => 'success',
         'data' => Product::where('slug', $id)->get()->first()]);
    }

    public function update(Request $request, $id)
    {
                $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
        ]);
        $Products = Product::create([
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,
            'price' => $validated['price'],
        ]);
        return response()->json($Products, 201);
    }

    public function destroy($id)
    {
        $Products = Product::find($id);
        if (!$Products) {
            return response()->json(['message' => 'Product not found'], 404);
        }
        $Products->delete();
        return response()->json(['message' => 'Product deleted successfully']);
    }

}
