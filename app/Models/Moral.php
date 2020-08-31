<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Moral
 * @package App\Models
 * @version August 26, 2020, 10:47 am UTC
 *
 * @property string $nomEmpl
 * @property string $ninea
 * @property string $rc
 * @property string $adressEmpl
 * @property string $raisonSocial
 */
class Moral extends Model
{
    use SoftDeletes;

    public $table = 'morals';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nomEmpl',
        'ninea',
        'rc',
        'adressEmpl',
        'raisonSocial'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nomEmpl' => 'string',
        'ninea' => 'string',
        'rc' => 'string',
        'adressEmpl' => 'string',
        'raisonSocial' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nomEmpl' => 'required',
        'adressEmpl' => 'required'
    ];

    
}
