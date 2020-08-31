<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Operationtype
 * @package App\Models
 * @version August 30, 2020, 12:01 am UTC
 *
 * @property string $libelle
 */
class Operationtype extends Model
{
    use SoftDeletes;

    public $table = 'operationtypes';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'libelle'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'libelle' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
