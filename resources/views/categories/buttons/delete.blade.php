<form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline-block">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn text-secondary action-btn">
        <i class="fas fa-trash"></i>
    </button>
</form>