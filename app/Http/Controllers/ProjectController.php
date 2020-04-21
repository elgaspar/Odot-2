<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProjectRepository;
use App\Project;

class ProjectController extends Controller
{
    protected $repository;

    public function __construct(ProjectRepository $repository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
    }


    // Display a listing of the projects.
    public function index(Request $request)
    {
        $user_projects = $this->repository->forUser($request->user());

        return view('projects.view', [
            'all_projects' => $user_projects,
        ]);
    }

    // Display a single project.
    public function view(Request $request, Project $project)
    {
        $user_projects = $this->repository->forUser($request->user());

        return view('projects.view', [
            'all_projects' => $user_projects,
            'current_project' => $project
        ]);
    }

    //Store a newly created project in storage.
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255'
        ]);

        $new_project = $request->user()->projects()->create($request->all());

        return redirect()->route('projects.view', ['project' => $new_project])
            ->with('success', 'Project created.');
    }

    //Update the specified project in storage.
    public function update(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
            'name' => 'required|max:255'
        ]);

        $project = $this->repository->getProject($request->user(), $request->id);

        $this->authorize('update', $project);

        $project->update($request->all());

        return redirect()->route('projects.view', ['project' => $project])
            ->with('success', 'Project updated.');
    }

    //Remove the specified project from storage.
    public function destroy(Project $project)
    {
        $this->authorize('destroy', $project);
        $project->delete();
        return redirect()->route('projects.index')
            ->with('success', 'Project removed.');
    }
}
