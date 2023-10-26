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

        $request->session()->flash('alert-success', 'Задача успешно создана!');

        return to_route('todos.index');
    }
    public function detail($id)
    {
        $todo = Todo::find($id);
        if (!$todo) {
            request()->session()->flash('error', 'Такой задачи не существует');
            return to_route('todos.index')->withErrors([
                'error' => 'Такой задачи не существует'
            ]);
        }
        return view('todos.detail', ['todo' => $todo]);
    }
    public function edit($id)
    {
        $todo = Todo::find($id);
        if (!$todo) {
            request()->session()->flash('error', 'Такой задачи не существует');
            return to_route('todos.index')->withErrors([
                'error' => 'Такой задачи не существует'
            ]);
        }
        return view('todos.edit', ['todo' => $todo]);
    }
    public function update(Request $request)
    {
        $todo = Todo::find($request->todo_id);
        $todo->title = $request->title;
        $todo->description = $request->description;
        $todo->is_completed = $request->is_completed;
        $todo->save();
        $request->session()->flash('alert-success', 'Задача успешно обновлена!');
        return redirect()->route('todos.index');
    }
}
