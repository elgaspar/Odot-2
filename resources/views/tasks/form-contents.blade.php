<div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="{{ $task->name ?? '' }}">
</div>

<div class="form-group d-flex justify-content-between">
    <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Back</a>
    <button type="submit" class="btn btn-primary">{{ isset($task) ? 'Save'  : 'Create'}}</button>
</div>