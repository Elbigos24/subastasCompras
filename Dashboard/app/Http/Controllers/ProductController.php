<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\Usser;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = product::with('user')->latest()->paginate(10);
        return view('Dashboard.products.index', compact('products'));
    }

    public function create()
    {
        $users = Usser::all();
        return view('Dashboard.products.create', compact('users'));
    }

    public function store(ProductRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('Img')) {
            $data['Img'] = $request->file('Img')->store('products', 'public');
        }

        product::create($data);

        return redirect()->route('products.index')
            ->with('success', 'Producto creado exitosamente.');
    }

    public function show(product $product)
    {
        return view('Dashboard.products.show', compact('product'));
    }

    public function edit(product $product)
    {
        $users = Usser::all();
        return view('Dashboard.products.edit', compact('product', 'users'));
    }

    public function update(ProductRequest $request, product $product)
    {
        $data = $request->validated();

        if ($request->hasFile('Img')) {
            $data['Img'] = $request->file('Img')->store('products', 'public');
        }

        $product->update($data);

        return redirect()->route('products.index')
            ->with('success', 'Producto actualizado exitosamente.');
    }

    public function destroy(product $product)
    {
        $product->delete();
        return redirect()->route('products.index')
            ->with('success', 'Producto eliminado exitosamente.');
    }
}
