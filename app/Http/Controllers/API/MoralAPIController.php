<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMoralAPIRequest;
use App\Http\Requests\API\UpdateMoralAPIRequest;
use App\Models\Moral;
use App\Repositories\MoralRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class MoralController
 * @package App\Http\Controllers\API
 */

class MoralAPIController extends AppBaseController
{
    /** @var  MoralRepository */
    private $moralRepository;

    public function __construct(MoralRepository $moralRepo)
    {
        $this->moralRepository = $moralRepo;
    }

    /**
     * Display a listing of the Moral.
     * GET|HEAD /morals
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $morals = $this->moralRepository->all(
            // $request->except(['skip', 'limit']),
            // $request->get('skip'),
            // $request->get('limit')
        );

        return $this->sendResponse($morals->toArray(), 'Morals retrieved successfully');
    }

    /**
     * Store a newly created Moral in storage.
     * POST /morals
     *
     * @param CreateMoralAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateMoralAPIRequest $request)
    {
        $input = $request->all();

        $moral = $this->moralRepository->create($input);

        return $this->sendResponse($moral->toArray(), 'client moral crée avec succès');
    }

    /**
     * Display the specified Moral.
     * GET|HEAD /morals/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Moral $moral */
        $moral = $this->moralRepository->find($id);

        if (empty($moral)) {
            return $this->sendError('Moral not found');
        }

        return $this->sendResponse($moral->toArray(), 'client moral retrieved successfully');
    }

    /**
     * Update the specified Moral in storage.
     * PUT/PATCH /morals/{id}
     *
     * @param int $id
     * @param UpdateMoralAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMoralAPIRequest $request)
    {
        $input = $request->all();

        /** @var Moral $moral */
        $moral = $this->moralRepository->find($id);

        if (empty($moral)) {
            return $this->sendError('Moral not found');
        }

        $moral = $this->moralRepository->update($input, $id);

        return $this->sendResponse($moral->toArray(), 'client moral modifié avec succès');
    }

    /**
     * Remove the specified Moral from storage.
     * DELETE /morals/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Moral $moral */
        $moral = $this->moralRepository->find($id);

        if (empty($moral)) {
            return $this->sendError('Moral not found');
        }

        $moral->delete();

        return $this->sendSuccess('client moral supprimé succès');
    }
}
