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

    //Display a listing of the resource.
    public function index(Request $request)
    {
        $user_tasks = $this->tasks->forUser($request->user());

        return view('tasks.index', [
            'tasks' => $user_tasks
        ]);
    }

    //Show the form for creating a new resource.
    public function create()
    {
        return view('tasks.create');
    }

    //Store a newly created resource in storage.
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255'
        ]);

        $request->user()->tasks()->create([
            'name' => $request->name
        ]);

        return redirect()->route('tasks.index')
            ->with('success', 'Task created.');
    }

    //Display the specified resource.
    public function show(Task $task)
    {
        //do nothing (we don't need this route)
        return redirect()->route('tasks.index');
    }

    //Show the form for editing the specified resource.
    public function edit(Task $task)
    {
        return view('tasks.edit', [
            'task' => $task
        ]);
    }

    //Update the specified resource in storage.
    public function update(Request $request, Task $task)
    {
        $this->validate($request, [
            'name' => 'required|max:255'
        ]);

        $task->update($request->all());

        return redirect()->route('tasks.index')
            ->with('success', 'Task updated.');
    }

    //Remove the specified resource from storage.
    public function destroy(Task $task)
    {
        $this->authorize('destroy', $task);
        $task->delete();
        return redirect()->route('tasks.index')
            ->with('success', 'Task removed.');
    }
}
