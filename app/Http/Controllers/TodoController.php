<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect('/register');
        } else {
            $user = Auth::user();
            $user_id = $user->id;
            $todos = Todo::where('author_id', $user_id)->get();
            return view('todos.index', ['todos' => $todos]);
        }
    }
    public function create()
    {
        return view('todos.create');
    }
    public function store(TodoRequest $request)
    {
        Todo::create([
            'title' => $request->title,
            'description' => $request->description,
            'author_id' => Auth::id(),
            'is_completed' => 0

        ]);

        $request->session()->flash('alert-success', 'Todo Created Successfully');

        return to_route('todos.index');
    }
    public function detail($id)
    {
        $todo = Todo::find($id);
        if (!$todo) {
            return to_route('todos.index')->withErrors([
                'error' => 'Такой задачи не существует'
            ]);
        }
        return view('todos.detail', ['todo' => $todo]);
    }
}
