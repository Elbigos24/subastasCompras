<?php

namespace App\Http\Controllers;

use App\Models\Puja;
use App\Models\Subasta;
use App\Models\Usser;
use App\Http\Requests\PujaRequest;

class PujaController extends Controller
{
    public function index()
    {
        $pujas = Puja::with(['user', 'subasta'])->latest()->paginate(10);
        return view('Dashboard.pujas.index', compact('pujas'));
    }

    public function create()
    {
        $subastas = Subasta::where('status', 1)->get();
        $users    = Usser::all();
        return view('Dashboard.pujas.create', compact('subastas', 'users'));
    }

    public function store(PujaRequest $request)
    {
        Puja::create($request->validated());

        return redirect()->route('pujas.index')
            ->with('success', 'Puja registrada exitosamente.');
    }

    public function show(Puja $puja)
    {
        $puja->load(['user', 'subasta.product']);
        return view('Dashboard.pujas.show', compact('puja'));
    }

    public function edit(Puja $puja)
    {
        $subastas = Subasta::where('status', 1)->get();
        $users    = Usser::all();
        return view('Dashboard.pujas.edit', compact('puja', 'subastas', 'users'));
    }

    public function update(PujaRequest $request, Puja $puja)
    {
        $puja->update($request->validated());

        return redirect()->route('pujas.index')
            ->with('success', 'Puja actualizada exitosamente.');
    }

    public function destroy(Puja $puja)
    {
        $puja->delete();
        return redirect()->route('pujas.index')
            ->with('success', 'Puja eliminada exitosamente.');
    }
}
