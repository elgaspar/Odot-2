
@if (count($tasks) > 0)

    @foreach ($tasks as $task)

        <li class="list-group-item">
            {!! $indent !!}

            @include('tasks.buttons.complete')

            {{ $task->name }}

            <div class="d-inline-block float-right">
                @include('tasks.buttons.edit')
                @include('tasks.buttons.delete')
            </div>
        </li>

        @include('tasks.children', [
                'tasks' => $task->children,
                'indent' => $indent . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
            ])


    @endforeach

@endif
