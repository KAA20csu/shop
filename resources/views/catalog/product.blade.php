@extends('layout.site')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h1>{{ $product->name }}</h1>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <img src="https://via.placeholder.com/400x400"
                             alt="" class="img-fluid">
                    </div>
                    <div class="col-md-6 mb-4">
                            <div class="card list-item">
                                <div class="card-header">
                                    <h3 class="mb-0">{{ $product->name }}</h3>
                                </div>
                                <div class="card-body p-0">
                                    <img src="https://via.placeholder.com/400x120" alt="" class="img-fluid">
                                </div>
                                <div class="card-footer">
                                    <!-- Форма для добавления товара в корзину -->
                                    <form action="{{ route('basket.add', ['id' => $product->id]) }}" 
                                        method="post" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-success">Добавить в корзину</button>
                                    </form>
                                    <a href="{{ route('catalog.product', ['slug' => $product->slug]) }}"
                                    class="btn btn-dark float-right">Перейти к товару</a>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <p class="mt-4 mb-0">{{ $product->content }}</p>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-md-6">
                        @isset($product->category)
                        Категория:
                        <a href="{{ route('catalog.category', ['slug' => $product->category->slug]) }}">
                            {{ $product->category->name }}
                        </a>
                        @endisset
                    </div>
                    <div class="col-md-6 text-right">
                        @isset($product->brand)
                        Бренд:
                        <a href="{{ route('catalog.brand', ['slug' => $product->brand->slug]) }}">
                            {{ $product->brand->name }}
                        </a>
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection