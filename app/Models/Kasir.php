<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kasir extends Model
{
    use HasFactory;

    protected $primaryKey = 'KodeKasir';
    public $incrementing = false;
    protected $fillable = ['KodeKasir', 'Nama', 'HP'];
    public $timestamps = true;
}
