<?php

namespace App\Http\Controllers;

use App\Models\Subasta;
use App\Models\product;
use App\Http\Requests\SubastaRequest;

class SubastaController extends Controller
{
    public function index()
    {
        $subastas = Subasta::with('product')->latest()->paginate(10);
        return view('Dashboard.subastas.index', compact('subastas'));
    }

    public function create()
    {
        $products = product::all();
        return view('Dashboard.subastas.create', compact('products'));
    }

    public function store(SubastaRequest $request)
    {
        Subasta::create($request->validated());

        return redirect()->route('subastas.index')
            ->with('success', 'Subasta creada exitosamente.');
    }

    public function show(Subasta $subasta)
    {
        $subasta->load('product');
        return view('Dashboard.subastas.show', compact('subasta'));
    }

    public function edit(Subasta $subasta)
    {
        $products = product::all();
        return view('Dashboard.subastas.edit', compact('subasta', 'products'));
    }

    public function update(SubastaRequest $request, Subasta $subasta)
    {
        $subasta->update($request->validated());

        return redirect()->route('subastas.index')
            ->with('success', 'Subasta actualizada exitosamente.');
    }

    public function destroy(Subasta $subasta)
    {
        $subasta->delete();
        return redirect()->route('subastas.index')
            ->with('success', 'Subasta eliminada exitosamente.');
    }
}
