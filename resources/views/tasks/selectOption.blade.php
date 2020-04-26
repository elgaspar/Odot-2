<option value="{{ $category ? $category->id : '' }}"
    data-content="<i class='fas fa-circle' style='color: {{ $category ? $category->color : '#000000' }}'></i>&nbsp;&nbsp;&nbsp;{{ $category ? $category->name : 'None' }}">
</option>