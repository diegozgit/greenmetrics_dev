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
        Schema::create('users', function (Blueprint $table) {
            $table->id('id');
            $table->string('nome')->nullable();
            $table->string('cognome')->nullable();
            $table->string('ragioneSociale');
            $table->string('partitaIva')->unique()->nullable();
            $table->string('codFiscale')->unique()->nullable();
            $table->string('indirizzo');
            $table->string('civico');
            $table->string('CAP');
            $table->string('comune');
            $table->string('provincia');
            $table->string('numTelefono')->nullable();
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
         });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
