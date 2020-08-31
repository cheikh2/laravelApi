<?php

namespace App\Repositories;

use App\Models\Operationtype;
use App\Repositories\BaseRepository;

/**
 * Class OperationtypeRepository
 * @package App\Repositories
 * @version August 30, 2020, 12:01 am UTC
*/

class OperationtypeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'libelle'
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
        return Operationtype::class;
    }
}
