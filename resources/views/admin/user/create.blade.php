@extends('layout.admin')

@section('content')
    <h1>Добавление роли пользователю {{$user->name}}</h1>
    <form method="post" action="{{ route('admin.role.store') }}" enctype="multipart/form-data">
        @csrf
        <option value="0">Выберите</option>
        @foreach($roles as $role)
            <option value="{{ $role->name }}" @if ($role->id == $role_id) selected @endif>
                {{ $role->name }}
            </option>
        @endforeach
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </div>
    </form>
@endsection