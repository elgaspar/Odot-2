<form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn text-secondary task-action-btn">
        <i class="fas fa-trash"></i>
    </button>
</form>