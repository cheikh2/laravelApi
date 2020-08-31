<?php

namespace App\Repositories;

use App\Models\Moral;
use App\Repositories\BaseRepository;

/**
 * Class MoralRepository
 * @package App\Repositories
 * @version August 26, 2020, 10:47 am UTC
*/

class MoralRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nomEmpl',
        'ninea',
        'rc',
        'adressEmpl',
        'raisonSocial'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Moral::class;
    }
}
