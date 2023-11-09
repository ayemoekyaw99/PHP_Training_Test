<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Task;
class TaskController extends Controller
{

    public function index(){
        $tasks = Task::orderBy('created_at', 'asc')->get();
         return view('tasks', [
        'tasks' => $tasks
    ]);
    }
   public function create(Request $request){
     Validator::make($request->all(),['name' => 'required|max:255',
        ])->validate();
       $data=['name'=>$request->name];
       Task::create($data);
       return redirect()->route('task')->with(['status'=>'Successful created']);
   }
   public function delete(Request $request,$id){
    Task::find($id)->delete();
    return redirect()->route('task')->with(['status'=>'Successful deleted']);
   }
}
