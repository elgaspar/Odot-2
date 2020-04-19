@extends('layouts.app')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="">
            Total: {{ count($tasks) }} tasks
        </div>

        <a class="btn btn-primary" href="{{ route('tasks.create') }}" role="button">Create Task</a>
    </div>

    <ul class="list-group">

        @include('tasks.children', [
                'tasks' => $tasks,
                'indent' => ''
            ])

    </ul>

@endsection