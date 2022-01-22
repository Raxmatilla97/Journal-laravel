<?php

namespace App\Http\Controllers\API\V1\Jurnallar;

use App\Http\Requests\API\V1\Jurnallar\CreateJurnallarAPIRequest;
use App\Http\Requests\API\V1\Jurnallar\UpdateJurnallarAPIRequest;
use App\Models\V1\Jurnallar\Jurnallar;
use App\Repositories\V1\Jurnallar\JurnallarRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class JurnallarController
 * @package App\Http\Controllers\API\V1\Jurnallar
 */

class JurnallarAPIController extends AppBaseController
{
    /** @var  JurnallarRepository */
    private $jurnallarRepository;

    public function __construct(JurnallarRepository $jurnallarRepo)
    {
        $this->jurnallarRepository = $jurnallarRepo;
    }

    /**
     * Display a listing of the Jurnallar.
     * GET|HEAD /jurnallar
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $jurnallar = $this->jurnallarRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($jurnallar->toArray(), 'Jurnallar retrieved successfully');
    }

    /**
     * Store a newly created Jurnallar in storage.
     * POST /jurnallar
     *
     * @param CreateJurnallarAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateJurnallarAPIRequest $request)
    {
        $input = $request->all();

        $jurnallar = $this->jurnallarRepository->create($input);

        return $this->sendResponse($jurnallar->toArray(), 'Jurnallar saved successfully');
    }

    /**
     * Display the specified Jurnallar.
     * GET|HEAD /jurnallar/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Jurnallar $jurnallar */
        $jurnallar = $this->jurnallarRepository->find($id);

        if (empty($jurnallar)) {
            return $this->sendError('Jurnallar not found');
        }

        return $this->sendResponse($jurnallar->toArray(), 'Jurnallar retrieved successfully');
    }

    /**
     * Update the specified Jurnallar in storage.
     * PUT/PATCH /jurnallar/{id}
     *
     * @param int $id
     * @param UpdateJurnallarAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateJurnallarAPIRequest $request)
    {
        $input = $request->all();

        /** @var Jurnallar $jurnallar */
        $jurnallar = $this->jurnallarRepository->find($id);

        if (empty($jurnallar)) {
            return $this->sendError('Jurnallar not found');
        }

        $jurnallar = $this->jurnallarRepository->update($input, $id);

        return $this->sendResponse($jurnallar->toArray(), 'Jurnallar updated successfully');
    }

    /**
     * Remove the specified Jurnallar from storage.
     * DELETE /jurnallar/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Jurnallar $jurnallar */
        $jurnallar = $this->jurnallarRepository->find($id);

        if (empty($jurnallar)) {
            return $this->sendError('Jurnallar not found');
        }

        $jurnallar->delete();

        return $this->sendSuccess('Jurnallar deleted successfully');
    }
}
