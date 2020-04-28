<div class="mt-5">
    <!-- empty -->
</div>

<h3 class="d-inline-block">Categories</h3>

@include('common.buttons.create',[
'target' => '#categories-modal'
])

<ul class="list-group mt-3">

    @if(isset($categories) && count($categories) > 0)

        @foreach($categories as $category)

            <li class="category list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                <i class="fas fa-circle" style="color: {{ $category->color ? $category->color : '#000000' }}"></i>
                {{ $category->name }}

                <div class="actions d-inline-block float-right">

                    @include('common.buttons.edit',[
                    'target' => '#categories-modal',
                    'attributes' =>
                    [
                    'data-name' => $category->name,
                    'data-color' => $category->color,
                    'data-id' => $category->id
                    ]
                    ])

                    @include('common.buttons.delete',[
                    'action' => route('categories.destroy', $category->id)
                    ])

                </div>

            </li>

        @endforeach

    @endif

</ul>

@include('common.modal',[
'modal_id' => 'categories-modal',
'form_action' => url('categories'),
'form_content' => 'categories.formFields'
])
