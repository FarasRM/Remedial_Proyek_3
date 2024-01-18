<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(KasirSeeder::class);
        $this->call(TenanSeeder::class);
        $this->call(BarangSeeder::class);
        $this->call(NotaSeeder::class);
        // $this->call(BarangNotaSeeder::class);
    }
}
