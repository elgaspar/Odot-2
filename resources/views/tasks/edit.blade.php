@extends('layouts.app')

@section('content')


    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')

        @include('tasks.formContent')

    </form>

@endsection