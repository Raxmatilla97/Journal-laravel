<?php

namespace App\Http\Controllers\API\V1\Jurnallar;

use App\Http\Requests\API\V1\Jurnallar\CreateJurnalToplamiAPIRequest;
use App\Http\Requests\API\V1\Jurnallar\UpdateJurnalToplamiAPIRequest;
use App\Models\V1\Jurnallar\JurnalToplami;
use App\Repositories\V1\Jurnallar\JurnalToplamiRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class JurnalToplamiController
 * @package App\Http\Controllers\API\V1\Jurnallar
 */

class JurnalToplamiAPIController extends AppBaseController
{
    /** @var  JurnalToplamiRepository */
    private $jurnalToplamiRepository;

    public function __construct(JurnalToplamiRepository $jurnalToplamiRepo)
    {
        $this->jurnalToplamiRepository = $jurnalToplamiRepo;
    }

    /**
     * Display a listing of the JurnalToplami.
     * GET|HEAD /jurnalToplamlari
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $jurnalToplamlari = $this->jurnalToplamiRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($jurnalToplamlari->toArray(), 'Jurnal Toplamlari retrieved successfully');
    }

    /**
     * Store a newly created JurnalToplami in storage.
     * POST /jurnalToplamlari
     *
     * @param CreateJurnalToplamiAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateJurnalToplamiAPIRequest $request)
    {
        $input = $request->all();

        $jurnalToplami = $this->jurnalToplamiRepository->create($input);

        return $this->sendResponse($jurnalToplami->toArray(), 'Jurnal Toplami saved successfully');
    }

    /**
     * Display the specified JurnalToplami.
     * GET|HEAD /jurnalToplamlari/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var JurnalToplami $jurnalToplami */
        $jurnalToplami = $this->jurnalToplamiRepository->find($id);

        if (empty($jurnalToplami)) {
            return $this->sendError('Jurnal Toplami not found');
        }

        return $this->sendResponse($jurnalToplami->toArray(), 'Jurnal Toplami retrieved successfully');
    }

    /**
     * Update the specified JurnalToplami in storage.
     * PUT/PATCH /jurnalToplamlari/{id}
     *
     * @param int $id
     * @param UpdateJurnalToplamiAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateJurnalToplamiAPIRequest $request)
    {
        $input = $request->all();

        /** @var JurnalToplami $jurnalToplami */
        $jurnalToplami = $this->jurnalToplamiRepository->find($id);

        if (empty($jurnalToplami)) {
            return $this->sendError('Jurnal Toplami not found');
        }

        $jurnalToplami = $this->jurnalToplamiRepository->update($input, $id);

        return $this->sendResponse($jurnalToplami->toArray(), 'JurnalToplami updated successfully');
    }

    /**
     * Remove the specified JurnalToplami from storage.
     * DELETE /jurnalToplamlari/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var JurnalToplami $jurnalToplami */
        $jurnalToplami = $this->jurnalToplamiRepository->find($id);

        if (empty($jurnalToplami)) {
            return $this->sendError('Jurnal Toplami not found');
        }

        $jurnalToplami->delete();

        return $this->sendSuccess('Jurnal Toplami deleted successfully');
    }
}
