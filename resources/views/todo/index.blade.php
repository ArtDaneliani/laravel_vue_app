@extends('layouts.app')
@section('title') ToDo @endsection()

@section('content')
    <h1>Список заданий</h1>
    <hr>
    {{--    <todo></todo>--}}
    <img id="preview_image" src="" alt="preview image" style="max-height: 150px;max-width: 150px;"/>
    <form id="To_Do" class="todo-add" enctype="multipart/form-data" action="#">
        @csrf
        <input class="form-control" type="file" name="image" placeholder="Изображение" id="image" required/><br>
        <input type="hidden" name="user_id" value="{{$user_id}}"/>
        <textarea name="title" v-model="title" rows="3" class="form-control"
                  placeholder="Введите название и описание задания" required></textarea><br>
        <select name="done" class="form-control" required>
            <option value="" selected>Выберите статус</option>
            <option value="1">Готово</option>
            <option value="2">Не готово</option>
        </select><br>
        <button name="add_task" type="submit" class="btn btn-success">Добавить задание</button>
    </form>

    @if($todos)
        <h5>список заданий</h5>
    @endif
    <table class="table table-bordered">
        <thead>
        <tr>
            <th><label>User-id</label></th>
            <th><label>Image</label></th>
            <th><label>Title</label></th>
            <th><label>Status</label></th>
            <th><label>upd/dlt</label></th>
        </tr>
        </thead>
        <tbody id="todo_list">
        @foreach($todos as $item)
            <tr class="item-todo">
                <td>{{ $item->user_id }}</td>
                <td>
                    <a target="_blank" href="{{ url('/storage/images/origin/'.$item->image ) }}">
                        <img class="thumbnail" src="{{ Storage::url('images/thumbnail/'.$item->image) }}" alt="thumb"
                             style="height: 100%;width: auto;">
                    </a>
                </td>
                <td>{{ $item->title }}</td>
                <td>{{ ($item->done == 1) ?  'Готово'  :  'Не готово' }}</td>
                <td>
                    <form class="form" method="post" action="#">
                        @csrf
                        <input type="hidden" name="id" value="{{$item->id}}"/>
                        <input type="hidden" name="image" value="{{$item->image}}"/>
                        <button type="submit" name="update_Todo" class="editTodo">Изменить</button>&nbsp;
                        <button type="submit" name="delete_Todo" class="editTodo">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <hr>
@endsection()

