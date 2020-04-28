<form action="{{ url('categories') }}" method="POST">

    @csrf
    <input type="hidden" name="_method" value="PUT">

    <input type="hidden" name="id">

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" id="name" placeholder="Name">
    </div>

    <div class="form-group">
        <label for="color">Color</label>
        <select class="color-select d-block w-100" name="color" id="color">
            @include('categories.selectOption', ['color' => '', 'name' => 'None'])
            @include('categories.selectOption', ['color' => '#0000FF', 'name' => 'Blue'])
            @include('categories.selectOption', ['color' => '#808080', 'name' => 'Gray'])
            @include('categories.selectOption', ['color' => '#008000', 'name' => 'Green'])
            @include('categories.selectOption', ['color' => '#FFA500', 'name' => 'Orange'])
            @include('categories.selectOption', ['color' => '#FF0000', 'name' => 'Red'])
            @include('categories.selectOption', ['color' => '#FFFF00', 'name' => 'Yellow'])
        </select>
    </div>

    <div class="form-group d-flex justify-content-between">
        <button class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
    </div>

</form>
