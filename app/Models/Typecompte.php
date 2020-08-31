<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Typecompte
 * @package App\Models
 * @version August 29, 2020, 11:56 pm UTC
 *
 * @property string $libelle
 */
class Typecompte extends Model
{
    use SoftDeletes;

    public $table = 'typecomptes';
    

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
        'libelle' => 'required'
    ];

    
}
