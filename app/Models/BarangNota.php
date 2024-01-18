<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangNota extends Model
{
    use HasFactory;

    protected $fillable = ['Kode_Nota', 'Kode_Barang', 'JumlahBarang', 'HargaSatuan', 'Jumlah'];

    // Relasi dengan model Nota
    public function nota()
    {
        return $this->belongsTo(Nota::class, 'Kode_Nota', 'id');
    }

    // Relasi dengan model Barang
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'Kode_Barang', 'id');
    }
}

