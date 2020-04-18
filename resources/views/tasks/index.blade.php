@extends('layouts.app')

@section('content')

    <a class="btn btn-primary" href="{{ route('tasks.create') }}" role="button">Create Task</a>

    <br>
    <br>
    Count: {{ count($tasks) }}
    <br>
    <br>

    @if (count($tasks) > 0)
        <table class="table table-striped task-table">

            <!-- Table Headings -->
            <thead>
                <th>Completed</th>
                <th class="w-100">Task</th>
                <th>&nbsp;</th>

            </thead>

            <!-- Table Body -->
            <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <td>
                            {{ $task->is_completed }}
                        </td>

                        <td class="table-text">
                            <div>{{ $task->name }}</div>
                        </td>

                        <td>
                            <form action="{{ url('tasks/' . $task->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                    
                                <button type="submit" id="delete-task-{{ $task->id }}" class="btn btn-danger">
                                    Delete
                                </button>
                            </form>
                        </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

@endsection