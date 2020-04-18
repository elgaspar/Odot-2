<form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn text-secondary">
        <i class="fas fa-trash"></i>
    </button>
</form>