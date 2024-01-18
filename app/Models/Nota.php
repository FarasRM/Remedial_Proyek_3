<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;
    protected $primaryKey = 'KodeNota';
    public $incrementing = false;
    protected $fillable = ['KodeNota','Kode_Tenan', 'Kode_Kasir','JumlahBelanja', 'Diskon','Total'];

}
