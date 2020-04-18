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

            <!-- Table Headings -->
            <thead>
                <th>&nbsp;</th>
                <th class="w-100">Task</th>
                <th>&nbsp;</th>

            </thead>

            <!-- Table Body -->
            <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <td class="align-middle" style="font-size: 22px;">
                            @if ($task->is_completed)
                                <i class="fas fa-check-circle"></i>
                            @else
                                <i class="fas fa-circle"></i>
                            @endif
                        </td>

                        <td class="table-text align-middle">
                            <div>{{ $task->name }}</div>
                        </td>

                        <td class="d-flex">
                            <a href="{{ url('tasks/' . $task->id) . '/edit' }}" class="btn text-secondary">
                                <i class="fas fa-edit"></i>
                            </a>

                            <form action="{{ url('tasks/' . $task->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn text-secondary">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

@endsection