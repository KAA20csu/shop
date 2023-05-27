@extends('layout.admin')

@section('content')
    <h1>Все роли пользователей</h1>
    <table class="table table-bordered">
        <tr>
            <th width="30%">Пользователь</th>
            <th width="30%">Роли</th>
        </tr>
        @foreach ($users as $user)
        <tr>
            <td>
                <a href="{{ route('admin.user.show', ['user' => $user->id]) }}"
                   style="font-weight: normal">
                    {{ $user->name }}
                </a>
            </td>
            <td>
                @if(count($user->getRoleNames()))
                    {{ implode(",", $user->getRoleNames()->toArray()) }}
                @else
                    {{ __('У пользователя нет ролей')}}
                @endif
            </td>
        </tr>
        @endforeach
    </table>
@endsection