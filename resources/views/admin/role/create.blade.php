@extends('layout.admin')

@section('content')
    <h1>Создание новой роли</h1>
    <form method="post" action="{{ route('admin.role.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="Наименование"
                   required maxlength="100" value="{{ old('name') ?? '' }}">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </div>
    </form>
@endsection