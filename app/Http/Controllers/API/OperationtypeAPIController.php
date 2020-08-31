<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateOperationtypeAPIRequest;
use App\Http\Requests\API\UpdateOperationtypeAPIRequest;
use App\Models\Operationtype;
use App\Repositories\OperationtypeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class OperationtypeController
 * @package App\Http\Controllers\API
 */

class OperationtypeAPIController extends AppBaseController
{
    /** @var  OperationtypeRepository */
    private $operationtypeRepository;

    public function __construct(OperationtypeRepository $operationtypeRepo)
    {
        $this->operationtypeRepository = $operationtypeRepo;
    }

    /**
     * Display a listing of the Operationtype.
     * GET|HEAD /operationtypes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $operationtypes = $this->operationtypeRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($operationtypes->toArray(), 'Operationtypes retrieved successfully');
    }

    /**
     * Store a newly created Operationtype in storage.
     * POST /operationtypes
     *
     * @param CreateOperationtypeAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateOperationtypeAPIRequest $request)
    {
        $input = $request->all();

        $operationtype = $this->operationtypeRepository->create($input);

        return $this->sendResponse($operationtype->toArray(), 'Operationtype saved successfully');
    }

    /**
     * Display the specified Operationtype.
     * GET|HEAD /operationtypes/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Operationtype $operationtype */
        $operationtype = $this->operationtypeRepository->find($id);

        if (empty($operationtype)) {
            return $this->sendError('Operationtype not found');
        }

        return $this->sendResponse($operationtype->toArray(), 'Operationtype retrieved successfully');
    }

    /**
     * Update the specified Operationtype in storage.
     * PUT/PATCH /operationtypes/{id}
     *
     * @param int $id
     * @param UpdateOperationtypeAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOperationtypeAPIRequest $request)
    {
        $input = $request->all();

        /** @var Operationtype $operationtype */
        $operationtype = $this->operationtypeRepository->find($id);

        if (empty($operationtype)) {
            return $this->sendError('Operationtype not found');
        }

        $operationtype = $this->operationtypeRepository->update($input, $id);

        return $this->sendResponse($operationtype->toArray(), 'Operationtype updated successfully');
    }

    /**
     * Remove the specified Operationtype from storage.
     * DELETE /operationtypes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Operationtype $operationtype */
        $operationtype = $this->operationtypeRepository->find($id);

        if (empty($operationtype)) {
            return $this->sendError('Operationtype not found');
        }

        $operationtype->delete();

        return $this->sendSuccess('Operationtype deleted successfully');
    }
}
