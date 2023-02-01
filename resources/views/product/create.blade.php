@extends('layout')
@section('title')Добавить продукт @endsection()

@section('main_content')
    <h1>Добавить продукт</h1>
    <form method="post" action="{{ route('product.store') }}">
        @csrf
        <select class="form-select form-control" id="category" name="category_id">
            <option selected>Категория</option>
            @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->brand }}</option>
            @endforeach
        </select><br>
        <p>
        @error('category_id')
        <div class="alert alert-danger">Выберите категорию</div>
        @enderror
        </p>
        <label for="tags">Теги</label>
        <select class="form-select form-control" multiple="multiple" id="tags" name="tags[]">
            @foreach($tags as $tag)
            <option value="{{ $tag->id }}">{{ $tag->tag }}</option>
            @endforeach
        </select><br>
        <input type="text" id="name" name="name" placeholder="Введите название продукта" class="form-control"><br>
        <p>
        @error('name')
        <div class="alert alert-danger form-control">Введите название продукта</div>
        @enderror
        </p>
        <input type="text" id="price" name="price" placeholder="Введите цену продукта" class="form-control"><br>
        <p>
        @error('price')
        <div class="alert alert-danger form-control">Введите цену продукта</div>
        @enderror
        </p>
        <input type="text" id="sale_price" name="sale_price" placeholder="Распродажа" class="form-control"><br>
        <p>
        @error('sale_price')
        <div class="alert alert-danger form-control">Укажите цену после скидки (мин значение 0)</div>
        @enderror
        </p>
        <input type="text" id="quantity" name="quantity" placeholder="Введите количество" class="form-control"><br>
        <p>
        @error('quantity')
        <div class="alert alert-danger form-control">Введите количество</div>
        @enderror
        </p>
        <textarea name="description" id="description" cols="30" rows="5" class="form-control" placeholder="Описание продукта"></textarea><br>

        <input class="form-control" id="image" name="image" type="text" placeholder="Название картинки (пока)"><br>
        <p>
        @error('image')
        <div class="alert alert-danger form-control"> Добавьте изображение продукта (~image.jpg)</div>
        @enderror
        </p>
        <input type="number" id="status" name="status" placeholder="Наличие товара" min="1" max="2" class="form-control"><br>
        <p>
        @error('quantity')
        <div class="alert alert-danger form-control">Укажите наличие товара (1- есть на складе, 2 - нет на складе)</div>
        @enderror
        </p>
        <button type="submit" class="btn btn-success">Добавить продукт</button>
    </form>

@endsection()

