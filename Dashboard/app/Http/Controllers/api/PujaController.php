<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PujaController extends Controller
{
        public function index()
        {
            $Pujas = Puja::with(["user", "subasta"])->get();
            return response()->json([
                "data" => $Pujas,
                "status" => "success"
            ]);
        }
    
        public function store(Request $request)
        {
            $Pujas = Puja::create([
                'user_id' => $request->input('user_id'),
                'subasta_id' => $request->input('subasta_id'),
                'amount' => $request->input('amount'),
            ]);
            return response()->json($Pujas, 201);
        }
    
        public function show($id)
        {
            //
        }
    
        public function update(Request $request, $id)
        {
            $Pujas = Puja::find($id);
            if (!$Pujas) {
                return response()->json(['message' => 'Puja not found'], 404);
            }
            $Pujas->update([
                'user_id' => $request->input('user_id'),
                'subasta_id' => $request->input('subasta_id'),
                'amount' => $request->input('amount'),
            ]);
            return response()->json($Pujas);
        }
    
        public function destroy($id)
        {
            $Pujas = Puja::find($id);
            if (!$Pujas) {
                return response()->json(['message' => 'Puja not found'], 404);
            }
            $Pujas->delete();
            return response()->json(['message' => 'Puja deleted']);
        }
}
