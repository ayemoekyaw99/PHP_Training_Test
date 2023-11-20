<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\Services\TaskServiceInterface;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    private $taskService;
    public function __construct(TaskServiceInterface $taskService)
    {
        $this->taskService = $taskService;
    }

    /**
     * create function
     * @return void
     */
    public function index()
    {
        $tasks = $this->taskService->getAllTasks();
        return view('task', compact('tasks'));
    }

    /**
     * create function
     * @return void
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required|max:255',
        ])->validate();
        $this->taskService->createTask($request->all());
        return redirect()->route('tasks')->with('status', 'Task created successfully');
    }

    /**
     * delete function
     * @return void
     */
    public function delete(Request $request, int $id)
    {
        $this->taskService->deleteTask($id);
        return redirect()->route('tasks')->with('status', 'Task deleted successfully');
    }
}