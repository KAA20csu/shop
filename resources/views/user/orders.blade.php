@extends('layout.site')

@section('content')
    <h1>Личный кабинет</h1>
    <p>Добро пожаловать, {{ auth()->user()->name }}</p>
    <p>Это личный кабинет постоянного покупателя нашего интернет-магазина.</p>
    @if(count($orders))
        <table class="table table-bordered">
            <tr>
                <th width="18%">Дата и время</th>
                <th width="5%">Статус</th>
                <th width="18%">Адрес почты</th>
                <th width="18%">Номер телефона</th>
            </tr>
                @foreach($orders as $order)
                <tr>
                <td>{{ $order->created_at->format('d.m.Y H:i') }}</td>
                <td>
                    @if ($order->status == 0)
                        <span class="text-danger">{{ $statuses[$order->status] }}</span>
                    @elseif (in_array($order->status, [1,2,3]))
                        <span class="text-success">{{ $statuses[$order->status] }}</span>
                    @else
                        {{ $statuses[$order->status] }}
                    @endif
                </td>
                <td><a href="mailto:{{ $order->email }}">{{ $order->email }}</a></td>
                <td>{{ $order->phone }}</td>
            </tr>
                @endforeach
        </table>
    @else
            {{ __('У вас ещё нет заказов' )}}
    @endif
    <form action="{{ route('logout') }}" method="post">
        @csrf
        <button type="submit" class="btn btn-primary">Выйти</button>
    </form>
@endsection