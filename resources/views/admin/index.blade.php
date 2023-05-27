@extends('layout.admin')
@section('content')
    <h1>Панель управления</h1>
    <p>Добро пожаловать, {{ auth()->user()->name }}</p>
    <p>Это панель управления для администратора интернет-магазина.</p>
    <form action="{{ route('admin.role.index') }}" class="text-left">
            <button class="btn btn-success mb-4 mt-0">
                    Роли
            </button>
    </form>
    <form action="{{ route('admin.user.index') }}" class="text-left">
            <button class="btn btn-success mb-4 mt-0">
                    Роли пользователей
            </button>
    </form>
    <form action="{{ route('admin.order.index') }}" class="text-left">
            <button class="btn btn-success mb-4 mt-0">
                    Заказы
            </button>
    </form>
    <form action="{{ route('logout') }}" method="post">
        @csrf
        <button type="submit" class="btn btn-primary">Выйти</button>
    </form>
@endsection