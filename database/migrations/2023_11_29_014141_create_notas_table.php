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
        Schema::create('notas', function (Blueprint $table) {
            $table->string("KodeNota")->primary();
            $table->string('Kode_Tenan')->nullable();
            $table->foreign('Kode_Tenan')->references('KodeTenan')->on('tenans')->onDelete("cascade");
            $table->string('Kode_Kasir')->nullable();
$table->foreign('Kode_Kasir')->references('KodeKasir')->on('kasirs')->onDelete("cascade");

            $table->integer('JumlahBelanja');
            $table->integer('Diskon');
            $table->integer('Total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notas');
    }
};
