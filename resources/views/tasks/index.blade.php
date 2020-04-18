@extends('layouts.app')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="">
            Total: {{ count($tasks) }} tasks
        </div>

        <a class="btn btn-primary" href="{{ route('tasks.create') }}" role="button">Create Task</a>
    </div>

    @if (count($tasks) > 0)
        <table class="table table-striped task-table">

            <thead>
                <th><!-- empty --></th>
                <th class="w-100">Task</th>
                <th><!-- empty --></th>

            </thead>

            <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <td class="align-middle">
                            @include('tasks.buttons.complete')
                        </td>

                        <td class="table-text align-middle">
                            <div>{{ $task->name }}</div>
                        </td>

                        <td class="d-flex">
                            @include('tasks.buttons.edit')
                            @include('tasks.buttons.delete')
                        </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

@endsection