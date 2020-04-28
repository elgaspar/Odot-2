<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProjectRepository;
use App\Task;


class TaskController extends Controller
{
    protected $repository;

    public function __construct(ProjectRepository $repository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
    }

    //Store a newly created task in storage.
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255'
        ]);

        $project = $this->repository->getProject($request->user(), $request->project_id);

        $this->authorize('update', $project);

        $project->tasks()->create($request->all());

        return redirect()->route('projects.view', ['project' => $project])
            ->with('success', 'Task created.');
    }

    //Update the specified task in storage.
    public function update(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
            'name' => 'required|max:255'
        ]);

        $task = $this->repository->getTask($request->user(), $request->id);

        $this->authorize('update', $task->project); //if he is allowed to update project, he is allowed to update its tasks

        $task->update($request->all());

        return redirect()->route('projects.view', ['project' => $task->project])
            ->with('success', 'Task updated.');
    }

    //Remove the specified task from storage.
    public function destroy(Task $task)
    {
        $this->authorize('destroy', $task->project);
        $task->delete();
        return redirect()->route('projects.view', ['project' => $task->project])
            ->with('success', 'Task removed.');
    }
}
