<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Physique
 * @package App\Models
 * @version August 29, 2020, 11:53 pm UTC
 *
 */
class Physique extends Model
{
    use SoftDeletes;

    public $table = 'physiques';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'prenom',
        'nom',
        'adress',
        'email',
        'telephone',
        'sexe',
        'profession',
        'cni',
        'salaire',
        'morals_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
