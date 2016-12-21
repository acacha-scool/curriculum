<?php

namespace Scool\Curriculum\Http\Controllers;

use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Scool\Curriculum\Http\Requests\StudyCreateRequest;
use Scool\Curriculum\Http\Requests\StudyUpdateRequest;
use Scool\Curriculum\Repositories\StudyRepository;
use Scool\Curriculum\Validators\StudyValidator;

/**
 * Class StudiesController.
 *
 * @package Scool\Curriculum\Http\Controllers
 */
class StudiesController extends Controller
{

    /**
     * @var StudyRepository
     */
    protected $repository;

    /**
     * @var StudyValidator
     */
    protected $validator;

    public function __construct(StudyRepository $repository, StudyValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $studies = $this->repository->all();
        if (request()->wantsJson()) {

            return response()->json([
                'data' => $studies,
            ]);
        }
        return view('studies.index', compact('studies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StudyCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StudyCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $study = $this->repository->create($request->all());

            $response = [
                'message' => 'Study created.',
                'data'    => $study->toArray(),
            ];
            // XHR : API petició ajax XML HTTP Request
            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $study = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $study,
            ]);
        }

        return view('studies.show', compact('study'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $study = $this->repository->find($id);

        return view('studies.edit', compact('study'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  StudyUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(StudyUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $study = $this->repository->update($id, $request->all());

            $response = [
                'message' => 'Study updated.',
                'data'    => $study->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Study deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Study deleted.');
    }
}
