<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Operation
 * @package App\Models
 * @version August 30, 2020, 12:03 am UTC
 *
 * @property string $montant
 */
class Operation extends Model
{
    use SoftDeletes;

    public $table = 'operations';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'montant',
        'comptes_id',
        'operationtypes_id',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'montant' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'montant' => 'required'
    ];

    
}
