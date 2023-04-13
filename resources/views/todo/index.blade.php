@extends('layout')
@section('title') ToDo @endsection()

@section('main_content')
    <h1>Список заданий</h1>
    <hr>
    <form method="post" action="{{ route('todo.addTodo') }}">
        @csrf
        <input type="hidden" name="user_id"  value="{{$user_id}}"/>
        <textarea name="title"  rows="3" class="form-control" placeholder="Введите название задания"></textarea><br>
        <select name="done">
            <option value=""></option>
            <option value="1">Готово</option>
            <option value="2">Не готово</option>
        </select><br>
        <input  class="form-control" name="image" type="text" placeholder="Загрузите картинку"/>
        <input type="hidden" name="user_id"  value="{{$user_id}}"/>
        <button type="submit" name="add_task" class="btn btn-success">Добавить задание</button>
    </form>

    @if($todos)
        <h5>список заданий</h5>
    @endif
    @foreach($todos as $item)
        <div class="alert alert-success">
            <p>USER-ID - {{$item->user_id}}</p>
            <p>{{ $item->user_name }}</p>
            <p>{{ $item->title }}</p><br>
            <h3> {{ ($item->done) ?  'Готово'  :  'Не готово' }}</h3><br>
            <button type="button" class="btn btn-warning"><a href='/todo/{{ $item->id }}'>Удалить</a></button>
        </div>
    @endforeach


    <hr>
@endsection()
