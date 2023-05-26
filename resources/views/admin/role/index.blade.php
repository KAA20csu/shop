@extends('layout.admin')

@section('content')
    <h1>Все категории</h1>
    <table class="table table-bordered">
        <tr>
            <th width="30%">Наименование</th>
            <th><i class="fas fa-edit"></i></th>
            <th><i class="fas fa-trash-alt"></i></th>
        </tr>
        @foreach ($roles as $role)
        <tr>
            <td>
                <a href="{{ route('admin.role.show', ['role' => $role->id]) }}"
                   style="font-weight: normal">
                    {{ $role->name }}
                </a>
            </td>
            <td>
                <a href="{{ route('admin.role.edit', ['role' => $role->id]) }}">
                    <i class="far fa-edit"></i>
                </a>
            </td>
            <td>
                <form action="{{ route('admin.role.destroy', ['role' => $role->id]) }}"
                      method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="m-0 p-0 border-0 bg-transparent">
                        <i class="far fa-trash-alt text-danger"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@endsection