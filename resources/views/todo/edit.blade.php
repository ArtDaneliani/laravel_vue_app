@extends('layouts.app')
@section('title') ToDo @endsection()

@section('content')
    <h1>Изменить задание</h1>
    <p><a href="{{ route('todo.index') }}">Список задач</a></p>

    <img id="preview_image" src="{{ Storage::url('images/thumbnail/'.$todo->image) }}" alt="preview image" style="max-height: 150px;max-width: 150px;"/><br>
    &nbsp;
    <form id="ToDo_update" enctype="multipart/form-data" action="#">
        @csrf
        <input class="form-control" type="file" name="image" placeholder="Изображение" id="image"/><br>
        <input type="hidden" name="user_id" value="{{$user_id}}"/>
        <input type="hidden" name="todo_id" value="{{$todo->id}}"/>
        <label for="title">Название задания</label>
        <textarea name="title" rows="3" class="form-control" value="{{$todo->title}}"
                  placeholder="Введите название и описание задания"></textarea><br>
        <label for="tags">Теги</label>
        <select class="select2-multiple form-control tags" multiple="multiple">
            @foreach($tags as $tag)
                <option
                    @foreach ($todo->tags as $todoTag)
                    {{ $tag->id === $todoTag->id ? 'selected' : '' }}
                    @endforeach
                    value="{{ $tag->id }}">{{ $tag->tag }}</option>
            @endforeach
        </select>
        <label for="done">Статус</label>
        <select name="done" class="form-control">
            <option value="{{$todo->done}}" selected>{{ ($todo->done == 1) ?  'Готово'  :  'Не готово' }}</option>
            <option value="1">Готово</option>
            <option value="2">Не готово</option>
        </select><br>

        <br>
        <br>
        <button type="submit" name="update_Todo" id="updBtn" class="btn btn-success">Сохранить</button>
    </form>

@endsection()
