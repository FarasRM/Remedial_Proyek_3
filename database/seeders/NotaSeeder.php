<?php

namespace Database\Seeders;

use App\Models\Nota;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Nota::create([
            'KodeNota' => 'NO[221511054]01', // You might want to generate a unique code here
            'Kode_Tenan' => 'TK[221511054]01',
            'Kode_Kasir' => 'KS[221511054]01',
            'JumlahBelanja' => '30000', // Replace with the actual value for 'HP'
            'Diskon' => '0',
            'Total' => '30000', // Replace with the actual value for 'HP'
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
