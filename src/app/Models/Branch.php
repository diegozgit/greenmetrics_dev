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
        'indirizzo',
        'civico',
        'CAP',
        'comune',
        'provincia',
    ];

    protected function getBranchByIdSede($idSede)
    {
        $branch = self::where('idSede', $idSede)->first();

        return $branch ? $branch->indirizzo . " " . $branch->civico . " " . $branch->comune . ", " . $branch->provincia: 'N/A'; // Return description or 'N/A' if not found
    }

}
