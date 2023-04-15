<?php

namespace App\Http\Controllers;

use App\Models\Todos;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TodoController extends Controller
{



//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    public function index() {
        $user_id = Auth::id();
        if (Auth::check()) {
            $todos = new Todos();
            $todos = DB::table('todos')
                ->select('title', 'done', 'user_id')
                ->where('user_id', '=', $user_id)
                ->get();

            return view('todo.index', [
                'todos' => $todos
            ]);
        }
        return redirect()->route('home.index');
    }

     public function addTodo(Request $request) {
        $valid = $request->validate([
            'title' => 'required|min:15|max:500',
        ]);
        $todo = new Todos();
        $user_id = Auth::id();
        $todo->user_id = $user_id;
        $todo->title = $request->input('title');
        $todo->done = $request->input('done');
        $todo->image = $request->input('image');

        //method save() is from parent Model
        $todo->save();

        //redirect to todos-list page
//        return redirect()->route('to do.index');
//        return json_encode($todo);
return "dssfsdfsdfsd";
    }

    public function deleteTodo($id) {
        $todos = new Todos();
        DB::delete('delete from todos where id = ?',[$id]);
        $todos = DB::table('todos')
                ->select('title', 'done', 'user_id')
                ->where('user_id', '=', $id)
                ->get();

            return view('todo.index', [
                'todos' => $todos
            ]);
    }
}
