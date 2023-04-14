@extends('layouts.app')
@section('title')Добавить продукт @endsection()

@section('content')
    <h1>Add product</h1>

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
        <input type="text" id="name" name="name" value="{{ $product->name }}" placeholder="Please insert product name" class="form-control"><br>
        <input type="text" id="price" name="price" value="{{ $product->price }}"  placeholder="Please insert product price" class="form-control"><br>
        <input type="text" id="sale_price" value="{{ $product->sale_price }}" name="sale_price" placeholder="Sale" class="form-control"><br>
        <input type="text" id="quantity" value="{{ $product->quantity }}" name="quantity" placeholder="Please insert quantity" class="form-control"><br>
        <textarea name="description" id="description" value="{{ $product->description }}" cols="30" rows="5" class="form-control" placeholder="Please insert product description"></textarea><br>
        <input class="form-control" id="image" value="{{ $product->image }}" name="image" type="text">
        <input type="number" id="status" value="{{ $product->status }}" name="status" placeholder="Stock" min="1" max="2" class="form-control"><br>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
@endsection()

