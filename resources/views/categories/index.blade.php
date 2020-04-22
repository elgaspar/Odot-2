<div class="mt-5">
    <!-- empty -->
</div>

<h3 class="d-inline-block">Categories</h3>

@include('categories.buttons.create')

<ul class="list-group mt-3">

    @if (isset($categories) && count($categories) > 0)

    @foreach ($categories as $category)

    <li class="category list-group-item list-group-item-action d-flex justify-content-between align-items-center">
        <i class="fas fa-circle" style="color: {{ $category->color }}"></i>
        {{ $category->name }}
        <div class="actions d-inline-block float-right">
            @include('categories.buttons.edit')
            @include('categories.buttons.delete')
        </div>
    </li>

    @endforeach

    @endif

</ul>

@include('categories.modal')