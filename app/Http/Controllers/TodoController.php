<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    public function create()
    {
        return view('todos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
        ]);

        Todo::create([
            'user_id' => Auth::id(),
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'completed' => false,
        ]);

        return redirect()->route('home');
    }

    public function edit(Todo $todo)
    {
        $this->authorizeTodo($todo);

        return view('todos.edit', [
            'todo' => $todo,
        ]);
    }

    public function update(Request $request, Todo $todo)
    {
        $this->authorizeTodo($todo);

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
        ]);

        $todo->update([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
        ]);

        return redirect()->route('home');
    }

    public function destroy(Todo $todo)
    {
        $this->authorizeTodo($todo);

        $todo->delete();

        return redirect()->route('home');
    }

    private function authorizeTodo(Todo $todo): void
    {
        abort_unless($todo->user_id === Auth::id(), 403);
    }
}