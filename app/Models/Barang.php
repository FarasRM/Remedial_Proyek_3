<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $primaryKey = 'KodeBarang';
    public $incrementing = false;
    protected $fillable = ['KodeBarang', 'NamaBarang','Satuan', 'HargaSatuan', 'Stok'];
}
