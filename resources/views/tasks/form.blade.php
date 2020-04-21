<form action="{{ url('tasks')}}" method="POST">

    @csrf
    <input type="hidden" name="_method" value="PUT">

    <input type="hidden" name="id">
    <input type="hidden" name="parent_id">
    <input type="hidden" name="project_id" value="{{ $project->id }}">

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" id="name" placeholder="Name">

    </div>

    <div class="form-group d-flex justify-content-between">
        <button class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
    </div>

</form>