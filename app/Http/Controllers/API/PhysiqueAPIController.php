<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePhysiqueAPIRequest;
use App\Http\Requests\API\UpdatePhysiqueAPIRequest;
use App\Models\Physique;
use App\Repositories\PhysiqueRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class PhysiqueController
 * @package App\Http\Controllers\API
 */

class PhysiqueAPIController extends AppBaseController
{
    /** @var  PhysiqueRepository */
    private $physiqueRepository;

    public function __construct(PhysiqueRepository $physiqueRepo)
    {
        $this->physiqueRepository = $physiqueRepo;
    }

    /**
     * Display a listing of the Physique.
     * GET|HEAD /physiques
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $physiques = $this->physiqueRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($physiques->toArray(), 'Physiques retrieved successfully');
    }

    /**
     * Store a newly created Physique in storage.
     * POST /physiques
     *
     * @param CreatePhysiqueAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePhysiqueAPIRequest $request)
    {
        $input = $request->all();

        $physique = $this->physiqueRepository->create($input);

        return $this->sendResponse($physique->toArray(), 'Physique saved successfully');
    }

    /**
     * Display the specified Physique.
     * GET|HEAD /physiques/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Physique $physique */
        $physique = $this->physiqueRepository->find($id);

        if (empty($physique)) {
            return $this->sendError('Physique not found');
        }

        return $this->sendResponse($physique->toArray(), 'Physique retrieved successfully');
    }

    /**
     * Update the specified Physique in storage.
     * PUT/PATCH /physiques/{id}
     *
     * @param int $id
     * @param UpdatePhysiqueAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePhysiqueAPIRequest $request)
    {
        $input = $request->all();

        /** @var Physique $physique */
        $physique = $this->physiqueRepository->find($id);

        if (empty($physique)) {
            return $this->sendError('Physique not found');
        }

        $physique = $this->physiqueRepository->update($input, $id);

        return $this->sendResponse($physique->toArray(), 'Physique updated successfully');
    }

    /**
     * Remove the specified Physique from storage.
     * DELETE /physiques/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Physique $physique */
        $physique = $this->physiqueRepository->find($id);

        if (empty($physique)) {
            return $this->sendError('Physique not found');
        }

        $physique->delete();

        return $this->sendSuccess('Physique deleted successfully');
    }
}
