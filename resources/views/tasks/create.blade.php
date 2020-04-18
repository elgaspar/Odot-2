@extends('layouts.app')

@section('content')


    <form action="{{ url('tasks') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Name">
        </div>

        <div class="form-group">
              <button type="submit" class="btn btn-primary">Create</button>
        </div>

    </form>

@endsection