@extends('layout')
@section('title')Продукты @endsection()

@section('main_content')
{{--    <h2>Загрузить изображения</h2>--}}
{{--    <h5>(тестовая форма загрузки массива изображений на сервер в папку images)</h5>--}}
{{--     <form method="post" class="upload_img" enctype="multipart/form-data" action="/products/upload">--}}
{{--     @csrf--}}
{{--         <input class="form-control form-control-lg" id="formFileLg" name="images[]" type="file" multiple="multiple">--}}
{{--         <input type="submit" class="btn btn-primary" value="Загрузить">--}}
{{--     </form>--}}
    <hr>
    <h1>Каталог продуктов</h1>
    <p><a href="{{ route('products.create') }}">Добавить продукт</a></p>
    <div class="container d-flex m-auto">
        <div class="row">
    @foreach($products as $prod)
            <div class="col-4">
                <div class="prod-item">
                    <a href="{{ route('product.show', $prod->id) }}">
                        <img src="{{  $prod->image }}" alt="image"/><br>
                        <p>{{$prod->id}}. {{ $prod->name }}</p>
                        <p>Цена: ${{ $prod->price }}</p>
                        <p>Кол-во: {{ $prod->quantity }}шт.</p>
                        <p>Описание: {{ $prod->description }}</p>
                    </a>
                </div>
            </div>
        @endforeach
        </div>
    </div>
@endsection()


<?php
//------------тестовый массив---------------
//$array = [
//    [
//        'name' => 'Иванов',
//        'specialty' => 'хирург'
//    ],
//    [
//        'name' => 'Петров',
//        'specialty' => 'кардиолог'
//    ],
//    [
//        'name' => 'Петров',
//        'specialty' => 'врач'
//    ],
//    [
//        'name' => 'Иванов',
//        'specialty' => 'хирург'
//    ],
//    [
//        'name' => 'Иванов',
//        'specialty' => 'ортопед'
//    ]
//];
//function Ivanov(array $data){
//    foreach($data as $key => $item){
//        if($item['name'] == 'Иванов'){
//            unset($data[$key]);
//        }
//    }
//    return $data;
//}
//$result = Ivanov($array);
//print_r($result);
?>
