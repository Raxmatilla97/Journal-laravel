<?php

namespace App\Http\Controllers\V1\Jurnallar;

use App\DataTables\V1\Jurnallar\JurnallarDataTable;
use App\Http\Requests\V1\Jurnallar;
use App\Http\Requests\V1\Jurnallar\CreateJurnallarRequest;
use App\Http\Requests\V1\Jurnallar\UpdateJurnallarRequest;
use App\Repositories\V1\Jurnallar\JurnallarRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class JurnallarController extends AppBaseController
{
    /** @var  JurnallarRepository */
    private $jurnallarRepository;

    public function __construct(JurnallarRepository $jurnallarRepo)
    {
        $this->jurnallarRepository = $jurnallarRepo;
    }

    /**
     * Display a listing of the Jurnallar.
     *
     * @param JurnallarDataTable $jurnallarDataTable
     * @return Response
     */
    public function index(JurnallarDataTable $jurnallarDataTable)
    {
        return $jurnallarDataTable->render('v1.jurnallar.jurnallar.index');
    }

    /**
     * Show the form for creating a new Jurnallar.
     *
     * @return Response
     */
    public function create()
    {
        return view('v1.jurnallar.jurnallar.create');
    }

    /**
     * Store a newly created Jurnallar in storage.
     *
     * @param CreateJurnallarRequest $request
     *
     * @return Response
     */
    public function store(CreateJurnallarRequest $request)
    {
        $input = $request->all();

        $jurnallar = $this->jurnallarRepository->create($input);

        Flash::success('Jurnallar saved successfully.');

        return redirect(route('v1.jurnallar.jurnallar.index'));
    }

    /**
     * Display the specified Jurnallar.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $jurnallar = $this->jurnallarRepository->find($id);

        if (empty($jurnallar)) {
            Flash::error('Jurnallar not found');

            return redirect(route('v1.jurnallar.jurnallar.index'));
        }

        return view('v1.jurnallar.jurnallar.show')->with('jurnallar', $jurnallar);
    }

    /**
     * Show the form for editing the specified Jurnallar.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $jurnallar = $this->jurnallarRepository->find($id);

        if (empty($jurnallar)) {
            Flash::error('Jurnallar not found');

            return redirect(route('v1.jurnallar.jurnallar.index'));
        }

        return view('v1.jurnallar.jurnallar.edit')->with('jurnallar', $jurnallar);
    }

    /**
     * Update the specified Jurnallar in storage.
     *
     * @param  int              $id
     * @param UpdateJurnallarRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateJurnallarRequest $request)
    {
        $jurnallar = $this->jurnallarRepository->find($id);

        if (empty($jurnallar)) {
            Flash::error('Jurnallar not found');

            return redirect(route('v1.jurnallar.jurnallar.index'));
        }

        $jurnallar = $this->jurnallarRepository->update($request->all(), $id);

        Flash::success('Jurnallar updated successfully.');

        return redirect(route('v1.jurnallar.jurnallar.index'));
    }

    /**
     * Remove the specified Jurnallar from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $jurnallar = $this->jurnallarRepository->find($id);

        if (empty($jurnallar)) {
            Flash::error('Jurnallar not found');

            return redirect(route('v1.jurnallar.jurnallar.index'));
        }

        $this->jurnallarRepository->delete($id);

        Flash::success('Jurnallar deleted successfully.');

        return redirect(route('v1.jurnallar.jurnallar.index'));
    }
}
