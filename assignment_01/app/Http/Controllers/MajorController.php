<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MajorRequest;
use App\Contracts\Services\MajorServiceInterface;

class MajorController extends Controller
{
    private $majorService;

    /**
     * Constructor function
     *
     * @param MajorServiceInterface $majorService
     */
    public function __construct(MajorServiceInterface $majorService)
    {
        $this->majorService = $majorService;
    }

    /**
     *show index
     *
     *return @string
     */
    public function index()
    {
        $majors = $this->majorService->getAllMajors();
        return view('major.list', compact('majors'));
    }

    /**
     *show create
     *
     *return @string
     */
    public function create()
    {
        return view('major.create');
    }

    /**
     *show store
     *
     *return @string
     */
    public function store(MajorRequest $request)
    {
        $this->majorService->create($request->all());
        return back()->with(['success' => 'Successful']);
    }

    /**
     *show delete
     *
     *return @string
     */
    public function delete(int $id)
    {
        $this->majorService->destroy($id);
        return back()->with(['success' => 'Successful']);
    }

    /**
     *show edit
     *
     *return @string
     */
    public function edit(int $id)
    {
        $major = $this->majorService->getMajorById($id);
        return view('major.edit', compact('major'));
    }

    /**
     *show update
     *
     *return @string
     */
    public function update(MajorRequest $request, int $id)
    {
        $this->majorService->update($request->all(), $id);
        return back()->with(['success' => 'Successful']);
    }
}
