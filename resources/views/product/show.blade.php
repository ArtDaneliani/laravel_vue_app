@extends('layout')
@section('title')Продукты @endsection()

@section('main_content')
    <h1>Карточка продукта</h1>
    <p><a href="{{ route('product.index') }}">Все продукты</a></p>
    <div class="container">
        <img src="{{$product->image}}" alt="pic">
        <hr>
        <p>Категория: <b>{{ $product->category->brand }}</b></p>
        <hr>
        <p>Теги:
        @foreach($tags as $tag)
                @foreach ($product->tags as $productTag)
                        @if($tag->id === $productTag->id)
                        <span class="show_tags"> {{$tag->tag}}</span>
                        @endif
                @endforeach
        @endforeach
        </p>
        <hr>
        <p>{{ $product->name }}</p>
        <hr>
        <p>Цена: ${{ $product->price }}</p>
        <hr>
        <p>Кол-во: {{ $product->quantity }}шт.</p>
        <hr>
    </div>
    <p><a class="btn btn-success" href="{{ route('product.edit', $product->id) }}">Изменить продукт</a></p>
    <form action="{{ route('product.delete', $product->id) }}" method="post">
        @csrf
        @method('delete')
        <input type="submit" class="btn btn-danger" value="Удалить продукт">
    </form>
@endsection()
