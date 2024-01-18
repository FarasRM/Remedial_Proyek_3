<?php

namespace App\Http\Controllers;

use App\Models\Tenan;
use Illuminate\Http\Request;

class TenanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tenans = Tenan::all();
        return view('tenan.index', compact('tenans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tenan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode_tenan' => 'required|string',
            'nama_tenan' => 'required|string',
            'hp' => 'required|string',
        ]);

        $newTenan = new Tenan();

        $newTenan->KodeTenan = $validatedData['kode_tenan'];
        $newTenan->NamaTenan = $validatedData['nama_tenan'];
        $newTenan->HP = $validatedData['hp'];

        $newTenan->save();

        return redirect()->route('tenan.index')->with('success', 'Tenan added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tenan = Tenan::find($id);
        $transaksi = Nota::where('Kode_Tenan', $tenan->KodeTenan)->get();
        return view('tenan.show', compact('tenan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tenan = Tenan::find($id);
        return view('tenan.edit', compact('tenan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'kode_tenan' => 'required|string',
            'nama_tenan' => 'required|string',
            'hp' => 'required|string',
        ]);

        $tenan = Tenan::find($id);

        if (!$tenan) {
            return response()->json(['message' => 'Tenan not found'], 404);
        }

        $tenan->KodeTenan = $validatedData['kode_tenan'];
        $tenan->NamaTenan = $validatedData['nama_tenan'];
        $tenan->HP = $validatedData['hp'];

        $tenan->save();

        return redirect()->route('tenan.index')->with('success', 'Tenan updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tenan = Tenan::find($id);

        if ($tenan) {
            $tenan->delete();
            return redirect()->route('tenan.index')->with('success', 'Tenan deleted successfully');
        }

        return response()->json(['message' => 'Tenan not found'], 404);
    }
}
