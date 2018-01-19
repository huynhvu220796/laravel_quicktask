<?php
        
namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Auth;
use App\Http\Requests\Requestname;
use App\Repositories\TaskRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    /**
     * [__construct description]
     * @param TaskRepository $tasks [description]
     */
    public function __construct(TaskRepository $tasks)
    {
        $this->middleware('auth');
        $this->tasks = $tasks;
    }
    /**
     * [index task]
     * @return [type] [description]
     */
    public function index(Request $request)
    {
        if (Auth::check()) {
            $tasks = $this->tasks->forUser($request->user());
            
            return view('tasks', compact('tasks'));
        }

        return redirect()->route('task.index');
    }
    /**
     * [store task]
     * @param  Requestname $request [description]
     * @return [type]               [description]
     */
    public function store(Requestname $request)
    {
        try {
            $request->user()->tasks()->create([
               'name' => $request->input('name'),
            ]);

            return redirect()->route('task.index');
        } catch (Exception $e) {
            return back();
        }
    }
    /**
     * [destroy task]
     * @param  Task   $task [description]
     * @return [type]       [description]
     */
    public function destroy(Task $task)
    {
        try {
           $task -> delete();

           return redirect()->route('task.index');
        } catch (Exception $e) {
            return back();
        }
    }
}
