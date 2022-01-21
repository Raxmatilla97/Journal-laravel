<?php

namespace App\Http\Controllers\V1\Jurnallar;

use App\DataTables\V1\Jurnallar\JurnalToplamiDataTable;
use App\Http\Requests\V1\Jurnallar;
use App\Http\Requests\V1\Jurnallar\CreateJurnalToplamiRequest;
use App\Http\Requests\V1\Jurnallar\UpdateJurnalToplamiRequest;
use App\Repositories\V1\Jurnallar\JurnalToplamiRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class JurnalToplamiController extends AppBaseController
{
    /** @var  JurnalToplamiRepository */
    private $jurnalToplamiRepository;

    public function __construct(JurnalToplamiRepository $jurnalToplamiRepo)
    {
        $this->jurnalToplamiRepository = $jurnalToplamiRepo;
    }

    /**
     * Display a listing of the JurnalToplami.
     *
     * @param JurnalToplamiDataTable $jurnalToplamiDataTable
     * @return Response
     */
    public function index(JurnalToplamiDataTable $jurnalToplamiDataTable)
    {
        return $jurnalToplamiDataTable->render('v1.jurnallar.jurnal_toplamlari.index');
    }

    /**
     * Show the form for creating a new JurnalToplami.
     *
     * @return Response
     */
    public function create()
    {
        return view('v1.jurnallar.jurnal_toplamlari.create');
    }

    /**
     * Store a newly created JurnalToplami in storage.
     *
     * @param CreateJurnalToplamiRequest $request
     *
     * @return Response
     */
    public function store(CreateJurnalToplamiRequest $request)
    {
        $input = $request->all();

        $jurnalToplami = $this->jurnalToplamiRepository->create($input);

        Flash::success('Jurnal Toplami saved successfully.');

        return redirect(route('v1.jurnallar.jurnalToplamlari.index'));
    }

    /**
     * Display the specified JurnalToplami.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $jurnalToplami = $this->jurnalToplamiRepository->find($id);

        if (empty($jurnalToplami)) {
            Flash::error('Jurnal Toplami not found');

            return redirect(route('v1.jurnallar.jurnalToplamlari.index'));
        }

        return view('v1.jurnallar.jurnal_toplamlari.show')->with('jurnalToplami', $jurnalToplami);
    }

    /**
     * Show the form for editing the specified JurnalToplami.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $jurnalToplami = $this->jurnalToplamiRepository->find($id);

        if (empty($jurnalToplami)) {
            Flash::error('Jurnal Toplami not found');

            return redirect(route('v1.jurnallar.jurnalToplamlari.index'));
        }

        return view('v1.jurnallar.jurnal_toplamlari.edit')->with('jurnalToplami', $jurnalToplami);
    }

    /**
     * Update the specified JurnalToplami in storage.
     *
     * @param  int              $id
     * @param UpdateJurnalToplamiRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateJurnalToplamiRequest $request)
    {
        $jurnalToplami = $this->jurnalToplamiRepository->find($id);

        if (empty($jurnalToplami)) {
            Flash::error('Jurnal Toplami not found');

            return redirect(route('v1.jurnallar.jurnalToplamlari.index'));
        }

        $jurnalToplami = $this->jurnalToplamiRepository->update($request->all(), $id);

        Flash::success('Jurnal Toplami updated successfully.');

        return redirect(route('v1.jurnallar.jurnalToplamlari.index'));
    }

    /**
     * Remove the specified JurnalToplami from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $jurnalToplami = $this->jurnalToplamiRepository->find($id);

        if (empty($jurnalToplami)) {
            Flash::error('Jurnal Toplami not found');

            return redirect(route('v1.jurnallar.jurnalToplamlari.index'));
        }

        $this->jurnalToplamiRepository->delete($id);

        Flash::success('Jurnal Toplami deleted successfully.');

        return redirect(route('v1.jurnallar.jurnalToplamlari.index'));
    }
}
