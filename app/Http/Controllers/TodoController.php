<?php

namespace App\Http\Controllers;

use App\Models\TodoTags;
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

    public function index()         //====---------read
    {
        $user_id = Auth::id();
        if (Auth::check()) {
            $Todos = Todos::where('user_id', $user_id)->get();
            $tags = TodoTags::all();
            return view('todo.index', [
                'Todos' => $Todos,
                'tags' => $tags,
                'user_id' => $user_id
            ]);
        }
        return redirect()->route('home.index');
    }

    public function addTodo(Request $request)       //====---------create
    {

//        $validatedData = $request->validate([
//            'image' => 'image|nullable|max:1999',
//        ]);
        if ($request->file('image')) {
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
        }

        $todo = new Todos();
        $user_id = Auth::id();
        $todo->user_id = $_POST['user_id'];
        $todo->title = $_POST['title'];
        $todo->done = $_POST['done'];
        $todo->image = isset($fileName) ? $fileName : "no image";
        $todo->save();

//--------------------------------------------]
        $todo->tags = $_POST['tags'];
        $tags = explode(",", $todo->tags);
        $arrtags = (array)$tags;

        foreach ($arrtags as $key => $tag) {
            $exist_tag = DB::table('todo_tags')->where('tag', $tag)->value('tag');
            if ($exist_tag != $tag) {
                $id = DB::table('todo_tags')->insertGetId([
                    'tag' => $tag
                ]);
            } else {
                $id = DB::table('todo_tags')->where('tag', $exist_tag)->value('id');
            }
            DB::table('todo_tags_ids')->insert([
                'tag_id' => $id,
                'todo_id' => $todo->id
            ]);
        }
//--------------------------------------------]
        $todo->path = url('');
        return json_decode($todo);
    }

    public function editTodo(Request $request)          //====---------update --/-- delete
    {
        if (isset($_POST['update_Todo'])) {
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

            if (Storage::exists('images/thumbnail/'. $_POST['image']) AND Storage::exists('images/origin/'. $_POST['image'])) {
            unlink(Storage::path('images/') . 'origin/' . $_POST['image']);
            unlink(Storage::path('images/') . 'thumbnail/' . $_POST['image']);
            }

            return json_decode($todos->all());
        }

    }

}
