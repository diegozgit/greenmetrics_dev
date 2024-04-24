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
        Schema::create('offers', function (Blueprint $table) {
            $table->id('idOfferta');
            $table->bigInteger('idFornitore',false,true);
            $table->foreign('idFornitore')->references('idFornitore')->on('suppliers');
            $table->string('nomeOfferta');
            $table->string('utility');
            $table->decimal('prezzoGas', 8, 2)->nullable();
            $table->decimal('prezzoLuce', 8, 2)->nullable();
            $table->decimal('quotaFissa', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offers');
    }
};
