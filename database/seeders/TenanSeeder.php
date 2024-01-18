<?php

namespace Database\Seeders;

use App\Models\Tenan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TenanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $numberOfRecords = 5;

        for ($i = 1; $i <= $numberOfRecords; $i++) {
            // Change the values in the 'fill' method based on your requirements
            Tenan::create([
                'KodeTenan' => 'TK[221511054]0' . $i, // You might want to generate a unique code here
                'NamaTenan' => 'Mahesya Maret ' . $i,
                'HP' => '08221511054375', // Replace with the actual value for 'HP'
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
