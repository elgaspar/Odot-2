<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\TaskRepository;
use App\Task;


class TaskController extends Controller
{
    protected $tasks;

    public function __construct(TaskRepository $tasks)
    {
        $this->middleware('auth');
        $this->tasks = $tasks;
    }


    //Display a listing of the tasks.
    // public function index(Request $request)
    // {
    //     // $user_tasks = $this->tasks->forUser($request->user());
    //     $user_tasks = array(); //FIXME
    //     return view('tasks.index', [
    //         'tasks' => $user_tasks
    //     ]);
    // }

    //Store a newly created task in storage.
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255'
        ]);

        $request->user()->tasks()->create($request->all());

        return redirect()->route('tasks.index')
            ->with('success', 'Task created.');
    }

    //Update the specified task in storage.
    public function update(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
            'name' => 'required|max:255'
        ]);

        $task = $this->tasks->get($request->user(), $request->id);

        $this->authorize('update', $task);

        $task->update($request->all());

        return redirect()->route('tasks.index')
            ->with('success', 'Task updated.');
    }

    //Remove the specified task from storage.
    public function destroy(Task $task)
    {
        $this->authorize('destroy', $task);
        $task->delete();
        return redirect()->route('tasks.index')
            ->with('success', 'Task removed.');
    }
}
