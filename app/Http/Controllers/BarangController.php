<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $barang = Barang::get();
        return view("barang.index", compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("barang.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kodebarang' => 'required|string',
            'namabarang' => 'required|string',
            'satuan' => 'required|string',
            'hargasatuan' => 'required|numeric',
            'stok' => 'required|integer',
        ]);

        // Create a new instance of YourModel
        $newItem = new Barang();

        // Set the model attributes with the validated data
        $newItem->KodeBarang = $validatedData['kodebarang'];
        $newItem->NamaBarang = $validatedData['namabarang'];
        $newItem->Satuan = $validatedData['satuan'];
        $newItem->HargaSatuan = $validatedData['hargasatuan'];
        $newItem->Stok = $validatedData['stok'];

        // Save the new item to the database
        $newItem->save();

        // You can return a response or redirect as needed
        return redirect()->to('/barang');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $barang = Barang::find($id);
        return view("barang.update", compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'kodebarang' => 'required|string',
            'namabarang' => 'required|string',
            'satuan' => 'required|string',
            'hargasatuan' => 'required|numeric',
            'stok' => 'required|integer',
        ]);

        // Find the item in the database by its ID
        $item = Barang::find($id);

        // Check if the item exists
        if (!$item) {
            // You can customize the response based on your requirements
            return response()->json(['message' => 'Item not found'], 404);
        }

        // Update the item with the validated data
        $item->KodeBarang = $validatedData['kodebarang'];
        $item->NamaBarang = $validatedData['namabarang'];
        $item->Satuan = $validatedData['satuan'];
        $item->HargaSatuan = $validatedData['hargasatuan'];
        $item->Stok = $validatedData['stok'];

        // Save the updated item to the database
        $item->save();

        // You can return a response or redirect as needed
        return redirect()->to('/barang')->with('success', 'Item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $barang = Barang::find($id);
        $barang->delete();
        return redirect()->to('/barang')->with('success', 'Item Deleted successfully');
    }
}
