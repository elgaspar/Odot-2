@extends('layouts.app')

@section('content')


@if($users)
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="">
            Total: {{ count($users) }} users
        </div>

        @include('users.buttons.create')
    </div>

    <table class="table users-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>E-mail</th>
                <th>Admin</th>
                <th></th>
            </tr>
        </thead>
        <tbody>

            @if(count($users) > 0)

                @foreach($users as $user)
                    <tr @if ($user->is_admin)
                        class="admin-user-row"
                @endif
                >
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->is_admin ? 'yes' : 'no' }}</td>
                <td>
                    @include('users.buttons.edit')
                    @include('users.buttons.delete')
                </td>
                </tr>
            @endforeach

@endif

</tbody>
</table>

@include('users.modal')

@endif


@endsection
