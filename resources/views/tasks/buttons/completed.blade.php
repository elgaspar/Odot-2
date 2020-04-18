<form action="{{ $task->is_completed ? route('tasks.incomplete', $task->id) : route('tasks.completed', $task->id) }}" method="POST">
    @csrf
    <button type="submit" class="btn" style="font-size: 22px;">
    <i class="fas {{ $task->is_completed ? 'fa-check-circle' : 'fa-circle' }}"></i>
    </button>
</form>