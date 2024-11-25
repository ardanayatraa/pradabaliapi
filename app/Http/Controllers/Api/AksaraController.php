<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Aksara;
use Illuminate\Http\Request;

class AksaraController extends Controller
{
    public function index()
    {
        return response()->json(Aksara::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'aksara' => 'required|string',
            'latin' => 'required|string',
            'bali' => 'required|string',
            'svg_path' => 'nullable|string',
        ]);

        $aksara = Aksara::create($data);
        return response()->json($aksara, 201);
    }

    public function show(Aksara $aksara)
    {
        return response()->json($aksara);
    }

    public function update(Request $request, Aksara $aksara)
    {
        $data = $request->validate([
            'aksara' => 'string',
            'latin' => 'string',
            'bali' => 'string',
            'svg_path' => 'nullable|string',
        ]);

        $aksara->update($data);
        return response()->json($aksara);
    }

    public function destroy(Aksara $aksara)
    {
        $aksara->delete();
        return response()->json(null, 204);
    }
}
