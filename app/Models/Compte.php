<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Compte
 * @package App\Models
 * @version August 29, 2020, 11:51 pm UTC
 *
 * @property string $numAgence
 * @property string $numCompte
 * @property string $rib
 * @property string $debutBlocage
 * @property string $finBlocage
 */
class Compte extends Model
{
    use SoftDeletes;

    public $table = 'comptes';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'numAgence',
        'numCompte',
        'rib',
        'debutBlocage',
        'finBlocage',
        'morals_id',
        'physiques_id',
        'typecomptes_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'numAgence' => 'string',
        'numCompte' => 'string',
        'rib' => 'string',
        'debutBlocage' => 'string',
        'finBlocage' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'numAgence' => 'required',
        'numCompte' => 'required'
    ];

    
}
