<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    public function index()
    {
        $Compras = Compra::with(["user", "subasta
        "])->get();
        return response()->json([
            "data" => $Compras,
            "status" => "success"
        ]);
    }

    public function store(Request $request)
    {
        $Compras = Compra::create([
            'user_id' => $request->input('user_id'),
            'subasta_id' => $request->input('subasta_id'),
            'amount' => $request->input('amount'),
        ]);
        return response()->json($Compras, 201);
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $Compras = Compra::find($id);
        if (!$Compras) {
            return response()->json(['message' => 'Compra not found'], 404);
        }
        $Compras->update([
            'user_id' => $request->input('user_id'),
            'subasta_id' => $request->input('subasta_id'),
            'amount' => $request->input('amount'),
        ]);
        return response()->json($Compras);
    }

    public function destroy($id)
    {
        $Compras = Compra::find($id);
        if (!$Compras) {
            return response()->json(['message' => 'Compra not found'], 404);
        }
        $Compras->delete();
        return response()->json(['message' => 'Compra deleted']);
    }
}
