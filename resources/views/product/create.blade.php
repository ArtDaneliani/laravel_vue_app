@extends('layouts.app')
@section('title')Добавить продукт @endsection()

@section('content')
    <h1>Добавить продукт</h1>
    <form method="post" action="{{ route('product.store') }}">
        @csrf
        <select class="form-select form-control" id="category" name="category_id">
            <option selected>Категория</option>
            @foreach($categories as $category)
                <option
                    {{ old('category_id') == $category->id ? 'selected' : '' }}
                    value="{{ $category->id }}">{{ $category->brand }}</option>
            @endforeach
        </select><br>
        <label for="tags">Теги</label>
        <select class="form-select form-control" multiple="multiple" id="tags" name="tags[]">
            @foreach($tags as $tag)
                <option value="{{ $tag->id }}">{{ $tag->tag }}</option>
            @endforeach
        </select><br>
        <input value="{{ old('name') }}" type="text" id="name" name="name" placeholder="Введите название продукта"
               class="form-control">
        @error('name')
        <p class="text-danger">Введите название продукта</p>
        @enderror
        <br>
        <input value="{{ old('price') }}" type="text" id="price" name="price" placeholder="Введите цену продукта"
               class="form-control">
        @error('price')
        <p class="text-danger">Введите цену продукта</p>
        @enderror
        <br>
        <input value="{{ old('sale_price') }}" type="text" id="sale_price" name="sale_price" placeholder="Распродажа"
               class="form-control">
        @error('sale_price')
        <p class="text-danger">Укажите цену после скидки (мин значение 0)</p>
        @enderror
        <br>
        <input value="{{ old('quantity') }}" type="text" id="quantity" name="quantity" placeholder="Введите количество"
               class="form-control">
        @error('quantity')
        <p class="text-danger">Введите количество</p>
        @enderror
        <br>
        <textarea  name="description" id="description" cols="30" rows="5"
                  class="form-control"
                  placeholder="Описание продукта">{{ old('description') }}</textarea>
        @error('description')
        <p class="text-danger"> Добавьте изображение продукта (~image.jpg)</p>
        @enderror
        <br>
        <input value="{{ old('image') }}" class="form-control" id="image" name="image" type="text"
               placeholder="Название картинки (пока)">
        @error('image')
        <p class="text-danger"> Добавьте изображение продукта (~image.jpg)</p>
        @enderror
        <br>
        <input value="{{ old('status') }}" type="number" id="status" name="status" placeholder="Наличие товара" min="1"
               max="2"
               class="form-control">
        @error('quantity')
        <p class="text-danger">Укажите наличие товара (1- есть на складе, 2 - нет на складе)</p>
        @enderror
        <br>
        <button type="submit" class="btn btn-success">Добавить продукт</button>
    </form>

@endsection()

