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
        Schema::create('branches', function (Blueprint $table) {
            $table->id('idSede');
            $table->bigInteger('id',false,true);
            $table->foreign('id')->references('id')->on('users');
            $table->string('descrizione');
            $table->string('indirizzo');
            $table->string('civico');
            $table->string('CAP');
            $table->string('localita');
            $table->string('provincia');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branches');
    }
};
