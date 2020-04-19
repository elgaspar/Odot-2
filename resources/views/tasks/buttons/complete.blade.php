<form action="{{ $task->is_completed ? route('tasks.incomplete', $task->id) : route('tasks.completed', $task->id) }}" method="POST" class="d-inline-block">
    @csrf
    <button type="submit" class="btn task-complete-button task-action-btn">
        <i class="fas {{ $task->is_completed ? 'fa-check-circle' : 'fa-circle' }}"></i>
    </button>
</form>