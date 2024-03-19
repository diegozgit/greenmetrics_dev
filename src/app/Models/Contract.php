<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contract extends Model
{
    use HasFactory;
    protected $table = 'contracts';

    protected $primaryKey = 'idContratto';

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'idSede',
        'dataRichiestaServizio',
        'dataInizioValidita',
        'dataFineValidita',
        'descrizioneOfferta',
        'utility',
        'statoContratto',
        'tipoPagamento',
        'potenzaImp',
        'potDisp',
        'energiaAnno',
        'gasAnno',
        'usoCotturaCibi',
        'produzioneAcquaCaldaSanitaria',
        'riscaldamentoIndividuale',
        'usoCommerciale',
    ];

    protected $casts = [
        'dataRichiestaServizio' => 'datetime',
        'dataInizioValidita' => 'datetime',
        'dataFineValidita' => 'datetime',
        'usoCotturaCibi' => 'boolean',
        'produzioneAcquaCaldaSanitaria' => 'boolean',
        'riscaldamentoIndividuale' => 'boolean',
        'usoCommerciale' => 'boolean',
    ];

}
