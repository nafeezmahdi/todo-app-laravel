<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $todos = Auth::user()->todos;

        return view('home', [
            'todos' => $todos,
        ]);
    }

    public function toggle($todo)
    {
        $todo = Todo::findOrFail($todo);

        if ($todo->user_id !== Auth::id()) {
            abort(403);
        }

        $todo->toggle();

        return redirect()->route('home');
    }
}
