@extends('layouts.app')


@section('sidebar')



<h3 class="d-inline-block">Projects</h3>

@include('common.buttons.create',[
'target' => '#projects-modal'
])

<ul class="list-group mt-3">

    @if(isset($all_projects) && count($all_projects) > 0)

        @foreach($all_projects as $project)

            <li class="project list-group-item list-group-item-action {{ isset($current_project) && ($project->id == $current_project->id) ? 'active' : '' }} d-flex justify-content-between align-items-center">

                <a type="button" href="{{ route('projects.view', ['project' => $project]) }}">
                    {{ $project->name }}
                </a>

                <div class="actions d-inline-block float-right">

                    @include('common.buttons.edit',[
                    'target' => '#projects-modal',
                    'attributes' =>
                    [
                    'data-name' => $project->name,
                    'data-id' => $project->id
                    ]
                    ])

                    @include('common.buttons.delete',[
                    'action' => route('projects.destroy', $project->id)
                    ])

                </div>

            </li>

        @endforeach

    @endif

</ul>

@include('common.modal',[
'modal_id' => 'projects-modal',
'form_action' => url('projects'),
'form_content' => 'projects.formFields'
])

@include('categories.index', ['categories' => $all_categories])


@endsection


@section('content')

@if(isset($current_project))
    <h4 class="text-center">{{ $current_project->name }}</h4>

    @include('tasks.index',[
    'project' => $current_project,
    'categories' => $all_categories,
    'tasks' => $current_project->tasks()->where('parent_id', null)->get()
    ])
@endif

@endsection
