<?php

namespace App\Http\Controllers;

use App\Models\Kasir;
use Illuminate\Http\Request;

class KasirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kasir = \App\Models\Kasir::all();
        return view('kasir.index', compact('kasir'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kasir.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kodekasir' => 'required|string',
            'nama' => 'required|string',
            'hp' => 'required|string',
        ]);

        $newKasir = new Kasir();

        $newKasir->KodeKasir = $validatedData['kodekasir'];
        $newKasir->Nama = $validatedData['nama'];
        $newKasir->HP = $validatedData['hp'];

        $newKasir->save();

        return redirect()->route('kasir.index')->with('success', 'Kasir added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kasir = Kasir::find($id);
        return view('kasir.show', compact('kasir'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kasir = Kasir::find($id);
        return view('kasir.edit', compact('kasir'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'kodekasir' => 'required|string',
            'nama' => 'required|string',
            'hp' => 'required|string',
        ]);

        $kasir = Kasir::find($id);

        if (!$kasir) {
            return response()->json(['message' => 'Kasir not found'], 404);
        }

        $kasir->KodeKasir = $validatedData['kodekasir'];
        $kasir->Nama = $validatedData['nama'];
        $kasir->HP = $validatedData['hp'];

        $kasir->save();

        return redirect()->route('kasir.index')->with('success', 'Kasir updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kasir = Kasir::find($id);

        if ($kasir) {
            $kasir->delete();
            return redirect()->route('kasir.index')->with('success', 'Kasir deleted successfully');
        }

        return response()->json(['message' => 'Kasir not found'], 404);
    }
}
