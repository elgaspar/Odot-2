@extends('layouts.app')

@section('content')


    <form action="{{ url('tasks/' . $task->id) }}" method="POST">
        @csrf
        @method('PUT')

        @include('tasks.form-contents')

    </form>

@endsection