@extends('layouts.app')

@section('content')


    <form action="{{ url('tasks') }}" method="POST">
        @csrf

        @include('tasks.form-contents')

    </form>

@endsection