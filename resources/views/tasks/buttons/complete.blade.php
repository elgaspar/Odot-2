<form action="{{ route('tasks.update', $task->id) }}" method="POST" class="d-inline-block">
    @csrf
    @method('PUT')
    <input type="hidden" name="id" value="{{ $task->id }}">
    <input type="hidden" name="name" value="{{ $task->name }}">
    <input type="hidden" name="is_completed" value="{{ $task->is_completed ? 0 : 1 }}">
    <button type="submit" class="btn task-complete-button action-btn">
        <i class="fas {{ $task->is_completed ? 'fa-check-circle' : 'fa-circle' }}"></i>
    </button>
</form>