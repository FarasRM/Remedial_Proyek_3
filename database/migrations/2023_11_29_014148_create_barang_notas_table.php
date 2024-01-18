<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('barang_notas', function (Blueprint $table) {
            $table->id();
            $table->string('Kode_Nota')->nullable();
            $table->foreign('Kode_Nota')->references('KodeNota')->on('notas')->onDelete("cascade");
            $table->string('Kode_Kasir')->nullable();
$table->foreign('Kode_Kasir')->references('KodeKasir')->on('kasirs')->onDelete("cascade");

            $table->integer('JumlahBarang');
            $table->integer('HargaSatuan');
            $table->integer('Jumlah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang_notas');
    }
};
