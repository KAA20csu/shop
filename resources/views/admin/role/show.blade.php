@extends('layout.admin')

@section('content')
    <h1>Просмотр Роли</h1>
    <div class="row">
        <div class="col-md-6">
            <p><strong>Название:</strong> {{ $role->name }}</p>
            @isset($role->content)
                <p>{{ $category->content }}</p>
            @else
                <p>Описание отсутствует</p>
            @endisset
        </div>
        <div class="col-md-6">
            <img src="https://via.placeholder.com/600x200" alt="" class="img-fluid">
        </div>
    </div>
    <form method="post"
          action="{{ route('admin.role.destroy', ['role' => $role->id]) }}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">
            Удалить роль
        </button>
    </form>
@endsection