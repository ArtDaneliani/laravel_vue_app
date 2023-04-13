<?php

namespace App\Http\Controllers;

use App\Models\Todos;
use DB;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index() {
        $todos = new Todos();
        $user = auth()->user();
        $user_id = $user->id;
        //передаем с модели все данные через обьект ТоДоС в шаблон (вьюшку)
        //как в кодигнайтер - с контролера в массиве дата передаем массив $todos
        $todoS = DB::select('select * from todos');
        return view('todo.index', [
            'todos'=>$todoS->all(),
            'user_id'=>$user_id
        ]);

    }

    //=========CRUD=========
    public function addTodo(Request $request) {
        $todo = new Todos();
        $user = auth()->user();
        $user_id = $user->id;
        //left side = DB-fields name
        //right side = key(from request user inputs) request
        $todo->user_id = $request->input($user_id);
        $todo->title = $request->input('title');
        $todo->done = $request->input('done');
        $todo->image = $request->input('image');

        //method save() is from parent Model
        $todo->save();

        //redirect to reviews page
        return view('todo.index');
    }
    public function deleteTodo($id) {
        $todos = new Todos();
        DB::delete('delete from todos where id = ?',[$id]);
        return view('todo.index', [
            'todos'=>$todos->all()
        ]);
    }
}
