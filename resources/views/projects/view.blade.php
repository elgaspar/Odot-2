@extends('layouts.app')


@section('sidebar')



<h3 class="d-inline-block">Projects</h3>

@include('projects.buttons.create')
<ul class="list-group mt-3">

    @if (isset($all_projects) && count($all_projects) > 0)

    @foreach ($all_projects as $project)

    <li
        class="project list-group-item list-group-item-action {{ isset($current_project) && ($project->id == $current_project->id) ? 'active' : '' }} d-flex justify-content-between align-items-center">

        <a type="button" href="{{ route('projects.view', ['project' => $project]) }}">
            {{ $project->name }}
        </a>

        <div class="actions d-inline-block float-right">
            @include('projects.buttons.edit')
            @include('projects.buttons.delete')
        </div>
    </li>

    @endforeach

    @endif

</ul>


@include('projects.modal')



@endsection


@section('content')

@if(isset($current_project))
{{ $current_project->name }}

@include('tasks.index',[
'tasks' => $current_project->tasks
])
@endif

@endsection