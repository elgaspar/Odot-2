@if(count($tasks) > 0)

    @foreach($tasks as $task)

        <li class="list-group-item">
            {!! $indent !!}

            @include('tasks.completeButton')

            {{ $task->name }}

            <div class="d-inline-block float-right">

                @include('common.buttons.edit',[
                'target' => '#tasks-modal',
                'icon' => 'fas fa-plus',
                'class' => 'mr-3',
                'attributes' =>
                [
                'data-create' => 'true',
                'data-name' => $task->name,
                'data-parent_id' => $task->id,
                ]
                ])

                @include('common.buttons.edit',[
                'target' => '#tasks-modal',
                'attributes' =>
                [
                'data-name' => $task->name,
                'data-category_id' => $task->category_id,
                'data-parent-id' => $task->parent_id,
                'data-id' => $task->id
                ]
                ])

                @include('common.buttons.delete',[
                'action' => route('tasks.destroy', $task->id)
                ])

            </div>

        </li>

        @include('tasks.children', [
        'tasks' => $task->children,
        'indent' => $indent . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
        ])


    @endforeach

@endif
