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
        'id',
        'idOfferta',
        'nomeOfferta',
        'utility',
        'prezzoGas',
        'prezzoLuce',
        'quotaFissa',
        'codPod',
        'dataInizioValidita',
        'dataFineValidita',
        /*
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
        */
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'dataInizioValidita' => 'datetime',
        'dataFineValidita' => 'datetime'
    ];
        public function branch()
    {
        return $this->belongsTo(Branch::class, 'idSede');
    }

}
