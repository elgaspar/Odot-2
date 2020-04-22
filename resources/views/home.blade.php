@extends('layouts.app')

@section('content')

You are logged in!

<br>
<br>
<a href="{{ route('projects.index') }}" class="btn btn-primary">View Projects</a>

@endsection