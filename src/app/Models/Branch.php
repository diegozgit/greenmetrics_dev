<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $table = 'branches';

    protected $primaryKey = 'idSede';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'descrizione',
        'indirizzo',
        'civico',
        'CAP',
        'localita',
        'provincia',
        'nazione',
    ];

    protected function getBranchByIdSede($idSede)
    {
        $branch = self::where('idSede', $idSede)->first();

        return $branch ? $branch->descrizione . ", " . $branch->indirizzo . " " . $branch->civico . " " . $branch->localita . ", " . $branch->provincia . " " . $branch->nazione: 'N/A'; // Return description or 'N/A' if not found
    }

}
