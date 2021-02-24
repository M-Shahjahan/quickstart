<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Repositories\TaskRepository;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    protected $tasks;
    protected $users;
    public function __construct(TaskRepository $tasks){
        $this->middleware('auth');
        $this->tasks=$tasks;
    }
    public function index(Request $request){
        if($request->user()->is_admin){
            return view('users.index',['tasks'=>$this->tasks->forAdmin(true)]);
        }
        return view('tasks.index',['tasks'=>$this->tasks->forUser($request->user())]);
    }
    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required|max:5',
        ]);
        $request->user()->tasks()->create([
            'name'=> $request->name,
        ]);
        return redirect('/home');
    }
    public function destroy(Request $request,Task $task){
        $this->authorize('destroy',$task);
        $task->delete();
        return redirect('/home');
    }
}

