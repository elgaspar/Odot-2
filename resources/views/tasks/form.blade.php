<form action="{{ url('tasks')}}" method="POST">

    @csrf
    <input type="hidden" name="_method" value="PUT">

    <input type="hidden" name="id">
    <input type="hidden" name="parent_id">

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" id="name" placeholder="Name">

    </div>

    <div class="form-group d-flex justify-content-between">
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary" data-dismiss="modal">Close</a>
        <button type="submit" class="btn btn-primary">{{ isset($task) ? 'Save'  : 'Create'}}</button>
    </div>

</form>