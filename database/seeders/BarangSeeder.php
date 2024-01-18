<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $numberOfRecords = 5;

        for ($i = 1; $i <= $numberOfRecords; $i++) {
            // Change the values in the 'insert' method based on your requirements
            Barang::create([
                'KodeBarang' => 'BRG2215110540' . $i,
                'NamaBarang' => 'Indomie Rasa [Mahes]' . $i,
                'Satuan' => $i === 1 ? 'Bungkus' : 'Pcs',
                'HargaSatuan' => $i === 1 ? 3000 : 5000,
                'Stok' => $i === 1 ? 50 : 100,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
