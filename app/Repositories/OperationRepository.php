<?php

namespace App\Repositories;

use App\Models\Operation;
use App\Repositories\BaseRepository;

/**
 * Class OperationRepository
 * @package App\Repositories
 * @version August 30, 2020, 12:03 am UTC
*/

class OperationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'montant'
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
        return Operation::class;
    }
}
