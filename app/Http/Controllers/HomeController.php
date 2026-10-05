<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $todos = Auth::user()->todos;

        return view('home', [
            'todos' => $todos
        ]);
    }
}