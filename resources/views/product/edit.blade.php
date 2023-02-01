@extends('layout')
@section('title')Добавить продукт @endsection()

@section('main_content')
    <h1>Добавить продукт</h1>

    <form method="post" action="{{ route('product.update', $product->id) }}">
        @csrf
        @method('patch')
        <select class="form-select form-control" id="category" name="category_id">
            @foreach($categories as $category)
                <option {{ $category->id === $product->category->id ? 'selected' : '' }}
                    value="{{ $category->id }}">
                    {{ $category->brand }}
                </option>
            @endforeach
        </select><br>
        <label for="tags">Теги</label>
        <select class="form-select form-control" multiple="multiple" id="tags" name="tags[]">
            @foreach($tags as $tag)
                <option
                    @foreach ($product->tags as $productTag)
                    {{ $tag->id === $productTag->id ? 'selected' : '' }}
                    @endforeach
                    value="{{ $tag->id }}">{{ $tag->tag }}</option>
            @endforeach
        </select><br>
        <input type="text" id="name" name="name" value="{{ $product->name }}" placeholder="Введите название продукта" class="form-control"><br>
        <input type="text" id="price" name="price" value="{{ $product->price }}"  placeholder="Введите цену продукта" class="form-control"><br>
        <input type="text" id="sale_price" value="{{ $product->sale_price }}" name="sale_price" placeholder="Распродажа" class="form-control"><br>
        <input type="text" id="quantity" value="{{ $product->quantity }}" name="quantity" placeholder="Введите количество" class="form-control"><br>
        <textarea name="description" id="description" value="{{ $product->description }}" cols="30" rows="5" class="form-control" placeholder="Описание продукта"></textarea><br>
        <input class="form-control" id="image" value="{{ $product->image }}" name="image" type="text">
        <input type="number" id="status" value="{{ $product->status }}" name="status" placeholder="Наличие товара" min="1" max="2" class="form-control"><br>
        <button type="submit" class="btn btn-success">Сохранить изменения</button>
    </form>
@endsection()

