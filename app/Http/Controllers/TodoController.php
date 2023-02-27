<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Todo;
use App\Models\Tag;
use App\Http\Requests\TodoRequest;

class TodoController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $todos = Todo::all();
        $tags = Tag::all();
        $param = ['todos' => $todos, 'tags' => $tags, 'user' => $user];
        return view ('index', $param);
    }

    public function create(TodoRequest $request)
    {
        $form = $request -> all();
        Todo::create($form);
        return redirect('/');
    }

    public function modify(TodoRequest $request)
    {
        $form = $request->all();
        unset ($form['_token']);
        Todo::where('id', $request->id)->update($form);
        // $id = $request->id;
        // $form = Todo::find($id);
        // $form->task = $request->task;
        // $form->save();
        return redirect('/');
    }

    public function delete(Request $request)
    {
        $id = $request->deleted_id;
        Todo::find($id)->delete();
        return redirect('/');
    }

    public function getTag(Request $request)
    {
        dd($todo);
        $tag = Tag::getTag($request->tag_id);
        return view('index', $tag);
    }

        public function relate(Request $request)
    {
        $todos = Todo::all();
        return view('index', ['todos'->$todos]);
    }

    public function find()
    {
        $user = Auth::user();
        $tags = Tag::all();
        $param = ['tags' => $tags, 'user' => $user];
        return view('find', $param);
    }

    public function search(TodoRequest $request)
    {
        $user = Auth::user();
        $todos = Todo::where('task', '=' ,"$request->task");
        $tags = Tag::all();
        // $tags = Tag::where('id', $request->tag_id);
        $param = ['todos' => $todos, 'tags' => $tags, 'user' => $user];
        return view ('find', $param);
    }
    public function dashboard()
    {
        return redirect('/');
    }
}
