<?php

namespace App\Repositories;

use App\Models\Physique;
use App\Repositories\BaseRepository;

/**
 * Class PhysiqueRepository
 * @package App\Repositories
 * @version August 29, 2020, 11:53 pm UTC
*/

class PhysiqueRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
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
        return Physique::class;
    }
}
