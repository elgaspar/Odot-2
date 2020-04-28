@if($tasks)
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="">
            Total: {{ count($tasks) }} tasks
        </div>

        @include('common.buttons.create',[
        'target' => '#tasks-modal'
        ])
    </div>

    <ul class="list-group">

        @include('tasks.children', [
        'tasks' => $tasks,
        'indent' => ''
        ])

    </ul>

    @include('common.modal',[
    'modal_id' => 'tasks-modal',
    'form_action' => url('tasks'),
    'form_content' => 'tasks.formFields',
    'values' => [
    'project' => $project,
    'categories' => $categories
    ]
    ])

@endif
