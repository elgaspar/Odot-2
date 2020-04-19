@extends('layouts.app')

@section('content')


    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf

        @include('tasks.formContent')

    </form>

@endsection