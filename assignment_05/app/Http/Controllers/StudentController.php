<?php

namespace App\Http\Controllers;

use App\DAO\StudentDAO;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;
use App\Contracts\Services\StudentServiceInterface;
use ComposerAutoloaderInit9c491b8531eec05ba41a11d9276a5749;
use Illuminate\Support\Facades\Mail;
use App\Mail\AccountCreated;


class StudentController extends Controller
{

    private $studentService;
    private $studentDAO;

    /**
     * Constructor function
     *
     * @param StudentServiceInterface $studentService
     */
    public function __construct(StudentServiceInterface $studentService, StudentDAO $studentDAO)
    {
        $this->studentService = $studentService;
        $this->studentDAO = $studentDAO;
    }

    /**
     *show index
     *
     *return @string
     */
    public function index()
    {
        $students = $this->studentService->getAllStudents();
        $majors = $this->studentService->getAllMajors();
        return view('student.list', compact('students', 'majors'));
    }

    /**
     *show create
     *
     *return  @string
     */
    public function createStudent()
    {
        $majors = $this->studentService->getAllMajors();
        return view('student.create', compact('majors'));
    }

    /**
     *show store
     *
     *return @collection
     */
    public function store(StudentRequest $request)
    {
        $student = $this->studentService->create($request->all());
        dd($student);
        Mail::to($student->email)->send(new AccountCreated($student));
        return back()->with(['success' => 'Successful']);

    }

    /**
     *show delete
     *
     *return @string
     */
    public function delete(int $id)
    {
        $this->studentService->destroy($id);
        return back()->with(['success' => 'Successful']);
    }

    /**
     *show edit
     *
     *return @string
     */
    public function edit(int $id)
    {
        $student = $this->studentService->getStudentById($id);
        $majors = $this->studentService->getAllMajors();
        return view('student.edit', compact('student', 'majors'));
    }

    /**
     *show update
     *
     *return @string
     */
    public function updateStudent(StudentRequest $request, int $id)
    {
        $this->studentService->update($request->all(), $id);
        return back()->with(['success' => 'Successful']);
    }
}
