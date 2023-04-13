@extends('layout')
@section('title')Отзывы @endsection


@section('main_content')
    <h1>Форма добавления отзыва</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="/review/check">
        @csrf
        <input type="email" id="email" name="email" placeholder="Введите email" class="form-control"><br>
        <input type="text" id="subject" name="subject" placeholder="Добавьте тему отзыв" class="form-control"><br>
        <textarea name="message" id="message" cols="30" rows="5" class="form-control" placeholder="Сообщение"></textarea><br>
        <button type="submit" class="btn btn-success">Отправить</button>
    </form>

    <p></p>
    @if($reviews)
    <h5>Все отзывы</h5>
    @endif
    @foreach($reviews as $el)
        <div class="alert alert-warning">
            <p>{{ $el->email }}</p><br>
            <h3>{{ $el->subject }}</h3><br>
            <p>{{ $el->message }}</p>
            <button type="button" class="btn btn-warning"><a href='/review/{{ $el->id }}'>Удалить</a></button>
        </div>
    @endforeach

@endsection
