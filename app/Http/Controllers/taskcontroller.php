<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class taskcontroller extends Controller
{
	/**
	 * view task
	 * @return [type] [description]
	 */
    public function view()
    {
    	$task = Task::orderBy('created_at','asc')->get();
    	
    	return view('tasks',['tasks' => $task]);
    }
    /**
     * add task
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function addtask(Request $request)
    {
    	$validator = Validator::make($request->all(), [
    	'name' => 'required|max:255',
	    ]);

	    if ($validator->fails()) {
	    	return redirect('/')->withInput()->withErrors($validator);
	    }

	    $task = new Task;
	    $task -> name = $request -> name;
	    $task -> save();

	    return redirect('/');
    }
    /**
     * delate task
     * @param  Task   $task [description]
     * @return [type]       [description]
     */
    public function deletetask(Task $task)
    {
    	$task->delete();

    	return redirect('/');
    }
}
