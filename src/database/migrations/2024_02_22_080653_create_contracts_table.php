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
        Schema::create('contracts', function (Blueprint $table) {
            $table->id('idContratto');
            $table->bigInteger('idSede',false,true)->nullable();
            $table->foreign('idSede')->references('idSede')->on('branches');
            $table->bigInteger('id',false,true);
            $table->foreign('id')->references('id')->on('users');
            $table->bigInteger('idOfferta',false,true);
            $table->foreign('idOfferta')->references('idOfferta')->on('offers');
            $table->string('nomeOfferta');
            $table->string('utility');
            $table->string('indirizzo');
            $table->string('civico');
            $table->string('CAP');
            $table->string('comune');
            $table->string('provincia');
            $table->decimal('prezzoGas', 8, 2)->nullable();
            $table->string('codPod'); // IT001E123456789 IT -> NAZIONE, 001 -> CODICE SOCIETÀ DI DISTRIBUZIONE, E-> SIGLA FISSA STABILITA DA ARERA, 12345678 -> CODICE IDENTIDICATIVO CONTATORE, 9 -> CODICE DI CONTROLLO
            $table->decimal('prezzoLuce', 8, 2)->nullable();
            $table->decimal('quotaFissa', 8, 2);
            $table->dateTime('dataInizioValidita');
            $table->dateTime('dataFineValidita')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};
