<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Offer extends Model
{
    use HasFactory;
    protected $table = 'offers';

    protected $primaryKey = 'idOfferta';

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'idFornitore',
        'nomeOfferta',
        'utility',
        'prezzoGas',
        'prezzoLuce',
        'quotaFissa',
    ];

}
