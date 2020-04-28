<button class="btn text-secondary action-btn {{ $class ?? '' }}" data-toggle="modal" data-target="{{ $target }}" @foreach($attributes as $key=> $value)
    {{ $key }}="{{ $value }}"
    @endforeach
    >
    <i class="{{ $icon ?? 'fas fa-edit' }}"></i>
</button>
