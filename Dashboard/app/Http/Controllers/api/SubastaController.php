<?php

namespace App\Http\Controllers\Api;
use App\Models\Subasta;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubastaController extends Controller
{
    public function index()
    {
        $Subastas = Subasta::with(["product"])->get();
        return response()->json([
            "data" => $Subastas,
            "status" => "success"
        ]);
    }

    public function store(Request $request)
    {
       $Subastas = Subasta::create([
            'product_id' => $request->input('product_id'),
            'start_time' => $request->input('start_time'),
            'end_time' => $request->input('end_time'),
            'status' => $request->input('status'),
        ]);
        return response()->json($Subastas, 201);
    }

    public function show($id)
    {
        $Subastas = Subasta::with(["product"])->find($id);
        if (!$Subastas) {
            return response()->json(['message' => 'Subasta not found'], 404);
        }
        return response()->json($Subastas);
    }

    

    public function update(Request $request, $id)
    {
        $Subastas = Subasta::find($id);
        if (!$Subastas) {
            return response()->json(['message' => 'Subasta not found'], 404);
        }
        $Subastas->update([
            'product_id' => $request->input('product_id'),
            'start_time' => $request->input('start_time'),
            'end_time' => $request->input('end_time'),
            'status' => $request->input('status'),
        ]);
        return response()->json($Subastas);
    }

    public function destroy($id)
    {
        $Subastas = Subasta::find($id);
        if (!$Subastas) {
            return response()->json(['message' => 'Subasta not found'], 404);
        }
        $Subastas->delete();
        return response()->json(['message' => 'Subasta deleted successfully']);
    }
}
