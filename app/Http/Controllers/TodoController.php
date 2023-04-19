<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todos;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class TodoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {                           //====---------вывод
        $user_id = Auth::id();
        if (Auth::check()) {
            $todos = new Todos();
            $todos = DB::table('todos')
                ->select('id', 'title', 'done', 'image', 'user_id')
                ->where('user_id', '=', $user_id)
                ->get();
            return view('todo.index', [
                'todos' => $todos,
                'user_id' => $user_id
            ]);
        }
        return redirect()->route('home.index');
    }

    public function addTodo(Request $request)
    {     //====---------создание

        $validatedData = $request->validate([
            'image' => 'image|nullable|max:1999',
        ]);
        $image = $request->file('image');
        $filename = $image->getClientOriginalName();

        $extention = $image->getClientOriginalExtension();
        $fileName = $filename . "_" . time() . "." . $extention;
        //оригинал
        $path = $image->move(Storage::path('images/') . 'origin/', $fileName);
        //миниатюра
        $thumbnail = Image::make(Storage::path('/images/') . 'origin/' . $fileName);
        $thumbnail->fit(150, 150);
        $thumbnail->save(Storage::path('images/') . 'thumbnail/' . $fileName);

//        $path = $request->file('image')->store('/images');
//        $path = $request->file('image')->storeAs('/images', $fileName);
//dd($path);

        $todo = new Todos();
        $user_id = Auth::id();
        $todo->user_id = $_POST['user_id'];
        $todo->title = $_POST['title'];
        $todo->done = $_POST['done'];
        $todo->image = $fileName;
        $todo->save();
        $todo->path = url('');
        return json_decode($todo);
    }

    public function editTodo(Request $request)
    {
        if (isset($_POST['update_Todo'])) {           //====---------обновление
            echo('update');
            $valid = $request->validate([
                'title' => 'required|min:15|max:500',
            ]);
            $todo = new Todos();
            $user_id = Auth::id();
            $todo->id = $request->input('id');
            $todo->user_id = $user_id;
            $todo->title = $request->input('title');
            $todo->done = $request->input('done');
            $todo->image = $request->input('image');
            $todo->update();
            return json_decode($todo);
        }
        if (isset($_POST['delete_Todo'])) {         //====---------удаление
            $todos = new Todos();
            DB::table('todos')->where('id', $_POST['id'])->delete();
            unlink(Storage::path('images/') . 'origin/' . $_POST['image']);
            unlink(Storage::path('images/') . 'thumbnail/' . $_POST['image']);
            return json_decode($todos->all());
        }

    }

}
