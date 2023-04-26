@extends('layouts.app')
@section('title') ToDo @endsection()

@section('content')
    <h1>Список заданий</h1>
    <hr>
    {{--    <todo></todo>--}}
    <img id="preview_image" src="" alt="preview image" style="max-height: 150px;max-width: 150px;"/>
    <form id="To_Do" class="todo-add" enctype="multipart/form-data" action="#">
        @csrf
        <input class="form-control" type="file" name="image" placeholder="Изображение" id="image" /><br>
        <input type="hidden" name="user_id" value="{{$user_id}}"/>
        <textarea name="title" v-model="title" rows="3" class="form-control"
                  placeholder="Введите название и описание задания" ></textarea><br>
        <select name="done" class="form-control" >
            <option value="0" selected>Выберите статус</option>
            <option value="1">Готово</option>
            <option value="2">Не готово</option>
        </select><br>

        <select class="select2-multiple form-control tags"  multiple="multiple">

        </select>
        <br>
        <br>
        <button name="add_task" type="submit" class="btn btn-success">Добавить задание</button>
    </form>
    <br>
    <hr>
    <br>
    @if($Todos)
        <h5>список заданий</h5>
    @endif
    <table class="table table-bordered">
        <thead>
        <tr>
            <th style="width:50px;"><label>U-id</label></th>
            <th style="width: 150px;"><label>Изображение</label></th>
            <th><label>Название</label></th>
            <th style="width: 150px;"><label>Теги</label></th>
            <th style="width: 90px;"><label>Статус</label></th>
            <th style="width: 100px;"><label>Изменить</label></th>
        </tr>
        </thead>
        <tbody id="todo_list">
        @foreach($Todos as $item)
            <tr class="item-todo">
                <td>{{ $item->user_id }}
                    <b>{{ $item->id }}</b>
                </td>
                <td>
                    @if(Storage::exists('images/thumbnail/'.$item->image))
                    <a target="_blank" href="{{ url('/storage/images/origin/'.$item->image ) }}">
                        <img class="thumbnail" src="{{ Storage::url('images/thumbnail/'.$item->image) }}" alt="thumb"
                             style="height: 100%;width: auto;">
                    </a>
                    @endif
                </td>
                <td>{{ $item->title }}</td>
                <td>
                    <div class="tags_wrapper">
                        @foreach($tags as $tag)
                            @foreach($item->tags as $todotag)
                                @if($tag->id === $todotag->id)
                                       <span class="show_tags"> {{$tag->tag}}</span>
                                @endif
                            @endforeach
                        @endforeach
                    </div>
                </td>
                <td>{{ ($item->done == 1) ?  'Готово'  :  'Не готово' }}</td>
                <td>
                    <div class="form-wrapper">
                        <form class="form" method="post" action="#">
                            @csrf
                            <input type="hidden" name="id" value="{{$item->id}}"/>
                            <input type="hidden" name="image" value="{{$item->image}}"/>
                            <button type="submit" name="update_Todo" class="editTodo">Изменить</button>&nbsp;
                            <button type="submit" name="delete_Todo" class="editTodo">Удалить</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection()

