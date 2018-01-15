<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Http\Requests\Requestname;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    /**
     * [index task]
     * @return [type] [description]
     */
    public function index()
    {
       $tasks = Task::orderBy('created_at', 'asc') -> get();
       
       return view('tasks', compact('tasks'));
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
