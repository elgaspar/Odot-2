<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Repositories\ProjectRepository;

class CategoryController extends Controller
{
    protected $repository;

    public function __construct(ProjectRepository $repository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
    }


    //Store a newly created category in storage.
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'color' => 'required|max:255'
        ]);

        $request->user()->categories()->create($request->all());

        return redirect()->route('projects.index')
            ->with('success', 'Category created.');
    }

    //Update the specified category in storage.
    public function update(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
            'name' => 'required|max:255',
            'color' => 'required|max:255'
        ]);

        $category = $this->repository->getCategory($request->user(), $request->id);

        $this->authorize('update', $category);

        $category->update($request->all());

        return redirect()->route('projects.index')
            ->with('success', 'Category updated.');
    }

    //Remove the specified category from storage.
    public function destroy(Category $category)
    {
        $this->authorize('destroy', $category);
        $category->delete();
        return redirect()->route('projects.index')
            ->with('success', 'Category removed.');
    }
}
