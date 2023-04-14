@extends('layouts.app')
@section('title') ToDo @endsection()

@section('content')
    <h1>Список заданий</h1>
    <hr>

    <todo>@csrf</todo>

{{--        <textarea name="title"  rows="3" class="form-control" placeholder="Введите название и описание задания"></textarea><br>--}}
{{--        <select name="done">--}}
{{--            <option value=""></option>--}}
{{--            <option value="1">Готово</option>--}}
{{--            <option value="2">Не готово</option>--}}
{{--        </select><br>--}}
{{--        <input  class="form-control" name="image" type="text" placeholder="Загрузите картинку"/>--}}
{{--        <button type="submit" name="add_task" class="btn btn-success">Добавить задание</button>--}}

    @if($todos)
        <h5>список заданий</h5>
    @endif
    @foreach($todos as $item)
        <div class="alert alert-success">
            <p>USER-ID - {{$item->user_id}}</p>
            <p>{{ $item->title }}</p><br>
            <h3> {{ ($item->done) ?  'Готово'  :  'Не готово' }}</h3><br>
            <button type="button" class="btn btn-warning"><a href='/todo/{{ $item->user_id }}'>Удалить</a></button>
        </div>
    @endforeach


    <hr>
@endsection()
