<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangNota;
use App\Models\Kasir;
use App\Models\Nota;
use App\Models\Tenan;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nota = Nota::all();
        return view('transaksi.index', compact('nota'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tenan = Tenan::all();
        $kasir = Kasir::all();
        $barang = Barang::all();
        return view('transaksi.create', compact('tenan', 'kasir', 'barang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validasi data input
    $request->validate([
        'KodeNota' => 'required|unique:notas',
        'Kode_Kasir' => 'required',
        'Kode_Tenan' => 'required',
        'Kode_Barang' => 'required',
        'Jumlah' => 'required|numeric',
        'Diskon' => 'required|numeric',
    ]);

    // Simpan data nota
    $nota = Nota::create([
        'KodeNota' => $request->input('KodeNota'),
        'Kode_Kasir' => $request->input('Kode_Kasir'),
        'Kode_Tenan' => $request->input('Kode_Tenan'),
        'JumlahBelanja' => 0, // Diatur ke nilai awal sementara perhitungan dilakukan
        'Diskon' => $request->input('Diskon'),
        'Total' => 0, // Diatur ke nilai awal sementara perhitungan dilakukan
    ]);

    // Dapatkan data barang yang sesuai
    $barang = Barang::find($request->input('Kode_Barang'));

    // Simpan data ke tabel barang_notas
    $barangNota = BarangNota::create([
        'Kode_Nota' => $nota->KodeNota,
        'Kode_Barang' => $request->input('Kode_Barang'),
        'JumlahBarang' => $request->input('Jumlah'),
        'HargaSatuan' => 0, // Diatur ke nilai awal sementara perhitungan dilakukan
        'Jumlah' => 0, // Diatur ke nilai awal sementara perhitungan dilakukan
    ]);

    // Hitung total harga transaksi
    $totalHarga = $barang->HargaSatuan * $request->input('Jumlah');

    // Update nilai HargaSatuan dan Jumlah pada barangNota
    $barangNota->update([
        'HargaSatuan' => $barang->HargaSatuan,
        'Jumlah' => $totalHarga,
    ]);

    // Update nilai JumlahBelanja dan Total pada nota
    $nota->update([
        'JumlahBelanja' => $nota->JumlahBelanja + $totalHarga,
        'Total' => $nota->JumlahBelanja - ($nota->JumlahBelanja * ($request->input('Diskon') / 100)),
    ]);

    // Tampilkan struk atau redirect ke halaman struk
    return view('transaksi.struk', compact('nota', 'totalHarga'));
}

    public function show($id)
    {
        $nota = Nota::find($id);

        if (!$nota) {
            abort(404, 'Nota not found');
        }

        $barangNota = BarangNota::where('KodeNota', $nota->KodeNota)->get();

        return view('transaksi.show', compact('nota', 'barangNota'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $nota = Nota::find($id);

        if (!$nota) {
            abort(404, 'Nota not found');
        }

        $tenan = Tenan::all();
        $kasir = Kasir::all();
        $barang = Barang::all();
        $barangNota = BarangNota::where('KodeNota', $nota->KodeNota)->get();

        return view('transaksi.edit', compact('nota', 'tenan', 'kasir', 'barang', 'barangNota'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi request
        $validatedData = $request->validate([
            'KodeNota' => 'required',
            'Kode_Kasir' => 'required',
            'Kode_Tenan' => 'required',
            'tanggal' => 'required|date',
            'barang' => 'required|array',
            'barang.*.kode_barang' => 'required',
            'barang.*.jumlah' => 'required|integer|min:1',
        ]);

        // Cari dan update data nota
        $nota = Nota::find($id);

        if (!$nota) {
            abort(404, 'Nota not found');
        }

        $nota->update([
            'Kode_Kasir' => $validatedData['Kode_Kasir'],
            'Kode_Tenan' => $validatedData['Kode_Tenan'],
            'tanggal' => $validatedData['tanggal'],
        ]);

        // Hapus semua barang nota terkait
        BarangNota::where('KodeNota', $nota->KodeNota)->delete();

        // Hitung total harga transaksi
        $totalHarga = 0;

        // Simpan detail barang nota
        foreach ($validatedData['barang'] as $barang) {
            $barangModel = Barang::find($barang['kode_barang']);

            if ($barangModel) {
                $hargaSatuan = $barangModel->HargaSatuan;
                $totalHarga += $hargaSatuan * $barang['jumlah'];

                BarangNota::create([
                    'KodeNota' => $nota->KodeNota,
                    'Kode_Barang' => $barang['kode_barang'],
                    'JumlahBarang' => $barang['jumlah'],
                    'HargaSatuan' => $hargaSatuan,
                    'Jumlah' => $hargaSatuan * $barang['jumlah'],
                ]);
            }
        }

        // Tampilkan struk atau redirect ke halaman struk
        return view('transaksi.struk', compact('nota', 'totalHarga'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $nota = Nota::find($id);

        if (!$nota) {
            abort(404, 'Nota not found');
        }

        // Hapus semua barang nota terkait
        BarangNota::where('KodeNota', $nota->KodeNota)->delete();

        // Hapus nota
        $nota->delete();

        return redirect()->route('transaksi.index')->with('success', 'Transaction deleted successfully');
        
    }

    public function showStruk($id)
    {
        $nota = Nota::find($id);

        if (!$nota) {
            abort(404, 'Nota not found');
        }

        $barangNota = BarangNota::where('Kode_Nota', $nota->Kode_Nota)->get();

        return view('transaksi.struk', compact('nota', 'barangNota'));
    }
    
}
