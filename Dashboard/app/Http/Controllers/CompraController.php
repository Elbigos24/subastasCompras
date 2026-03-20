<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Usser;
use App\Http\Requests\CompraRequest;

class CompraController extends Controller
{
    public function index()
    {
        $compras = Compra::with('user')->latest()->paginate(10);
        return view('Dashboard.compras.index', compact('compras'));
    }

    public function create()
    {
        $users = Usser::all();
        return view('Dashboard.compras.create', compact('users'));
    }

    public function store(CompraRequest $request)
    {
        Compra::create($request->validated());

        return redirect()->route('compras.index')
            ->with('success', 'Compra registrada exitosamente.');
    }

    public function show(Compra $compra)
    {
        $compra->load('user');
        return view('Dashboard.compras.show', compact('compra'));
    }

    public function edit(Compra $compra)
    {
        $users = Usser::all();
        return view('Dashboard.compras.edit', compact('compra', 'users'));
    }

    public function update(CompraRequest $request, Compra $compra)
    {
        $compra->update($request->validated());

        return redirect()->route('compras.index')
            ->with('success', 'Compra actualizada exitosamente.');
    }

    public function destroy(Compra $compra)
    {
        $compra->delete();
        return redirect()->route('compras.index')
            ->with('success', 'Compra eliminada exitosamente.');
    }
}
