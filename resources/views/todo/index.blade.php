@extends('layouts.app')
@section('title') ToDo @endsection()

@section('content')
    <h1>Список заданий</h1>
    <hr>
{{--    <todo></todo>--}}

    <form id="To_Do" class="todo-add" action="#">
        @csrf
        <textarea name="title" v-model="title" rows="3" class="form-control" placeholder="Введите название и описание задания"></textarea><br>
        <select v-model="done" name="done" class="form-control">
            <option value="" selected>Статус</option>
            <option value="1">Готово</option>
            <option value="2">Не готово</option>
        </select><br>
        <input v-model="image" class="form-control" name="image" type="text" placeholder="Изображение"/><br>
        <button  name="add_task" class="btn btn-success">Добавить задание</button>
    </form>

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

