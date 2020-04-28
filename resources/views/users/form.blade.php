<form action="{{ url('users') }}" method="POST">

    @csrf
    <input type="hidden" name="_method" value="PUT">

    <input type="hidden" name="id">

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" id="name" placeholder="Name">
    </div>

    <div class="form-group">
        <label for="email">E-mail</label>
        <input type="text" name="email" class="form-control" id="email" placeholder="E-mail">
    </div>

    <div class="form-group">
        <label for="name">Password</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
    </div>

    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="is_admin" name="is_admin">
        <label class="custom-control-label" for="is_admin">Is Admin</label>
    </div>
    <br>

    <div class="form-group d-flex justify-content-between">
        <button class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
    </div>

</form>
