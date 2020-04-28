@extends('layouts.app')

@section('content')


@if($users)
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="">
            Total: {{ count($users) }} users
        </div>

        @include('common.buttons.create',[
        'target' => '#users-modal'
        ])
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

                    @include('common.buttons.edit',[
                    'target' => '#users-modal',
                    'attributes' =>
                    [
                    'data-name' => $user->name,
                    'data-email' => $user->email,
                    'data-is-admin' => $user->is_admin,
                    'data-id' => $user->id
                    ]
                    ])

                    @include('common.buttons.delete',[
                    'action' => route('users.destroy', $user->id)
                    ])

                </td>
                </tr>
            @endforeach

@endif

</tbody>
</table>

@include('common.modal',[
'modal_id' => 'users-modal',
'form_action' => url('users'),
'form_content' => 'users.formFields',
])

@endif


@endsection
