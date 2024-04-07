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
            $table->string('nomeOfferta');
            $table->string('tipoContratto');
            $table->decimal('prezzoGas', 8, 2)->nullable();
            $table->decimal('prezzoLuce', 8, 2)->nullable();
            $table->decimal('quotaFissa', 8, 2);
            /*
            $table->dateTime('dataRichiestaServizio');
            $table->dateTime('dataInizioValidita');
            $table->dateTime('dataFineValidita');
            $table->string('descrizioneOfferta');
            $table->string('utility');
            $table->string('statoContratto');
            $table->string('tipoPagamento');
            $table->decimal('potenzaImp', 8, 2);
            $table->decimal('potDisp', 8, 2);
            $table->integer('energiaAnno')->nullable();
            $table->integer('gasAnno')->nullable();
            $table->integer('usoCotturaCibi')->nullable();
            $table->integer('produzioneAcquaCaldaSanitaria')->nullable();
            $table->integer('riscaldamentoIndividuale')->nullable();
            $table->integer('usoCommerciale')->nullable();
            */
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
