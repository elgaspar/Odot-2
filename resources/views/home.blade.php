@extends('layouts.app')

@section('content')
@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif

You are logged in!

<br>
<br>
<a href="{{ route('tasks.index') }}" class="btn btn-primary">View Tasks</a>

@endsection